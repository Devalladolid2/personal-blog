@extends('layouts.app')

@section('content')
    <div
        class="container flex justify-between items-center p-4 mb-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow">
        <h1>Update Article</h1>

        <form method="POST" action="{{ route('article.update', $article->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>

            <div class="mb-3">
                <label>Publishing Date</label>
                <input type="date" name="published_at" class="form-control" value="{{ $article->published_at }}" required>
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="6" required>{{ $article->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
