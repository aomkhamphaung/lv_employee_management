@extends('layouts.app-master')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3 mt-3 text-dark"><strong>Employees</strong> Dashboard</h1>

            
                <div class="row">
                    <div class="col-md-12 ms-auto my-3">
                        @can('isAdmin')
                        <a href="{{ route('employee.create') }}" class="btn btn-outline-primary float-end">Add New Employee</a>
                        @elsecan('isManager')
                        <a href="{{ route('employee.create') }}" class="btn btn-outline-primary float-end">Add New Employee</a>
                        @elsecan('isBranchManager')
                        <a href="{{ route('employee.create') }}" class="btn btn-outline-primary float-end">Add New Employee</a>
                        @endcan
                    </div>
                </div>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-bordered text-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($employees as $employee)
                                <form action="{{route('employee.destroy', $employee->id)}}" method="post">
                                @csrf
                                @method('delete')
                                    <tr>
                                        <td>{{$employee->id}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->branch->branch_name}}</td>
                                         @can('isAdmin')
                                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a>
                                              <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                                                 <button class="btn btn-outline-danger">Delete</button>
                                        </td>  
                                        @elsecan('isManager') 
                                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a> 
                                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                                            </td>
                                        @elsecan('isBranchManager')
                                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn    btn-outline-info">View</a> 
                                                <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-warning">Edit</a>
                                            </td>
                                        @else            
                                            <td><a href="{{ route('employee.show',$employee->id) }}" class="btn btn-outline-info">View</a> 
                                            </td> 
                                        @endcan
                                    </tr>
                                </form>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection