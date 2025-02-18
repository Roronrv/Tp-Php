<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Afficher toutes les tâches de l'utilisateur connecté
    public function index()
    {
        $tasks = Auth::user()->tasks; // Récupère les tâches de l'utilisateur
        return view('tasks.index', compact('tasks'));
    }

    // Afficher le formulaire de création d'une tâche
    public function create()
    {
        return view('tasks.create');
    }

    // Enregistrer une nouvelle tâche
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:À faire,En cours,Terminé',
        ]);

        Auth::user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }

    // Afficher une tâche spécifique
    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    // Afficher le formulaire d'édition
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    // Mettre à jour une tâche
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:À faire,En cours,Terminé',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour !');
    }

    // Supprimer une tâche
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}
