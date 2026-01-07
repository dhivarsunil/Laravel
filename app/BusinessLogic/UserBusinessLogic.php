<?php

namespace App\BusinessLogic;
use App\DataAccessObject\UserDAOs;
use Illuminate\Support\Facades\Hash;

class UserBusinessLogic
{
    protected UserDAOs $userDAOs;
    /**
     * Create a new class instance.
     */
    public function __construct(UserDAOs $userDAOs)
    {
        $this->userDAOs = $userDAOs;
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userDAOs->create($data);
    }

    public function updateUser(int $id, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        return $this->userDAOs->update($id, $data);
    }

    public function getUser(int $id)
    {
        return $this->userDAOs->findById($id);
    }

    public function getAllUsers()
    {
        return $this->userDAOs->all();
    }
}
