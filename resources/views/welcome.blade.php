@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center">Welcome</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 shadow"> 
                    <img src="{{ asset('img/stock-photo-folders.jpeg') }}" class="img-fluid" alt="Responsive image"> 
            </div>
        </div>
    </div>
@endsection
