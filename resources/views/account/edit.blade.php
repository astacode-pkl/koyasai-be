@extends('layout.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <div class="card">
    <div class="card-body p-4">
        <h5 class=" fw-semibold">Account information</h5>
        <p class="card-subtitle mb-4">Update your account's profile information and email address. </p>
        <form action="{{route('account.update')}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $user->name)}}" >
            @error('name')
                <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email', $user->email)}}" >
            
            @error('email')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
        </div>
            <button type="submit" class="btn btn-info px-4 waves-effect waves-light ">
                                 <i class="ti ti-device-floppy"></i> Save
                            </button>
        </form>
    </div>
    <div class="card-body p-4">
        <h5 class=" fw-semibold">Change Password</h5>
        <p class="card-subtitle mb-4">To change your password please confirm here</p>
        <form action="/account-settings/update-password" method="post">
        @csrf
        @method('put')
        <div class="mb-4">
            <label for="Password" class="form-label fw-semibold">Current Password</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="Password" name="current_password" >
            @error('current_password')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
        </div>
        <div class="mb-4">
            <label for="newPassword" class="form-label fw-semibold">New Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" name="password" >
            
            @error('password')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
            
        </div>
        <div class="mb-4">
            <label for="confirmPassword" class="form-label fw-semibold">Confirm Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword" name="password_confirmation" >
            
            @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
        </div>
            <button type="submit" class="btn btn-info px-4 waves-effect waves-light">
                               <i class="ti ti-device-floppy"></i> Save
                            </button>
        </form>
    </div>
</div>
@endsection