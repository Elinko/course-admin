<?php namespace App\Controllers;

class AddCompany extends BaseController
{
	public function index()
	{
		$db = db_connect();

		if ($this->request->isAJAX()) {
		   echo 'pracujeeem';
		}

		// var_dump($query[0]['name']);
		return view('add-company');

	}

	public function req()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('company');

		$data = [

		'name' => $this->request->getVar('name'),
		'ico'  => $this->request->getVar('ico'),
		'dic'  => $this->request->getVar('dic')
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($data);

 	}

}
