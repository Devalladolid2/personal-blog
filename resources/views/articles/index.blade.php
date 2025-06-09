@extends('layouts.app')

@section('content')
    <div
        class="container flex p-4 mb-4 bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 rounded-lg shadow">
        <h1 class="text-3xl font-bold">Personal Blog</h1>
        <a href="{{ url('/new') }}" class="text-black text-3xl no-underline font-bold">
            + Add
        </a>
        @forelse($articles as $article)
            <div>
                <h3 class="text-xl font-semibold break-words overflow-hidden">
                    <a href="{{ url('/article/' . $article->id) }}" class="text-black no-underline">
                        {{ $article->title }}
                    </a>
                </h3>
                <div class="flex items-center gap-4">
                    <a href="{{ url('/edit/' . $article->id) }}" class="text-sm text-black no-underline">
                        Edit
                    </a>
                    <form action="{{ url('/article/delete/' . $article->id) }}" method="POST"
                        onsubmit="return confirm('¿Eliminar este artículo?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-sm hover:underline bg-transparent border-0 p-0 m-0 cursor-pointer">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">There are no articles published yet.</p>
        @endforelse
    </div>
@endsection
