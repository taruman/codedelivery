<?php

namespace CodeDelivery\Services;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    private $clientRepository;
    private $userRepository;
    
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository) {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update($data, $id)
    {
    	$this->clientRepository->update($data, $id);
    	$user_id = $this->clientRepository->find($id)->user_id;
    	$this->userRepository->update($data, $user_id);
    }

    public function store($data)
    {
        $data['password'] = bcrypt(123456);
        $data['role'] = 'client';
        $user = $this->userRepository->create($data);

        $data['user_id'] =  $user->id;
        $this->clientRepository->create($data);
    }
}