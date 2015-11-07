<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\OrderRepository;

class OrderService
{
    private $orderRepository;
    private $userRepository;
    private $cupomRepository;
    private $productRepository;
    
    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, CupomRepository $cupomRepository, ProductRepository $productRepository) {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
    }

    
    public function store(array $data)
    {
    	\DB::beginTransaction();
    	try {
	    	$data['status'] = 0;
	    	if(isset($data['cupom_code']))
	    	{
	    		$cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();
	    		$data['cupom_id'] = $cupom->id;
	    		$cupom->used = 1;
	    		$cupom->save();
	    		unset($data['cupom_code']);
	    	}

	    	$items = $data['items'];
	    	unset($data['items']);

	    	$order = $this->orderRepository->create($data);
	    	$total = 0;

	    	foreach ($items as $item) {
	    		$item['price'] = $this->productRepository->find($item['product_id'])->price;
	    		$order->items()->create($item);
	    		$total += $item['price'] * $item['qtd'];
	    	}

	    	$order->total = $total;
	    	if (isset($cupom)) {
	    		$order->total = $total - $cupom->value;
	    	}
	    	$order->save(); 
	    	\DB::commit();   		
    	} catch (\Exception $e) {
    		\DB::rollback();
    		throw $e;
    	}
    }
}