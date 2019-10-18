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
    {!! Form::open(['method' => 'GET', 'url' => '/contact', 'role' => 'search']) !!}
    <div class="row row-sm mg-b-10">
        <div class="col-sm-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-light" type="submit" id="button-addon2"><i
                            class="fa fa-search"></i></button>
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
                        <th>ID</th>
                        <th>Token</th>
                        <th>Identifier</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Is Bot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->token->name }}</td>
                        <td>{{ $item->identifier }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->is_bot ? 'Y' : 'N' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $contact->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection