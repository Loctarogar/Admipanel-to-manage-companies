@extends('admin.layouts.admin_base')


@section('navbar')
    @include('admin.layouts.navbar')
@stop
@section('sidebar')
    @include('admin.layouts.sidebar')
@stop

@section('content')
    <div class="content-wrapper">
        <br>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-text-width"></i>
                            Employee information
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="dl-horizontal">
                            <dt>Id</dt>
                            <dd>{{ $employee->id }}</dd>
                            <dt>First name</dt>
                            <dd>{{ $employee->firstname }}</dd>
                            <dt>Lastname</dt>
                            <dd>{{ $employee->lastname }}</dd>
                            <dt>Company</dt>
                            <dd>{{ $employee->company }}</dd>
                            <dt>Email</dt>
                            <dd>{{ $employee->email }}</dd>
                            <dt>Phone</dt>
                            <dd>{{ $employee->phone }}</dd>
                            <dt>Created</dt>
                            <dd>{{ $employee->created_at }}</dd>
                            <dt>Updated</dt>
                            <dd>{{ $employee->updated_at }}</dd>
                            <dt>Is deleted</dt>
                            <dd>{{ $employee->deleted_at }}</dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                    @if(null === $employee->deleted_at)
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <form action="{{ route('admin.employee.destroy', $employee->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-block btn-danger btn-flat" >
                                </form>
                            </div>
                        </div>
                        <div><br></div>
                @else
                    <!-- Info Boxes Style 2 -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <form action="{{ route('admin.employee.restore', $employee->id) }}" method="get">
                                @csrf
                                <input type="submit" value="Restore" class="btn btn-block btn-success btn-flat">
                            </form>
                        </div>
                </div>
                @endif
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
