<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

class OrdersController extends Controller
{

    private $repository;
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = $this->repository->paginate();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->repository->find($id);
        $deliverymen = $this->userRepository->findWhere(['role' => 'deliveryman']);
        return view('admin.orders.edit', compact('order', 'deliverymen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all, $id);

        return redirect()->route('admin.orders.index');
    }

}
