@isset($document->file_path)
    @php
        $file_path = $document->file_path ?? '';
        $prefix = 'document/';
        $file_name = str_replace($prefix, '', $file_path);
    @endphp
@endisset

<div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="title here"
        value="{{ isset($document->title) ? $document->title : old('title') }}">
    @error('title')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label" for="doc_file">Upload:</label>
    @isset($file_name)
        <span class="text-success">
            <a href="{{ asset('storage/' . $document['file_path']) }}" target="_blank">
                <small>{{ $file_name ?? '' }}</small>
            </a>
        </span>
    @endisset
    <input type="file" name="doc_file" class="form-control" id="doc_file">
    @error('doc_file')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
</div>

<div class="d-flex gap-2">
    <x-go-back />
    <button class="btn btn-md btn-success">Submit</button>
</div>
