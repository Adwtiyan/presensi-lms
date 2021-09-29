<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit(){

        $id = auth()->id();
        $user = User::firstWhere('id', $id);
        $bio = json_decode($user->bio);

        return view('pages.users.edit')->with([
            'user' => $user,
            'bio' => $bio
        ]);
    }

    public function update(Request $request, $id_user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'image',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        $bio = [
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date
        ];

        $json = json_encode($bio);

        if ($request->file('avatar')) {
            if ($request->old_avatar !== 'avatar/user.png') {
                Storage::delete($request->old_avatar);
            }
            $avatar = $request->file('avatar')->store('avatar');
        } else {
            $avatar = $request->old_avatar;
        }

        User::where('id', $id_user)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $json,
            'avatar' => $avatar
        ]);

        return redirect('/show-profile');
    }
}
