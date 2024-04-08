@extends('layouts.app')

@section('content')
    <main class="container py-3">

        <h1>Modifica {{ $project->title }}</h1>
       
        <form action="{{route('dashboard.projects.update', $project->slug ) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input 
                    type="text" 
                    class="form-control
                        @error('title')
                            is-invalid
                        @enderror"
                    name="title"
                    id="title"
                    value="{{ old('title', $project->title) }}"
                    required
                />
            </div>

            <div class="mb-3">
                @if( $project->cover_image)
                    <img
                        src="{{ asset('/storage/' . $project->cover_image) }}"
                        alt="{{ $project->title }}"
                    >
                @endif

                <div class="mt-3">
                    <label for="cover_image">Carica immagine</label>
                    <input
                    type="file"
                    name="cover_image"
                    id="cover_image"
                    class="form-control
                        @error('cover_image') is-invalid @enderror">
                </div>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select
                    class="
                        form-select
                        form-select-lg
                        @error('type_id') is_invalid @enderror
                    "
                    name="type_id"
                    id="type_id"
                >
                    <option value="">Select One</option>
                    
                    @foreach ($types as $item)
                        <option
                            value="{{ $item->id }}"
                            {{ $item->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}
                        >
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Content</label>
                <textarea
                    type="text" 
                    class="form-control"
                    name="content"
                    id="content"
                    rows="3">{{ old('content', $project->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>

        </form>
    </main>
@endsection