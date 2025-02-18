@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la tâche</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Titre</label>
        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>

        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $task->description }}</textarea>

        <label for="status">Statut</label>
        <select name="status" class="form-control">
            <option value="À faire" {{ $task->status == 'À faire' ? 'selected' : '' }}>À faire</option>
            <option value="En cours" {{ $task->status == 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Terminé" {{ $task->status == 'Terminé' ? 'selected' : '' }}>Terminé</option>
        </select>

        <button type="submit" class="btn btn-primary mt-2">Mettre à jour</button>
    </form>
</div>
@endsection
