<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('deshboard/css/user_login.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('deshboard/css/user_login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/03/02/13/59/bird-1232416_960_720.png" type="image/gif"
        sizes="16x16">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">

            <div class="card login_errors">


                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger role="alert">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="username">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox"  name="remember">Remember Me
                        </div>
                        <br>
                        <div class="input-group form-group">
                            {{-- <input type="submit" value="Login" class="btn float-right login_btn"> --}}
                            <button type="submit" class="form-control btn login_btn">Login</button>
                        </div>
                    </form>
                    <div class="input-group form-group">
                        <a href="{{ url('login/github') }}" class="form-control btn btn-secondary"><i class="fa fa-github"></i> Login With Github</a href="{{ url('login/github') }}">
                    </div>
                    <div class="input-group form-group">
                        <button class="form-control btn btn-danger"><i class="fa fa-google"></i> Login With Google</button>
                    </div>
                </div>
                <div style="margin-bottom: 55px" class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="{{ route('register') }}"> Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
