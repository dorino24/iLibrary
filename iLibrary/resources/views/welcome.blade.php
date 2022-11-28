@extends('layouts.guest')
@section('content')
<div style="background-image:url('images/Library HD Wallpaper.jpg'); height:100vh;background-size: cover;">
    <div class="bg-light d-flex ">
        <div class="p-3 me-auto mx-5 fst-italic">
            <h1>iLibrary</h1>
        </div>
        <div class="p-3 mx-5 ">
            <a href="login">login</a>
        </div>
    </div>
    <div id="wrapper-admin" >
        <div class="container" >
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <div class="logo border border-danger bg-light">
                        <h1 class="text-center py-3 fst-italic"> iLibrary</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
