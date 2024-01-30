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

            <div class="container mt-3">
                <form method="get" action="{{ route('document.index') }}">
                    <!-- Your form content -->
                </form>
        
                <div class="embed-responsive embed-responsive-16by9 mt-3 iframe-zoom">
                    <iframe class="embed-responsive-item" src="{{ Storage::url($document->file_path) }}#view=fit&toolbar=0&navpanes=0" width="100%" height="600px"></iframe>
                </div>
        
                <!-- Zoom buttons -->
                <div class="btn-group zoom-btns" role="group" aria-label="Zoom Options">
                    <button type="button" class="btn btn-secondary" onclick="zoomIn()">Zoom In</button>
                    <button type="button" class="btn btn-secondary" onclick="zoomOut()">Zoom Out</button>
                </div>
            </div>
        </div>
    </section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript for zooming -->
<script>
    function zoomIn() {
        var iframe = document.querySelector('.iframe-zoom');
        iframe.style.transform = 'scale(1.2)'; // You can adjust the zoom level
    }

    function zoomOut() {
        var iframe = document.querySelector('.iframe-zoom');
        iframe.style.transform = 'scale(1)';
    }
</script>
@endsection
