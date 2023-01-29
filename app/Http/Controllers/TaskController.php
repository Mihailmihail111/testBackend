<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Tasks;
use Illuminate\Validation\ValidationException;

class TaskController extends BaseController
{
    use ValidatesRequests;

    public function index(): JsonResponse
    {
        $tasks = Tasks::all();
        return response()->json($tasks);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:255',
            'completed' => 'boolean',
        ]);
        $task = Tasks::create($request->all());

        return response()->json($task);
    }

    // update task by id
    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, [
            'title' => 'min:3|max:100',
            'description' => 'min:3|max:255',
            'completed' => 'boolean',
        ]);
        $task = Tasks::find($id);
        $task->update($request->all());

        return response()->json($task);
    }
}
