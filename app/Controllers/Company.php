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
		$data['company'] =  $builder->orderBy('company_name', 'ASC')->get()->getResultArray();

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

		$builder3 = $db->table('device');
		$data['device'] = $builder3->getWhere(['company_id' => $queri_id])->getResultArray();

		foreach ($data['person'] as $key => $value) {
			$data['person'][$key]['birth'] = formatTimePrint($value['birth']);
		}

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
			'contact_person' => $this->request->getVar('contact_person'),
			'ic_dph' => $this->request->getVar('ic_dph'),
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
			'contact_person' => $this->request->getVar('contact_person'),
			'ic_dph' => $this->request->getVar('ic_dph'),
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
		$builder5 = $db->table('device');

		$result = $builder3->select('person_id')->getWhere(['company_id' => $this->request->getVar('company_id')])->getResultArray();

		$builder2->delete(['company_id' => $this->request->getVar('company_id')]);

		if(!empty($result)) {
			$builder4 = $db->table('certificate');

			foreach ($result as $key => $value) {
				$builder4->delete(['person_id' => $value['person_id']]);
			}
		}

		$device = $builder5->select('device_id')->getWhere(['company_id' => $this->request->getVar('company_id')])->getResultArray();
		if(!empty($device)) {
			$builder6 = $db->table('device');
			$builder6->delete(['device_id' => $device[0]['device_id']]);
		}

		return $this->response->setJSON('$save');
	}

}
