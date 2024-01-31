@extends('layouts.app')

@section('template_title')
    {{ $document->name ?? " __('Show') Document" }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12 bg-white">                  
             
                        <div
                            class="alert alert-danger m-5"
                            role="alert"
                        >
                        <h5>To Zoom In and Out on a Web Page:</h5>
                        1. Hold down the "Ctrl" key on your keyboard.<br>
                        2. While holding down the "Ctrl" key, scroll up (away from you) on your mouse wheel to zoom in.<br>
                        3. Conversely, scroll down (towards you) while holding down the "Ctrl" key to zoom out.<br>
                        Note: This zoom functionality works on most web browsers and applications that support zooming.<br>
                        </div>

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $document->title }}
                       
                            <strong>Tag:</strong>
                            {{ $document->tag }}
                       
                            <strong>Onlyuser:</strong>
                            {{ $document->onlyuser }}
                       
                            <strong>Status:</strong>
                            {{ $document->status }}
                       
                            <strong>File Path:</strong>
                            {{ $document->file_path }}

                       
                            <strong>Description:</strong>
                            {{ $document->description }}
                        </div>
           <iframe src="{{ Storage::url($document->file_path) }}#view=fit&toolbar=0&navpanes=0&scrollbar=0" width="100%" height="600px"></iframe>

        </div>
    </section>
@endsection
