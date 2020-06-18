<?php namespace App\Controllers;

use App\Models\ProjectsModel;
use App\Models\ClientsModel;
use CodeIgniter\Controller;

class Projects extends Controller
{
    public function overview()
    {
        $model = new ProjectsModel();
        $data = [
        	'projects' => $model->getProjects(),
        	'title' => 'Projects'
        ];
        echo view('templates/header', $data);
	    echo view('projects/overview', $data);
	    echo view('templates/footer');
    }
    
    public function create()
    {        
        if (! $this->validate([
            'client' => 'required',
            'name'  => 'required|max_length[255]',
            'currency'  => 'required|max_length[3]'
        ]))
        {
            $clientModel = new ClientsModel();
            $data['clients'] = $clientModel->getClients();

            echo view('templates/header', ['title' => 'New Project']);
            echo view('projects/create',$data);
            echo view('templates/footer');
        }
        else
        {
            $model = new ProjectsModel();
            $model->save([
                    'id' => $this->request->getVar('id'),
                    'client' => $this->request->getVar('client'),
                    'name'  => $this->request->getVar('name'),
                    'currency'  => $this->request->getVar('currency'),
                    'rcos' => $this->request->getVar('rcos')
                ]);
            return $this->overview();
        }
    }

    public function view()
    {
        $model = new ProjectsModel();
        $data['project'] = $model->getProjects($this->request->getVar('id'));
        if (empty($data['project']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the projects item: ');
        }

        $data['title'] = $data['project']['name'];

        echo view('templates/header', $data);
        echo view('projects/view', $data);
        echo view('templates/footer', $data);
    }

    public function pdf(){
        $model = new ProjectsModel();
        $data['project'] = $model->getProjects($this->request->getVar('id'));
        if (empty($data['project']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the projects item: ');
        }

        echo view('projects/pdf', $data);
    }
}