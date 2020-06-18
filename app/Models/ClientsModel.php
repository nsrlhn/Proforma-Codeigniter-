<?php namespace App\Models;

use CodeIgniter\Model;

class ClientsModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','phone','address','note'];

    public function getClients($id = false)
	{
	    if ($id === false)
	    {
	        return $this->findAll();
	    }

	    return $this->asArray()
	                ->where(['id' => $id])
	                ->first();
	}
}