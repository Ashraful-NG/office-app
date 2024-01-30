@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">
                Edit Document
            </h3>
        </div>
        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('document.form')
        </form>
    </div>
@endsection
