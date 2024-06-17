<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Retorna todos os registros.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Task::all();
    }

    /**
     * Adiciona um novo registro.
     *
     * @param Request $request
     * @return Task
     */
    public function store(Request $request): Task
    {
        $request->validate([
            'name' => 'required|max:255',
            'complete' => 'required'
        ]);

        $task = Task::create([
            'name' => $request->input('name'),
            'complete' => $request->input('complete')
        ]);

        return $task;
    }

    /**
     * Retorna um registro pelo seu ID.
     *
     * @param Task $task
     * @return Task
     */
    public function show(Task $task): Task
    {
        return $task;
    }

    /**
     * Atuaizar um registro pelo seu ID.
     *
     * @param Request $request
     * @param Task $task
     * @return Task
     */
    public function update(Request $request, Task $task): Task
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $task->name = $request->input('name');

        $task->save();

        return $task;
    }

    /**
     * Deletar um registro pelo seu ID.
     *
     * @param Task $task
     * @return object
     */
    public function destroy(Task $task): object
    {
        $task->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
