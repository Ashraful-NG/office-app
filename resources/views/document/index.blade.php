@extends('layouts.app')

@section('template_title')
    Document
@endsection

@section('content')
<div class="container-fluid">
    <!-- Your content goes here -->
    <div class="row">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('All Documents') }}
                            </span>
                            @if (auth()->check() && auth()->user()->role && auth()->user()->role->name == 'superadmin')
                                <div class="float-right">
                                    <a href="{{ route('document.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-3" id="successAlert">
                            <p>{{ $message }}</p>
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('successAlert').style.display = 'none';
                            }, 10000);
                        </script>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="container mt-3">
                                <form method="get" action="{{ route('document.index') }}">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="{{ $search }}" class="form-control"
                                               placeholder="Search by title, tag, status, file path, or description" aria-label="Search" aria-describedby="basic-addon2">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Title</th>
                                        <th>Tag</th>
                                        <th>Onlyuser</th>
                                        <th>Status</th>
                                        <th>File Name</th>                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($documents) > 0)
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $document->title }}</td>
                                                <td>{{ $document->tag }}</td>
                                                <td>{{ $document->user->name }}</td>
                                                <td>{{ $document->status }}</td>
                                                <td>{{ basename($document->file_path) }}</td>
                                                {{-- <td>{{ $document->description }}</td> --}}

                                                <td>
                                                    
                                                    
                                                        @if (auth()->check() && auth()->user()->role && auth()->user()->role->name == 'superadmin')
                                                        <div class="btn-group" role="group" aria-label="Document Actions">
                                                            <a class="btn btn-sm btn-primary" href="{{ route('document.show', $document->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                            </a>
                                                        
                                                            <a class="btn btn-sm btn-success" href="{{ route('document.edit', $document->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                            </a>
                                                        
                                                            <form action="{{ route('document.destroy', $document->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                        
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this document?')">
                                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                        @else
                                                            <a class="btn btn-sm btn-primary" href="{{ route('document.show', $document->id) }}">
                                                                <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                            </a>
                                                        @endif
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-danger" colspan="8">No Data Found</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                
                {!! $documents->links() !!}
            </div>
        </div>
@endsection
