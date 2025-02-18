@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la tâche</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p><strong>Statut :</strong> {{ $task->status }}</p>
            <p><strong>Créé le :</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection
