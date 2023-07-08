<?php

namespace App\Repositories\Task;

use App\Models\Post;
use App\Models\Task;

class TaskRepository
{
    public function getTaskById(int $id, array $relations=[]): Task
    {
        return Task::with($relations)->findOrFail($id);
    }


    public function storeTask($user, array $request)
    {
        $tasks = collect();
        if (! is_null($request)) {
            foreach ($request as $taskRequest) {
                $task = new Task();
                if (!is_null(@$taskRequest['id'])) {
                    $task = Task::findOrFail($taskRequest['id']);
                }
                $task->fill($taskRequest);
                $task->user()->associate($user);
                $task->save();
                $tasks->push($task);
            }
        }
    }


    public function updateTask(Task $task)
    {
    }


    public function deleteTask(Task $task): bool
    {
        return $task->delete();
    }
}
