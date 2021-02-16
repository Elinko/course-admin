<?php namespace App\Controllers;


class Company extends BaseController
{
	public function index()
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}
		$db = db_connect();
		$builder = $db->table('company');
		$data['company'] =  $builder->get()->getResultArray();

		// var_dump($query[0]['name']);
		return view('add-company', $data);

	}

	public function update( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('company');
		$data['queri'] = $builder->getWhere(['company_id' => $queri_id])->getResultArray();

		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['company_id' => $queri_id])->getResultArray();

		return view('update-company', $data);

	}

	public function updateCompany()
	{
		$db = db_connect();
		$builder = $db->table('company');
		$data = [
			'company_id' => $this->request->getVar('company_id'),
			'company_name' => $this->request->getVar('name'),
			'ico' => $this->request->getVar('ico'),
			'dic' => $this->request->getVar('dic'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'company_address' => $this->request->getVar('address')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);

	}

	public function addCompany()
	{
		$db      = db_connect();
		$builder = $db->table('company');
		$data = [

			'company_name' => $this->request->getVar('name'),
			'ico' => $this->request->getVar('ico'),
			'dic' => $this->request->getVar('dic'),
			'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'company_address' => $this->request->getVar('address')
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($save);
 	}

	public function deleteCompany()
	{
		$db = db_connect();
		$builder = $db->table('company');
		$save = $builder->delete(['company_id' => $this->request->getVar('company_id')]);

		$builder2 = $db->table('person');
		$builder3 = $db->table('person');

		$result = $builder3->select('person_id')->getWhere(['company_id' => $this->request->getVar('company_id')])->getResultArray();;

		$builder2->delete(['company_id' => $this->request->getVar('company_id')]);

		if(!empty($result)) {
			$builder4 = $db->table('certificate');
			$builder4->delete(['person_id' => $result[0]['person_id']]);

		}

		return $this->response->setJSON($save);
	}

}
