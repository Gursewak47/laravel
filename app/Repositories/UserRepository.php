<?php

namespace App\Repositories;

use App\DTO\UserData;
use App\Models\User;
use App\Repositories\Post\PostRepository;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;
use LogicException;

class UserRepository
{
    /**
     * @param int $id
     * @param array $relations
     * @return User
     * @throws ModelNotFoundException
     */
    public function getUserById(int $id, array $relations=[]): User
    {
        return User::with($relations)->findOrFail($id);
    }

    /**
     * @param UserData $userData
     * @return User
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     * @throws InvalidCastException
     */
    public function storeUser(array $request): User
    {
        $user = User::create($request);
        $this->saveChildRecords($user, $request);
        $user->password = bcrypt('password');
        return $user->load('posts');
    }

    public function saveChildRecords($user, array $request)
    {
        (new PostRepository())->storePost($user, $request['posts']);
    }

    /**
     * @param User $user
     * @param UserData $userData
     * @return User
     * @throws MassAssignmentException
     */
    public function updateUser(User $user, array $request): User
    {
        if (is_int($user)) {
            $user = $this->getUserById($user);
        }
        $user->fill($request);
        $this->saveChildRecords($user, $request);
        $user->update();
        return $user;
    }

    /**
     * @param User $user
     * @return bool
     * @throws LogicException
     */
    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
