@extends('layouts.app')

@section('content')
    <div
        class="container flex justify-between items-center p-4 mb-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow">
        <h1>New Article</h1>

        <form method="POST" action="{{ route('articles.create') }}">
            @csrf
            <div class="mb-3">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Publishing Date</label>
                <input type="date" name="published_at" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
@endsection
