<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }

    public function index()
    {
        return Task::query()->get();
    }

    public function create()
    {
    }

    public function store(StoreTaskRequest $storeTaskRequest)
    {
    }

    public function show(int $id)
    {
        $this->taskRepository->getTaskById($id);
    }

    public function edit()
    {
    }

    public function update(UpdateTaskRequest $updateTaskRequest, int $id)
    {
    }

    /**
     * @return void
     *
     * @throws ModelNotFoundException
     * @throws LogicException
     */
    public function destroy(int $id)
    {
        $this->taskRepository->deleteTask($this->taskRepository->getTaskById($id));
    }
}
