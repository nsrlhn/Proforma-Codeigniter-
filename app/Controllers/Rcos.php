<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProjectsModel;
use App\Models\MaterialsModel;
use App\Models\RcosModel;

class Rcos extends Controller
{
    public function create()
    {
        $data['rco'] = new RcosModel($this->request->getVar('id'));
    	$data['title'] = 'Create New RCO';

        echo view('templates/header', $data);
	    echo view('rcos/view', $data);
	    echo view('templates/footer');
    }

    public function edit($material = NULL)
    {
        $id = $this->request->getVar('id');
        $model = new ProjectsModel();
        $project = $model->getProjects($id);

        if (empty($project))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the projects item: ');
        }

        $rcos = json_decode($project['rcos']);

        if (!isset($_POST['rco_key']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Select RCO');
        }
        
        $rco_key = $_POST['rco_key'];
        $rco = $rcos->$rco_key;

        if ($material != NULL) {
            $m_id = $material->id;
            $rco->materials->$m_id = $material;
        }

        $data['rco'] = $rco;
        $data['title'] = 'Edit RCO: '.$data['rco']->name;

        echo view('templates/header', $data);
        echo view('rcos/view', $data);
        echo view('templates/footer');
    }

    public function pdf()
    {
        $id = $this->request->getVar('id');
        $model = new ProjectsModel();
        $project = $model->getProjects($id);
        $rcos = json_decode($project['rcos']);
        $rco_key = $_POST['rco_key'];

        $data['rco'] = $rcos->$rco_key;
        $data['title'] = 'RCO: '.$data['rco']->name;

        echo view('rcos/pdf', $data);
    }

    public function saveAndQuit()
    {
        $data = $this->saveRco();
        $data['title'] = $data['project']['name'];

        echo view('templates/header', $data);
        echo view('projects/view', $data);
        echo view('templates/footer', $data);

    }

    private function saveRco()
    {
    	$id = $this->request->getVar('id');
    	$model = new ProjectsModel();
        $project = $model->getProjects($id);
        if (empty($project))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the projects item: ');
        }
        $rcos = json_decode($project['rcos']);

        $rco = new RcosModel($id);
        $rco->name = $_POST['name'];
        $rco->description = $_POST['description'];
        $rco->date = $_POST['date'];
        $rco->note = $_POST['note'];
        $rco->materials = json_decode($_POST['materials']);
        

        $rco_name = $rco->name;
        $rcos->$rco_name = $rco;
        $project['rcos'] = json_encode($rcos);

    	$model->save([
                'id' => $id,
                'client' => $project['client'],
                'name'  => $project['name'],
                'currency'  => $project['currency'],
                'rcos' => $project['rcos']
            ]);

        $data['project'] = $project;
        $data['rco'] = $rco;
        return $data;
    }

    public function addMaterial()
    {
        $data = $this->saveRco();
        $data['title'] = 'Add New Material: ';
        $data['material'] = new MaterialsModel(count((array)$data['rco']->materials)+1);

        echo view('templates/header', $data);
        echo view('rcos/material', $data);
        echo view('templates/footer', $data);
    }
    public function editMaterial()
    {
        $data = $this->saveRco();
        $data['title'] = 'Edit Material: ';
        $material_id = $_POST['material_id'];
        $data['material'] = $data['rco']->materials->$material_id;

        echo view('templates/header', $data);
        echo view('rcos/material', $data);
        echo view('templates/footer', $data);
    }
    public function saveMaterial()
    {
        $rco = json_decode($this->request->getVar('rco_json'));

        $material = new MaterialsModel(count((array)$rco->materials)+1);
        $material->id = $_POST['material_id'];
        $material->name = $_POST['material_name'];
        $material->quantity = $_POST['material_quantity'];
        $material->unit = $_POST['material_unit'];
        $material->tax = $_POST['material_tax'];
        $material->unitprice = $_POST['material_unitprice'];

        $m_id = $material->id;
        $rco->materials->$m_id = $material;

        $_POST['rco_key'] = $rco->name;
        return $this->edit($material);
    }
}