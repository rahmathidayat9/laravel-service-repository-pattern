<?php 

namespace App\Repositories\Eloquent;

use App\Models\Contact;
use App\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{	
	protected $model;

	public function __construct(Contact $model)
	{
		$this->model = $model;
	}

	public function getAll()
	{
		return $this->model->all();		
	}

	public function getPaginate($limit)
	{
		return $this->model->paginate($limit);
	}

	public function getById($id)
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $payload)
	{
		return $this->model->create($payload);
	}

	public function update($id, array $payload)
	{
		return $this->model->findOrFail($id)->update($payload);
	}

	public function delete($id)
	{
		return $this->model->findOrFail($id)->delete();
	}
}