@extends('layouts.app')

@section('content')
    <div class="container">
        
        
            <div class="shadow p-5 my-5 rounded mx-auto" style="background: #E0E7FF);">
                <div class="row ">
                    <div class="col-md-6"> 
                        <h2 style="color:  #022C22;
                        font-family: Poppins;
                        font-size: 32px;
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        text-transform: capitalize;">Welcome to Document Management System (DMS)</h2>
        <p>We can help you every step of the way, from registering the business to filing the necessary paperwork with the IRS to qualify as a 501(c)(3) entity.</p>
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
