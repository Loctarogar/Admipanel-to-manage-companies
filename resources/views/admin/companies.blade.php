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
        <!-- Companies Table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Companies</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Webpage</th>
                        <th>Created</th>
                        <th>Deleted</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allCompanies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td><a href="{{ route('admin.company', $company->id) }}" >{{ $company->name }}</a></td>
                            <td>{{ $company->email }}</td>
                            <td><img src="{{ asset( 'storage/'.$company->logo) }}" height="100" width="100"></td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td>{{ $company->deleted_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Webpage</th>
                        <th>Created</th>
                        <th>Deleted</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@stop



@section('footer')
    @include('admin.layouts.footer')
@stop
