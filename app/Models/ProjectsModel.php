<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client','name','currency','rcos'];

    public function getProjects($id = false)
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