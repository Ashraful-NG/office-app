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
             
<div
    class="alert alert-danger"
    role="alert"
>
<h1>To Zoom In and Out on a Web Page:</h1>
1. Hold down the "Ctrl" key on your keyboard.<br>
2. While holding down the "Ctrl" key, scroll up (away from you) on your mouse wheel to zoom in.<br>
3. Conversely, scroll down (towards you) while holding down the "Ctrl" key to zoom out.<br>
Note: This zoom functionality works on most web browsers and applications that support zooming.<br>
</div>

           <iframe src="{{ Storage::url($document->file_path) }}#view=fit&toolbar=0&navpanes=0&scrollbar=0" width="100%" height="600px"></iframe>

        </div>
    </div>
</div>
    </section>
@endsection
