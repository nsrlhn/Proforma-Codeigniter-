<?php namespace App\Controllers;

use App\Models\ClientsModel;
use CodeIgniter\Controller;

class Clients extends Controller
{
    public function overview()
    {
        $model = new ClientsModel();
        $data = [
        	'clients' => $model->getClients(),
        	'title' => 'Clients'
        ];
        echo view('templates/header', $data);
	    echo view('clients/overview', $data);
	    echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = new ClientsModel();

        if (! $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'phone'  => 'required',
            'address' => 'required'
        ]))
        {
            echo view('templates/header', ['title' => 'New Client']);
            echo view('clients/create');
            echo view('templates/footer');
        }
        else
        {   
            $model->save([
                'id' => $this->request->getVar('id'),
                'name' => $this->request->getVar('name'),
                'phone'  => $this->request->getVar('phone'),
                'address'  => $this->request->getVar('address'),
                'note'  => $this->request->getVar('note'),
            ]);

            return $this->overview();
        }
    }

    public function view()
    {
        $model = new ClientsModel();

        $data['client'] = $model->getClients($this->request->getVar('id'));

        if (empty($data['client']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the clients item: ');
        }

        $data['title'] = $data['client']['name'];

        echo view('templates/header', $data);
        echo view('clients/create', $data);
        echo view('templates/footer', $data);
    }
}