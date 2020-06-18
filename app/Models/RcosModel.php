<?php namespace App\Models;

use App\Models\ProjectsModel;
use App\Models\LaborsModel;

class RcosModel{

    public $name = "";
    public $date = "";
    public $description = "";
    public $note = "";
    public $status = "";

    public $karpayi = 0;
    public $rejected = 0;
    public $pending = 0;
    public $approved = 0;
    public $amount = 0;
    
    public $materials = [];

    function __construct($project_id){
        $this->project_id = $project_id;

        $model = new ProjectsModel();
        $project = $model->getProjects($project_id);
        if (empty($project))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the projects item: ');
        }
        $rcos = json_decode($project['rcos']);

        $rco_max = 0;
        foreach ($rcos as $r=>$v) {
            if ($rco_max < intval($r)) {
                $rco_max = intval($r);
            }
        }
        $this->name = $rco_max+1;
    }
}
