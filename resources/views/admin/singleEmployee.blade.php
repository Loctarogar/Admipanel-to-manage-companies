@extends('admin.layouts.admin_base')


@section('navbar')
    @include('admin.layouts.navbar')
@stop
@section('sidebar')
    @include('admin.layouts.sidebar')
@stop

@section('content')
    <div class="content-wrapper">
        <h1>{{ $employee->lastname }}</h1><br>
        <p>Id: {{ $employee->id }}</p>
        <p>Name: {{ $employee->firstname }}</p>
        <p>Last name: {{ $employee->lastname }}</p>
        <p>Company: {{ $employee->company }}</p>
        <p>Email: {{ $employee->email }}</p>
        <p>Phone: {{ $employee->phone }}</p>
        <p>Created at:{{ $employee->created_at }}</p>
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
