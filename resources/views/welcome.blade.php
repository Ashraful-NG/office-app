@extends('layouts.app')

@section('content')
    <div class="container">
        
        
            <div class="bg-white shadow p-5 my-5 rounded mx-auto " style="max-width: 600px">
                <div class="row ">
            <div class="col-md-4">
                 <img src="{{ asset('img/caab24.png') }}" width="30" alt="CAAB" class="me-2">
            </div>
            <div class="col-md-8"> 
                <h2> Welcome to <br>
                 Document Management System (DMS)</h2>

                 <a class="btn btn-danger btn-lg px-5 w-100" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
             </div>
            </div>
        </div>
    </div>
@endsection
