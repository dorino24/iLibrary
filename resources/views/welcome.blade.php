@extends('layouts.guest')
@section('content')
<div class="bg-light d-flex ">
    <div class="p-3 me-auto mx-5 fst-italic">
         <img src="{{ asset('images/Picture4.png') }}" alt="ilibrary" width="10%" >
    </div>
    <div class="p-3 mx-5">
        <a href="login" class="text-decoration-none ">
             <button class="bg-primary bg-gradient text-light rounded-pill px-5 py-2" type="submit">login</button>
        </a>
    </div>
</div>
<div style="background-image:url('images/Library HD Wallpaper.jpg'); height:90vh;background-size: cover;">
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
