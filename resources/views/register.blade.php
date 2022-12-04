@extends('layouts.guest')
@section('content')

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('images/Picture4.png') }}" alt="iLibrary">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full  @error('name')is-invalid @enderror " type="text" name="name" placeholder="name">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full  @error('username')is-invalid @enderror" type="text" name="username" placeholder="Username">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full  @error('password')is-invalid @enderror" type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                    <input type="hidden" name="role" placeholder="role" value="1">
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
