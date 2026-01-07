<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function creatUser(UserFormRequest $request): JsonResponse
    {
        $user = $this->userService->create($request->validated());
        return response()->json(['statusCode' => 201, 'message' => 'User Added Successfully.', 'data' => $user]);
    }

    public function updateUser(UserFormRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->update($id, $request->validated());
        return response()->json(['statusCode' => 200, 'message' => 'User Update Successfully.', 'data' => $user]);
    }

    public function showUserById(int $id): JsonResponse
    {
        $user = $this->userService->getById($id);
        return response()->json(['statusCode' => 200, 'message' => 'User Data Fetched.', 'data' => $user]);
    }

    public function showAllUser(): JsonResponse
    {
        $users = $this->userService->getAll();
        return response()->json(['statusCode' => 200, 'message' => 'User Data Fetched.', 'data' => $users]);
    }
}
