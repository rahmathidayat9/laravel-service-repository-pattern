<?php 

namespace App\Repositories\QueryBuilder;

use Illuminate\Support\Facades\DB;
use App\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{	
	public function getAll()
	{
		return DB::table('contacts')->get();		
	}

	public function getPaginate($limit)
	{
		return DB::table('contacts')->paginate($limit);
	}

	public function getById($id)
	{
		return DB::table('contacts')
			->where('id', $id)
			->first();
	}

	public function create(array $payload)
	{
		return DB::table('contacts')->insert($payload);
	}

	public function update($id, array $payload)
	{
		return DB::table('contacts')
			->where('id', $id)
			->update($payload);
	}

	public function delete($id)
	{
		return DB::table('contacts')
			->where('id', $id)
			->delete();
	}
}