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
                        <a href="#">View</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Category {{ $category->id }}</h4>
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
        <a href="{{ url('/category/' . $category->id . '/edit') }}" title="Edit Category">
            <button class="btn btn-xs btn-primary">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </button>
        </a>
        {!! Form::open([
            'method'=>'DELETE',
                'url' => ['category', $category->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-xs btn-danger',
                    'title' => 'Delete Category',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}

        <div class="table-responsive py-4">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>ID</th><td>{{ $category->id }}</td>
                    </tr>
                    <tr><th> Name </th><td> {{ $category->name }} </td></tr><tr><th> Description </th><td> {{ $category->description }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
