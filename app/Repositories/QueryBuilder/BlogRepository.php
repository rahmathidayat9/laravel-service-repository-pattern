<?php 

namespace App\Repositories\QueryBuilder;

use Illuminate\Support\Facades\DB;
use App\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{	
	public function getAll()
	{
		return DB::table('blogs')->get();		
	}

	public function getPaginate($limit)
	{
		return DB::table('blogs')->paginate($limit);
	}

	public function getById($id)
	{
		return DB::table('blogs')
			->where('id', $id)
			->first();
	}

	public function getBySlug($slug)
	{
		return DB::table('blogs')
			->where('slug', $slug)
			->first();
	}

	public function create(array $payload)
	{
		return DB::table('blogs')->insert($payload);
	}

	public function update($id, array $payload)
	{
		return DB::table('blogs')
			->where('id', $id)
			->update($payload);
	}

	public function delete($id)
	{
		return DB::table('blogs')
			->where('id', $id)
			->delete();
	}
}