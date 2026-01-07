<?php

namespace App\Services;

use App\BusinessLogic\UserBusinessLogic;
use Illuminate\Support\Facades\Cache;

class UserService
{
    protected UserBusinessLogic $userBO;
    /**
     * Create a new class instance.
     */
    public function __construct(UserBusinessLogic $userBO)
    {
        $this->userBO = $userBO;
    }

    public function create(array $data)
    {
        Cache::forget('users_all');
        return $this->userBO->createUser($data);
    }

    public function update(int $id, array $data)
    {
        Cache::forget("user_{$id}");
        Cache::forget('users_all');
        return $this->userBO->updateUser($id, $data);
    }

    public function getById(int $id)
    {
        return Cache::remember("user_{$id}", 600, function () use ($id) {
            return $this->userBO->getUser($id);
        });
    }

    public function getAll()
    {
        return Cache::remember('users_all', 600, function () {
            return $this->userBO->getAllUsers();
        });
    }
}
