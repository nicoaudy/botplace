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
                        <a href="#">Category</a>
                    </li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Category</h4>
        </div>
        <div class="text-right">
            <a href="{{ url('/category/create') }}" class="btn btn-sm pd-x-15 btn-white btn-uppercase" title="Add New Category">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
        </div>
    </div>
    @include('flash::message')
    {!! Form::open(['method' => 'GET', 'url' => '/category', 'role' => 'search'])  !!}
        <div class="row row-sm mg-b-10">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    <div data-label="User" class="df-example demo-table">
        <div class="table-responsive">
            <table class="table table-striped mg-b-0 table-bordered table-hover">
                <thead class="thead-primary">
                    <tr class="no-b">
                        <th>ID</th><th>Name</th><th>Description</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td><td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ url('/category/' . $item->id) }}" title="View Category"><button class="btn btn-xs btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="{{ url('/category/' . $item->id . '/edit') }}" title="Edit Category" class="btn btn-xs btn-info"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/category', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-xs btn-danger',
                                        'title' => 'Delete Category',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</div>
@endsection
