@extends('laraboi.app')

@section('content')

<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">Token</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Token</h4>
        </div>
    </div>
    @include('flash::message')
    <div class="card card-profile-interest">
        <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
            <h6 class="tx-uppercase tx-semibold mg-b-0">Token</h6>
            <nav class="nav nav-with-icon tx-13">
                <a href="/token/create" class="nav-link">Add New <i data-feather="plus" class="mg-l-5 mg-r-0"></i></a>
            </nav>
        </div><!-- card-header -->
        <div class="card-body pd-25">
            <div class="row">
                @forelse($token as $row)
                <div class="col-sm col-lg-6 col-xl">
                    <div class="media">
                        <div class="wd-45 ht-45 bg-gray-900 rounded d-flex align-items-center justify-content-center">
                            <i data-feather="lock" class="tx-white-7 wd-20 ht-20"></i>
                        </div>
                        <div class="media-body pd-l-25">
                            <h6 class="tx-color-01 mg-b-5">
                                <a href="{{ url('/token/' . $row->id) }}">{{ $row->name}}</a>
                            </h6>
                            <p class="tx-12 mg-b-10">{{ $row->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm col-lg-6 col-xl">
                    <div class="media">
                        <div class="wd-45 ht-45 bg-gray-900 rounded d-flex align-items-center justify-content-center">
                            <i data-feather="lock" class="tx-white-7 wd-20 ht-20"></i>
                        </div>
                        <div class="media-body pd-l-25">
                            <h6 class="tx-color-01 mg-b-5">Please create one</h6>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection