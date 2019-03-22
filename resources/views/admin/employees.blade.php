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
        <!-- Employees Table -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Employees</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Company name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created</th>
                        <th>Deleted</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allEmployees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td><a href="{{ route('admin.employee', $employee->id) }}">{{ $employee->firstname }}</a></td>
                            <td>{{ $employee->lastname }}</td>
                            <td>
                                @if($employee->companies)
                                {{ $employee->companies->name }}
                                @endif
                            </td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->deleted_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
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
