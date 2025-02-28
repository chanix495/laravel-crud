@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h1 class="text-center">{{ $blog->title }}</h1>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $blog->content }}</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection