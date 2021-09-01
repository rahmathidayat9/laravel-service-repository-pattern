<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\BlogService;

class ApiBlogController extends Controller
{
    /**
     * BlogService Implementation.
     * 
     * @var BlogService
     */
    private $blogService;

    /**
     * Constructor of the controller.
     * 
     * @param \App\Services\BlogService $blogService
     * @return void
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->getAllData();

        return response()->json([
            'data' => $blogs,
            'message' => 'Data listed successfully',
        ]);
    }

    public function store(BlogRequest $request)
    {
        $blog = $this->blogService->createData($request);

        return response()->json([
            'data' => $blog,
            'message' => 'Data created successfully',
        ]);
    }

    public function show($id)
    {
        $blog = $this->blogService->getByIdData($id);

        return response()->json([
            'data' => $blog,
            'message' => 'Data showed successfully',
        ]);
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = $this->blogService->updateData($id, $request);

        return response()->json([
            'data' => $blog,
            'message' => 'Data updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $blog = $this->blogService->deleteData($id);

        return response()->json([
            'data' => $blog,
            'message' => 'Data deleted successfully',
        ]);
    }
}
