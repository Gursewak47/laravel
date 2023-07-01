<?php

namespace App\Http\Controllers;

use App\DTO\UserData;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function index()
    {
        return User::query()->get();
    }

    /**
     * @param int $id
     * @return User
     * @throws ModelNotFoundException
     */
    public function show(int $id)
    {
        return $this->userRepository->getUserById($id);
    }

    /**
     * @param StoreUserRequest $storeUserRequest
     * @return User
     */
    public function store(StoreUserRequest $storeUserRequest)
    {
        return $this->userRepository->storeUser($storeUserRequest->validated());
    }

    /**
     * @param UpdateUserRequest $updateUserRequest
     * @param int $id
     * @return User
     */
    public function update(UpdateUserRequest $updateUserRequest, int $id)
    {
        return $this->userRepository->updateUser($this->userRepository->getUserById($id), $updateUserRequest->validated());
    }

    /**
     * @param int $id
     * @return void
     */
    public function destory(int $id)
    {
        $this->userRepository->deleteUser($this->userRepository->getUserById($id));
    }
}
