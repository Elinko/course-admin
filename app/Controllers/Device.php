<?php namespace App\Controllers;


class device extends BaseController
{
	public function index($id =null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('device');
		$builder->select('device_name')->distinct();
		$data['device'] = $builder->get()->getResultArray();

		$builder2 = $db->table('company');
		$data['company'] = $builder2->get()->getResultArray();

		$builder3 = $db->table('company')->getWhere(['company_id' =>$id])->getResultArray();;

		$data['current_company'] = $builder3;

		// var_dump($query[0]['name']);
		return view('add-device', $data);

	}

	public function indexCompany($id =null  )
	{
		if ((session()->get('loggedIn')) == null) {
			return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('device');
		$builder->select('device_name')->distinct();
		$data['device'] = $builder->get()->getResultArray();

		$db2 = db_connect();
		$builder2 = $db2->table('company');
		$data['company'] = $builder2->get()->getResultArray();

		if($id != null) {
			$builder3 = $db->table('company')->getWhere(['company_id' =>$id])->getResultArray();;
			$data['current_company'] = $builder3;

			$builder4 = $db->table('device')->getWhere(['company_id' =>$id])->getResultArray();;
			$data['companyDevice'] = $builder4;

			// var_dump($data['companyDevice']);
		}

		return view('add-device', $data);
	}

	public function update( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();

		$builder = $db->table('device');
		$builder = $builder->select('device_name')->distinct();
		$builder = $builder->get('device');
		$data['device'] = $builder->get()->getResultArray();


		$builder2 = $db->table('company');
		$data['company'] = $builder2->get()->getResultArray();



		$builder4 = $db->table('device');
		$data['queri'] = $builder4->getWhere(['device_id' =>$queri_id])->getResultArray();

		$data['current_company'] = $db->table('company')->getWhere(['company_id' =>$data['queri'][0]['company_id']])->getResultArray();

		$data['companyDevice'] = $db->table('device')->getWhere(['company_id' =>$data['queri'][0]['company_id']])->getResultArray();


		var_dump( $data['device']);

		// return view('update-device', $data);
	}

	public function addDevice()
	{
		$db      = db_connect();
		$builder = $db->table('device');

		if($this->request->getVar('device_name') == '') {
			$deviceName = $this->request->getVar('device_name_new');
		} else {
			$deviceName = $this->request->getVar('device_name');
		}

		$data = [
			'device_name' => $deviceName,
			'company_id' => $this->request->getVar('company_id'),
			'device_time' => $this->request->getVar('device_time'),
			'device_revision' => formatTimeDatabase($this->request->getVar('device_revision'))
		];

		//
		$save = $builder->insert($data);
		return $this->response->setJSON($save);
 	}

	public function updateDevice()
	{
		$db = db_connect();
		$builder = $db->table('device');
		$data = [
			'device_id' => $this->request->getVar('device_id'),
			'device_name' => $this->request->getVar('name'),
			'os_time' => $this->request->getVar('os_time'),
			'aop_time' => $this->request->getVar('aop_time')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);
	}

	public function deleteDevice()
	{
		$db = db_connect();
		$builder = $db->table('certificate');
		$save = $builder->delete(['device_id' => $this->request->getVar('device_id')]);

		$builder2 = $db->table('device');
		$builder2->delete(['device_id' => $this->request->getVar('device_id')]);

		return $this->response->setJSON($save);
	}

}
