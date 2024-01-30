@extends('layouts.app')

@section('content')
    <div class="container">
        <x-alert />
        @if (auth()->user() && auth()->user()->role->name == 'superadmin')
            <div class="text-end">
                <a class="btn btn-md btn-success mt-4" href="{{ route('documents.create') }}">Add Document</a>
            </div>
        @endif
        <h2>Document List </h2>
        <table class="table table-striped table-bordered text-center">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            @isset($documents)
                @if (count($documents) > 0)
                    @foreach ($documents as $key => $document)
                        <tr>
                            <td>
                                {{ $documents->firstItem() + $key }}
                            </td>
                            <td>
                                {{ $document->title }}
                            </td>
                            <td class="d-flex gap-2 justify-content-center">
                                @isset($document['file_path'])
                                    <a href="{{ asset('storage/' . $document['file_path']) }}" target="_blank"
                                        class="btn btn-sm btn-success">
                                        View
                                    </a>
                                    <a href="{{ asset('storage/' . $document['file_path']) }}" download class="btn btn-sm btn-info">
                                        Download
                                    </a>
                                @endisset
                                @if (auth()->user() && auth()->user()->role->name == 'superadmin')
                                    <a href="{{ route('documents.edit', $document->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No data found</td>
                    </tr>
                @endif
            @endisset
        </table>
        {{ $documents->links() }}
    </div>
@endsection
