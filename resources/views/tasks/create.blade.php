@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer une nouvelle tâche</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Titre</label>
        <input type="text" name="title" class="form-control" required>

        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>

        <label for="status">Statut</label>
        <select name="status" class="form-control">
            <option value="À faire">À faire</option>
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
        </select>

        <button type="submit" class="btn btn-success mt-2">Ajouter</button>
    </form>
</div>
@endsection
