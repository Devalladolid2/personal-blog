@extends('layouts.app')

@section('content')
    <div class="container p-4 mb-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow">
        <h1 class="text-3xl font-bold mb-6">Personal Blog</h1>
        @forelse($articles as $article)
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold">
                    <a href="{{ url('/article/' . $article->id) }}" class="text-black no-underline">
                        {{ $article->title }}
                    </a>
                    <span class="text-sm text-gray-500 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('F d, Y') }}
                    </span>
                </h3>
            </div>
        @empty
            <p class="text-gray-500">There are no articles published yet.</p>
        @endforelse
    </div>
@endsection
