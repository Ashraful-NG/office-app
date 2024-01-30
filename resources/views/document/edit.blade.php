@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Document
@endsection

@section('content')
    <section class="content container">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card bg-white">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Document</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('document.update', $document->id) }}" role="form"
                            method= 'POST' enctype='multipart/form-data'>
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('document.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
