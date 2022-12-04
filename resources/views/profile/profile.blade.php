@extends('layouts/'. $layout)
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30" id="admin-content">
            <div class="container-fluid">
                <div class="row pb-1">
                    <div class="col-md-4">
                        <h2 class="admin-heading">Account Information</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-column align-items-center">

                    @if (auth()->user()->image != null)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" style="max-height: 300px"
                            alt="{{ auth()->user()->image }}" style="max-width: 40%;">
                    @else
                        <img src="{{ asset('images/icon/icon.png') }}" alt="">
                    @endif
                    <div class="p-1">
                        <form method="post" action="{{ route('user.store', auth()->user()->id) }}"
                            enctype="multipart/form-data" id="unggah">
                            @csrf
                            <div class="d-flex flex-column align-items-center pt-2">
                                <input type="file" name="image" id="file-1" class="inputfile inputfile-1"
                                    style="display: none" />
                                <label for="file-1">
                                    <span>Upload Picture&hellip;</span>
                                </label>
                                <input type="submit" name="save" class="btn btn-primary" style="width: 80%;center"
                                    value="Change">
                            </div>
                        </form>
                    </div>

                </div>
                <div style="max-width: 60%" class="d-flex justify-content-center m-auto py-4">
                    <form style="width: 100%" action="{{ route('user.update', auth()->user()->id) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="{{ auth()->user()->name }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class=" form-control-label">Username</label>
                                <input type="text" id="username" name="username"
                                    placeholder="{{ auth()->user()->username }}" class="form-control">
                            </div>
                            <input type="submit" name="save" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2022 Kelompok 5 Sistem Informasi <a href="https://elektro.ft.uns.ac.id/">Teknik
                                    Elektro UNS</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
