<?php 

namespace App\Repositories\QueryBuilder;

use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{	
	public function getAll()
	{
		return DB::table('users')->get();		
	}

	public function getPaginate($limit)
	{
		return DB::table('users')->paginate($limit);
	}

	public function getById($id)
	{
		return DB::table('users')
			->where('id', $id)
			->first();
	}

	public function create(array $payload)
	{
		return DB::table('users')->insert($payload);
	}

	public function update($id, array $payload)
	{
		return DB::table('users')
			->where('id', $id)
			->update($payload);
	}

	public function delete($id)
	{
		return DB::table('users')
			->where('id', $id)
			->delete();
	}
}