@extends('layouts.app')

@section('template_title')
    {{ $document->name ?? " __('Show') Document" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Document</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('document.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $document->title }}
                        </div>
                        <div class="form-group">
                            <strong>Tag:</strong>
                            {{ $document->tag }}
                        </div>
                        <div class="form-group">
                            <strong>Onlyuser:</strong>
                            {{ $document->onlyuser }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $document->status }}
                        </div>
                        <div class="form-group">
                            <strong>File Path:</strong>
                            {{ $document->file_path }}

                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $document->description }}
                        </div>

                    </div>
                </div>
            </div>

            <iframe style='pointer-events: none;' src="{{ Storage::url($document->file_path) }}#view=fit&toolbar=0&navpanes=0" width="100%" height="600px"></iframe>


        </div>
    </section>
@endsection
