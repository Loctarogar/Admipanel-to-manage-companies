@extends('admin.layouts.admin_base')


@section('navbar')
    @include('admin.layouts.navbar')
@stop
@section('sidebar')
    @include('admin.layouts.sidebar')
@stop

@section('content')
    <div class="content-wrapper">
        {{ $company }}
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
