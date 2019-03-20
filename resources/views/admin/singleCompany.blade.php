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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-text-width"></i>
                    Company description
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>{{ $company->name }}</dd>
                    <dt>Email</dt>
                    <dd>{{ $company->email }}</dd>
                    <dt>Company logo</dt>
                    <dd>logo</dd>
                    <dt>Website</dt>
                    <dd>{{ $company->website }}</dd>
                    <dt>Created at</dt>
                    <dd>{{ $company->created_at }}</dd>
                    <dt>Last update</dt>
                    <dd>{{ $company->updated_at }}</dd>
                    <dt>Is deleted</dt>
                    <dd>{{ $company->deleted_at }}</dd>
                </dl>
            </div>
            @if(null === $company->deleted_at)
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <form action="{{ route('admin.company.destroy', $company->id)}}" method="post">
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
                    <form action="{{ route('admin.company.restore', $company->id) }}" method="get">
                        @csrf
                        <input type="submit" value="Restore" class="btn btn-block btn-success btn-flat">
                    </form>
                    </div>
                </div>
            @endif
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- ./col -->
    <div class="col-md-6">
            <!-- Box Comment -->
            <div class="card card-widget">

                <!-- /.card-header -->
                <div class="card-body">
                    <img class="img-fluid pad" src="{{ asset('storage/'.$company->logo) }}" alt="Photo">
                </div>
                <!-- /.card-body -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    </div>
    </div>
@stop

@section('footer')
    @include('admin.layouts.footer')
@stop
