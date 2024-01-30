<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $document->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tag') }}
            {{ Form::text('tag', $document->tag, ['class' => 'form-control' . ($errors->has('tag') ? ' is-invalid' : ''), 'placeholder' => 'Tag']) }}
            {!! $errors->first('tag', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('onlyuser') }}
            {{ Form::text('onlyuser', $document->onlyuser, ['class' => 'form-control' . ($errors->has('onlyuser') ? ' is-invalid' : ''), 'placeholder' => 'Onlyuser']) }}
            {!! $errors->first('onlyuser', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $document->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file_path', 'File Path') }}
            {{ Form::file('file_path', ['class' => 'form-control' . ($errors->has('file_path') ? ' is-invalid' : '')]) }}
            {!! $errors->first('file_path', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $document->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>