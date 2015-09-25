<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

use CodeDelivery\Repositories\CategoryRepository;

class CategoriesController extends Controller
{
    public function index(CategoryRepository $repository)
    {
    	$categories = $repository->paginate(5);
    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }
}
