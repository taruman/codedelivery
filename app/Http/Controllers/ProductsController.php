<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests\AdminProductRequest;

class ProductsController extends Controller
{

    private $repository;
    private $repository_category;

    public function __construct(ProductRepository $repository, CategoryRepository $repository_category)
    {
        $this->repository = $repository;
        $this->repository_category = $repository_category;
    }    

    public function index()
    {
        $products = $this->repository->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->repository_category->all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->repository_category->all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.products.index');
    }
}
