@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <h2 class="text-decoration-underline my-3">Dettagli progetto</h2>
    <div class="card">
        <div class="text-center">
            @if ($project->picture)
                <img src="{{ asset("storage/$project->picture") }}" class="card-img-top w-50" alt="{{ $project->title }}">
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">{{ $project->title}}</h4>
            <h5 class="card-subtitle mb-2 text-muted">{{ $project->slug }}</h5>
            <div class="mb-3">
                @if( $project->type)
                    Tipologia: 
                    <a href="{{ route('admin.types.show', $project->type) }}" class="text-decoration-none">
                        <strong>{{ $project->type->name }}</strong>
                    </a>
                @else
                    Nessuna tipologia
                @endif
            </div>
            @if( $project->technologies->isNotEmpty()) <!-- metodo per controllare se una collection NON è vuota -->
                <div class="mb-3">
                    Tecnologie:
                    @foreach ($project->technologies as $technology)
                        <a href="{{ route('admin.technologies.show', $technology) }}" class="text-decoration-none">
                            <span class="badge text-bg-primary ms-1">{{ $technology->name }}</span>
                        </a>
                    @endforeach
                </div>
            @endif

            <p class="card-text">{{ $project->description }}</p>
            <div>Cliente:
                <strong>{{ $project->customer }}</strong>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary my-3">Torna ai progetti</a>
@endsection