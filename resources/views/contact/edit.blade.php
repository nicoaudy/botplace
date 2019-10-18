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
                        <a href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">edit</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit Contact #{{ $contact->id }}</h4>
        </div>
        <div class="text-right">
            <a href="{{ url('/contact') }}" title="Back">
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

    {!! Form::model($contact, [
        'method' => 'PATCH',
        'url' => ['/contact', $contact->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

    @include ('contact.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
</div>
@endsection
