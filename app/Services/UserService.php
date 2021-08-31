<?php 

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{	
	private $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function getAllData()
	{
		return $this->userRepository->getAll();
	}

	public function getPaginateData($limit)
	{
		return $this->userRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->userRepository->getById($id);
	}

	public function createData($payload)
	{
		$payload = [
			'fullname' => $payload->fullname,
	        'username' => $payload->username,
	        'email' => $payload->email,
	        'password' => Hash::make($payload->password),
	        'role' => $payload->role,
		];

		return $this->userRepository->create($payload);
	}

	public function updateData($id, $payload)
	{
		$payload = [
			'fullname' => $payload->fullname,
	        'username' => $payload->username,
	        'email' => $payload->email,
	        'password' => Hash::make($payload->password),
	        'role' => $payload->role,
		];
		
		return $this->userRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->userRepository->delete($id);
	}
}