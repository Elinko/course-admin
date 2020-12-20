<?php namespace App\Controllers;


class Person extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$builder = $db->table('company');
		$builder->select('name, company_id');
		$data['company'] = $builder->get()->getResultArray();

		$builder2 = $db->table('person');
		$builder2->select('occupation');
		$data['occupation'] = $builder2->get()->getResultArray();

		// var_dump($query[0]['name']);
		return view('add-person', $data);
	}

	public function addPerson()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('person');
		$encrypter = \Config\Services::encrypter();

		$data = [
			'name' => $this->request->getVar('name'),
			'birth' => $this->request->getVar('birth'),
			'occupation' => $this->request->getVar('occupation'),
			'address' => $this->request->getVar('address'),
			'company_id' => $this->request->getVar('company_id'),
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($save);
 	}

	public function update( $queri_id = null)
	{
		$db = db_connect();
		$queri = $db->query("SELECT * FROM company WHERE company_id=$queri_id");
		$data['queri'] =  $queri->getResultArray();

		return view('update-company', $data);

	}

	public function updateCompany()
	{
		$db = db_connect();
		$builder = $db->table('company');
		$data = [
			'company_id' => $this->request->getVar('company_id'),
			'name' => $this->request->getVar('name'),
			'ico' => $this->request->getVar('ico'),
			'dic' => $this->request->getVar('dic'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'address' => $this->request->getVar('address')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);

	}

}