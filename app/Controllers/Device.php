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


		$builder4 = $db->table('device');
		$data['queri'] = $builder4->getWhere(['device_id' =>$queri_id])->getResultArray();

		$data['current_company'] = $db->table('company')->getWhere(['company_id' =>$data['queri'][0]['company_id']])->getResultArray();

		$data['company_device'] = $db->table('device')->getWhere(['company_id' =>$data['queri'][0]['company_id']])->getResultArray();


		// var_dump( $data['companyDevice']);

		return view('update-device', $data);
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

		$months = "+" . $data['device_time']. " months";
		$data['device_revision_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['device_revision']))));

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
			'device_name' => $this->request->getVar('device_name'),
			'company_id' => $this->request->getVar('company_id'),
			'device_time' => $this->request->getVar('device_time'),
			'device_revision' => formatTimeDatabase($this->request->getVar('device_revision'))
		];
		
		$months = "+" . $data['device_time']. " months";
		$data['device_revision_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['device_revision']))));

		$save = $builder->replace($data);
		return $this->response->setJSON($save);
	}

	public function deleteDevice()
	{
		$db = db_connect();
		$builder = $db->table('device');
		$save = $builder->delete(['device_id' => $this->request->getVar('device_id')]);

		return $this->response->setJSON($save);
	}

}
