@extends('admin.layouts.admin_base')

@section('navbar')
    @include('admin.layouts.navbar')
@stop
@section('sidebar')
    @include('admin.layouts.sidebar')
@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <p>Companies Content</p>
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
