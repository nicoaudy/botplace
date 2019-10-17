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
                        <a href="{{ url('/category') }}">Category</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">edit</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit Category #{{ $category->id }}</h4>
        </div>
        <div class="text-right">
            <a href="{{ url('/category') }}" title="Back">
                <button class="btn btn-xs btn-warning">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                </button>
            </a>
        </div>
    </div>
    <div class="">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($category, [
        'method' => 'PATCH',
        'url' => ['/category', $category->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include ('category.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
</div>
@endsection
