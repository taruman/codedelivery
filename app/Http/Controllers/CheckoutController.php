<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Auth;

class CheckoutController extends Controller
{

    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $client_id = $this->userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->orderRepository->scopeQuery(function($query) use ($client_id) {
            return $query->where('client_id', '=', $client_id);
        })->paginate();
        return view('customer.order.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->productRepository->all();
        return view('customer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->orderService->store($data);

        return redirect()->route('customer.order.index');
    }

}
