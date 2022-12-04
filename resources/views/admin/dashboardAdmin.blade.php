@extends('layouts/templateAdmin')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/Picture4.png') }}" alt="ilibrary" style="max-width: 70%;" >
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">overview</h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1 py-5">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $books }}</h2>
                                    <span>Books Listed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 ">
                    <div class="overview-item overview-item--c2 py-5">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $authors}}</h2>
                                    <span>Authors Listed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3  py-5">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $publishers }}</h2>
                                    <span>Publishers Listed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4  py-5">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ auth()->user()->count() }}</h2>
                                    <span>User Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2022 Kelompok 5 Sistem Informasi <a
                                href="https://elektro.ft.uns.ac.id/">Teknik Elektro UNS</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

