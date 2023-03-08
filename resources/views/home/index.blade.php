@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1 class="text-dark">Dashboard</h1>
        <p class="text-dark">Only authenticated users can access this section.</p>

        @can('isAdmin')
            <a class="btn btn-success btn-lg">Admin Access</a>
        @elsecan('isManager')
            <a class="btn btn-success btn-lg">Manager Access</a>
        @else
            <a class="btn btn-success btn-lg">User Access</a>
        @endcan
        @endauth

        @guest
        <h1 class="text-dark">Home page</h1>
        <p class="text-dark">You are in home page.</p>
        @endguest
    </div>
@endsection