<?php namespace App\Controllers;


class Company extends BaseController
{
	public function index()
	{
		$db = db_connect();

		// var_dump($query[0]['name']);
		return view('add-company');

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

	public function addCompany()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('company');
		$encrypter = \Config\Services::encrypter();

		$data = [

			'name' => $this->request->getVar('name'),
			'ico' => $this->request->getVar('ico'),
			'dic' => $this->request->getVar('dic'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'address' => $this->request->getVar('address')
			// 'ico'  => $encrypter->encrypt($this->request->getVar('ico')),
			// 'dic'  => $encrypter->encrypt($this->request->getVar('dic')),
			// 'email'  => $encrypter->encrypt($this->request->getVar('email')),
			// 'phone'  => $encrypter->encrypt($this->request->getVar('phone')),
			// 'address'  => $encrypter->encrypt($this->request->getVar('address'))
		];

		$save = $builder->insert($data);
		// $ency = $encrypter->encrypt($this->request->getVar('ico'));
		// echo  $ency . ' and decrutp';
		//  $ency = $encrypter->decrypt($ency);
		// echo  $ency . ' and decrutp';

		return $this->response->setJSON($save);

 	}

}
