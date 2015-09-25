<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests\AdminCategoryRequest;

class CategoriesController extends Controller
{
	private $repository;

	public function __construct(CategoryRepository $repository)
	{
		$this->repository = $repository;
	}

    public function index()
    {
    	$categories = $this->repository->paginate(5);
    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
    	$data = $request->all();
    	$this->repository->create($data);

    	return redirect()->route('admin.categories.index');
    }
}
