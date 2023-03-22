
@extends('layout')

<div class="max-w-7 mx-auto t-10px">
    @section('body')
            <div style="margin:10px" class="row">
                <div class="col-4 m-auto">
                    @if (session('name_change'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('name_change') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('laft_days'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('laft_days') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div id="form">
                        <form class="" action="{{ url('user/profile/update') }}" method="post">
                            @csrf

                            <div class="add-category">Edit Name</div>
                            {{-- {{ print_r($errors->all()) }} --}}
                            <div class="mb-3">
                                <label class="mb-2">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" class="form-control"
                                    value="{{ Auth::user()->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary button">Change Name</button>
                        </form>
                    </div>
                    @if (session('old_password_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('old_password_error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('password'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('password') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('new_password_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('new_password_error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div id="password_form">

                        <form class="" action="{{ url('user/password/update') }}" method="post">
                            @csrf
                            <div class="add-category">Edit Password</div>
                            {{-- {{ print_r($errors->all()) }} --}}
                            <div class="mb-3">
                                <label class="mb-2">Old Password</label>
                                <input type="password" name="old_password" placeholder="Enter Old Password"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="mb-2">New Password</label>
                                <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Enter Confirm Password"
                                    class="form-control mb-2" id="passwordInput">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-2">
                                    <input type="checkbox" onclick="showPassword()"> Show Password
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary button">Change Password</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection

{{-- </div>
                </div> --}}
{{-- </x-app-layout> --}}
