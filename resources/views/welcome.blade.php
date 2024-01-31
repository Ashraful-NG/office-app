@extends('layouts.app')

@section('content')
    <div class="container">
        
        
            <div class="bg-white shadow p-5 my-5 rounded mx-auto">
                <div class="row ">
                    <div class="col-md-6"> 
                        <h2> Welcome to <br>
                         Document Management System (DMS)</h2>
        
                         <a class="btn btn-danger btn-lg px-5 w-100" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                     </div>
            <div class="col-md-6">
                 <img src="{{ asset('Hero.png') }}" width="150" alt="CAAB" class="me-2">
            </div>
            
            </div>
        </div>
    </div>
@endsection
