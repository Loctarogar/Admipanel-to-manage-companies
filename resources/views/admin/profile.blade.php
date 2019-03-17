@extends('admin.layouts.admin_base')


@section('navbar')
    @include('admin.layouts.navbar')
@stop
@section('sidebar')
    @include('admin.layouts.sidebar')
@stop

@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset('admin/dist/img/user2-160x160.jpg') }}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">Admin</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Id</b> <a class="float-right">{{ Auth::user()->id }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Name</b> <a class="float-right">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
        </div>
    <!-- Content Wrapper. Contains page content -->

    </section>
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
