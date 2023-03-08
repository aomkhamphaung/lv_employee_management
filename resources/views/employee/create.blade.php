@extends('layouts.app-master')

@section('content')
    @auth
        <h3 class="mt-3">Create Employee</h3>

        <div class="row">
            <div class="col-md-2 my-4">
                <a class="btn btn-primary" href="{{route('employee.index')}}">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-dark align-center">
                <form action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" id="name"  class="form-control" placeholder="Employee name" value="{{old('name')}}">
                        <label for="floatingInput">Employee Name</label>

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    

                    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Manager')
                        <div class="form-floating mb-3">
                            {{-- <label for="" class="form-label">Branch Name</label> --}}
                            <select name="branch_id" id="" class="form-control mb-3">
                                <option value="0">Choose Branch</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <input type="text" name="branch_id" id="" value="{{ auth()->user()->branch_id }}" hidden>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
                
            
        </div>
    @endauth
@endsection