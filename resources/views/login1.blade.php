@extends('layouts.guest')
@section('content')

<div class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="welcome">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username"
                                        placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password"
                                        required>
                                </div>
                                <button class="mt-4 au-btn au-btn--block au-btn--green m-b-20" type="submit">sign
                                    in</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register">Sign Up Here</a>
                                </p>
                            </div>
                            @error('username')
                                <div class='alert alert-danger'>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection