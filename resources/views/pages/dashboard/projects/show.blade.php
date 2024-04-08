@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1>{{ $project->title }}</h1>

        slug: {{ $project->slug}}

        @if ($project->cover_image)
            <img class="img-fluid" src="{{ asset('/storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
        @endif

        <p>
            <strong>
                {{ $project->type ? $project->type->name : 'nessun Type' }}
            </strong>
        </p>

        <p class="mt-5">
            {{ $project->content}}
        </p>
    </main>
@endsection