<?php

namespace App\Repositories;

use App\DTO\UserData;
use App\Models\User;
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
    public function storeUser(UserData $userData): User
    {
        $user =new User();
        $user->fill($userData->toArray());
        $user->password = bcrypt($userData->toArray()['password']);
        $user->save();
        return $user;
    }

    /**
     * @param User $user
     * @param UserData $userData
     * @return User
     * @throws MassAssignmentException
     */
    public function updateUser(User $user, UserData $userData): User
    {
        $user->fill($userData->toArray());
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
