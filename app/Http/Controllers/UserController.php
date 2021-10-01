<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(){

        $id = auth()->id();
        $user = User::findOrFail($id);
        $bio = json_decode($user->bio);

        return view('pages.users.edit')->with([
            'user' => $user,
            'bio' => $bio
        ]);
    }

    public function update(Request $request, $id_user){
        $old_email = User::findOrFail($id_user);
        
        $request->validate([
            'name' => 'required',
            'avatar' => 'image',
            'date' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        if ($request->email !== $old_email->email) {
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
        }

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

        return redirect('profile');
    }
}
