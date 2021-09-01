<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class ApiUserController extends Controller
{
    /**
     * UserService Implementation.
     * 
     * @var UserService
     */
    private $userService;

    /**
     * Constructor of the controller.
     * 
     * @param \App\Services\UserService $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllData();

        return response()->json([
            'data' => $users,
            'message' => 'Data listed successfully',
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createData($request);

        return response()->json([
            'data' => $user,
            'message' => 'Data created successfully',
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->getByIdData($id);

        return response()->json([
            'data' => $user,
            'message' => 'Data showed successfully',
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->updateData($id, $request);

        return response()->json([
            'data' => $user,
            'message' => 'Data updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $user = $this->userService->deleteData($id);

        return response()->json([
            'data' => $user,
            'message' => 'Data deleted successfully',
        ]);
    }
}
