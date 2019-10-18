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
                        <a href="#">Contact</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Contact</h4>
        </div>
        <div class="text-right">
            {!! Form::open([
            'method'=> 'POST',
            'url' => ['/contact'],
            ]) !!}
            {!! Form::button('<i class="fa fa-sync" aria-hidden="true"></i>', array(
            'type' => 'submit',
            'class' => 'btn btn-sm pd-x-15 btn-white btn-uppercase',
            )) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @include('flash::message')
    <div class="table-responsive">
        {!! $dataTable->table() !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
@include('shared.wrapperDatatable')
@endsection