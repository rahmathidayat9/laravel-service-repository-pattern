<?php 

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{	
	protected $model;

	public function __construct(Blog $model)
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

	public function getBySlug($slug)
	{
		return $this->model->where('slug', $slug)->first();
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