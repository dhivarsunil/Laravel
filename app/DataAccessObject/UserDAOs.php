<?php

namespace App\DataAccessObject;
use App\Models\User;

class UserDAOs
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function all()
    {
        return User::all();
    }
}
