@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <a href="{{ route('cvs.create') }}" class="btn btn-primary">Create CV</a>
                    
                    <div class="list-group">
                        @foreach (auth()->user()->cvs as $cv)
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $cv->first_name }} {{ $cv->last_name }}</h5>
                                <small>Last Edited: {{ $cv->updated_at }}</small>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('cvs.edit', compact('cv')) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('cvs.destroy', compact('cv')) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="col align-self-end">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                                <a href="{{ route('cvs.download-pdf', compact('cv')) }}" class="btn btn-secondary">Download PDF</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
