@extends('layouts.app')

@section('content')
<div class="container flex justify-between items-center p-4 mb-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow break-words overflow-hidden">
    <h1>{{ $article->title }}</h1>
    <p>{{ ($article->published_at)->translatedFormat('F d, Y') }}</p>
    <p>{!! nl2br(e($article->content)) !!}</p>
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">← Volver</a>
</div>
@endsection
