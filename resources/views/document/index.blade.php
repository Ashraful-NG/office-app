@extends('layouts.app')

@section('template_title')
    Document
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Document') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('document.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="get" action="{{ route('document.index') }}">
                                <div class="form-group">
                                    <input type="text" name="search" value="{{ $search }}" placeholder="Search by title, tag, status, file path, or description">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Title</th>
										<th>Tag</th>
										<th>Onlyuser</th>
										<th>Status</th>
										<th>File Path</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $document->title }}</td>
											<td>{{ $document->tag }}</td>
											<td>{{ $document->onlyuser }}</td>
											<td>{{ $document->status }}</td>
											<td>{{ $document->file_path }}</td>
											<td>{{ $document->description }}</td>

                                            <td>
                                                <form action="{{ route('document.destroy',$document->id) }}" method="POST">

                                                    @if(auth()->check() && auth()->user()->role && auth()->user()->role->name == "superadmin")
                                                    <a class="btn btn-sm btn-primary " href="{{ route('document.show',$document->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
   
                                                    <a class="btn btn-sm btn-success" href="{{ route('document.edit',$document->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                
@else
<a class="btn btn-sm btn-primary " href="{{ route('document.show',$document->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                   
@endif


                                               </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $documents->links() !!}
            </div>
        </div>
    </div>
@endsection
