@extends('layouts.app')

@section('content')
    <div class="container">
        
        
            <div class="shadow p-5 my-5 rounded mx-auto" style="background: #E0E7FF;">
                <div class="row ">
                    <div class="col-md-6"> 
                        <h2 style="color:  #022C22;
                        font-family: Poppins;
                        font-size: 32px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-transform: capitalize;">Welcome to Document Management System (DMS)</h2>
        <p>
            A document management system (DMS) is a software that helps to store, organize, track, and retrieve digital documents. A DMS can also provide features such as version control, access control, search, and collaboration. A DMS can help to reduce paper usage, improve workflow, enhance security, and comply with legal requirements.
        </p>
                         <a class="btn btn-danger btn-lg px-5 w-100" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                     </div>
            <div class="col-md-6">
                 <img src="{{ asset('Hero.png') }}"   alt="CAAB" class="me-2">
            </div>
            
            </div>
        </div>
    </div>
@endsection
