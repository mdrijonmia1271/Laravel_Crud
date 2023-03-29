<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('deshboard/css/user_login.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('deshboard/css/user_login.css') }}">
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/03/02/13/59/bird-1232416_960_720.png" type="image/gif"
        sizes="16x16">
    <title>Register Page</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="register_card">
                <div class="card-header">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label style="color:rgb(245, 209, 209)" for="">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <label style="color:rgb(245, 209, 209)" for="">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <label style="color:rgb(245, 209, 209)" for="">Password</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label style="color:rgb(245, 209, 209)" for="">Confirm Password</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password_confirmation" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" value="Register" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    {{-- <div class="d-flex justify-content-center links">
                        Already registered? <a href="{{ route('register') }}"> Sign Up</a>
                    </div> --}}
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login') }}">Already registered?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
