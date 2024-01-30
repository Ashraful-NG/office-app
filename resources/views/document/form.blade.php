<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $document->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                    {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group mb-2">
                    {{ Form::label('tag', 'Tag') }}
                    {{ Form::text('tag', $document->tag, ['class' => 'form-control' . ($errors->has('tag') ? ' is-invalid' : ''), 'placeholder' => 'Tag']) }}
                    {!! $errors->first('tag', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    {{ Form::label('onlyuser', 'Only User') }}
                    {{ Form::text('onlyuser', $document->onlyuser, ['class' => 'form-control' . ($errors->has('onlyuser') ? ' is-invalid' : ''), 'placeholder' => 'Onlyuser']) }}
                    {!! $errors->first('onlyuser', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group mb-2">
                    {{ Form::label('status', 'Status') }}
                    {{ Form::select('status', ['Test1' => 'Test1', 'Test2' => 'Test2', 'Test3' => 'Test3'], $document->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Select Status']) }}
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    {{ Form::label('file_path', 'File Path') }}
                    {{ Form::file('file_path', ['class' => 'form-control' . ($errors->has('file_path') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('file_path', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                @if ($document->file_path)
                    <div class="">
                        <a href="{{ Storage::url($document->file_path) }}"
                            target="_blank">{{ basename($document->file_path) }}</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-2">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', $document->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description', 'rows' => 3]) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            <a href="{{ route('document.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </div>
</div>
