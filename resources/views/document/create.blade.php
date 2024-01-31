@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Document
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                    <div class=" bg-white shadow ">
                        <span class="h2">{{ __('Create') }} Document</span>
                        <form method="POST" action="{{ route('document.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('document.form')

                        </form>
                </div>
            </div>
        </div>
    </section>
@endsection
