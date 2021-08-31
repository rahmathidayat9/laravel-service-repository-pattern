<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BlogService;

class HomeController extends Controller
{
	private $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
    	$blogs = $this->blogService->getPaginateData(4);

    	return view('home', ['blogs' => $blogs]);
    }

    public function blogShow($slug)
    {
    	$blog = $this->blogService->getBySlugData($slug);

    	return view('home-blog-show', ['blog' => $blog]);
    }
}
