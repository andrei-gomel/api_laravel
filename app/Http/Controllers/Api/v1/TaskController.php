<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$tasks = Task::all())
            return response()->json(['message' => 'Не удалось получить записи'], 500);

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->all();

        if(!$task = Task::create($data))
            return response()->json(['message' => 'Не удалось сохранить запись'], 500);

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if(!$task = Task::find($id))
            return response()->json(['message' => 'Запись не найдена'], 404);

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $data = $request->all();

        if(!$task->update($data))
            return response()->json(['message' => 'Не удалось обновить запись'], 500);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        if(!$task = Task::find($id))
            return response()->json(['message' => 'Запись не найдена'], 404);

        if(!$task->delete())
            return response()->json(['message' => 'Не удалось удалить запись'], 500);

        return response()->json(['message' => 'Запись успешно удалена']);
    }
}
