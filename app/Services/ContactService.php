<?php 

namespace App\Services;

use App\Repositories\ContactRepositoryInterface;

class ContactService
{	
	private $contactRepository;

	public function __construct(ContactRepositoryInterface $contactRepository)
	{
		$this->contactRepository = $contactRepository;
	}

	public function getAllData()
	{
		return $this->contactRepository->getAll();
	}

	public function getPaginateData($limit)
	{
		return $this->contactRepository->getPaginate($limit);
	}

	public function getByIdData($id)
	{
		return $this->contactRepository->getById($id);
	}

	public function createData(array $payload)
	{
		return $this->contactRepository->create($payload);
	}

	public function updateData($id, array $payload)
	{
		return $this->contactRepository->update($id, $payload);
	}

	public function deleteData($id)
	{
		return $this->contactRepository->delete($id);
	}
}