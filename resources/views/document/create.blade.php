@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">
                Create Document
            </h3>
        </div>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('document.form')
        </form>
    </div>
@endsection
