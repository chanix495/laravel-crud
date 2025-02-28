@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">
        <strong><em>Welcome, {{ Auth::user()->name }}!</em></strong>
    </h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">Create New Post</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @if($blogs->count() > 0)
            @foreach ($blogs as $blog)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">No blog posts yet. Create one now!</p>
        @endif
    </div>
</div>
@endsection
