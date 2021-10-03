@extends('layouts.apps.global')
@section('contents')
<main class="content">
    <div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profile Details</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                    <h5 class="card-title mb-0">{{ $user->name }}</h5>
                    <div class="text-muted mb-2">{{ $user->role }}</div>

                    <div>
                        <a class="btn btn-primary btn-sm" href="#">Follow</a>
                        <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <h5 class="h6 card-title">About</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">
                            <span data-feather="home" class="feather-sm me-1"></span> Live in <a href="#">{{ $bio ? $bio->address : '' }}</a>
                        </li>
                        <li class="mb-1">
                            <span data-feather="phone" class="feather-sm me-1"></span> Phone <a href="#">{{ $bio ? $bio->phone : '' }}</a>
                        </li>
                        <li class="mb-1">
                            <span data-feather="calendar" class="feather-sm me-1"></span> Date of birth <a href="#">{{ $bio ? $bio->date_of_birth : '' }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Profile</h5>
                </div>
                <div class="card-body h-100">
                   <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="mb-1">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="mb-1">Date of Birth</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $bio ? $bio->date_of_birth : '' }}">
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-8">
                                <label class="mb-1">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="mb-1">Avatar</label>
                                <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" placeholder="Avatar" name="avatar">
                                @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="mb-1">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ $bio ? $bio->phone : '' }}">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" value="{{ $bio ? $bio->address : '' }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary">
                   </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
