<?php namespace App\Controllers;


class Person extends BaseController
{

	public function index($id =null )
	{
		if ((session()->get('loggedIn')) == null) {
			return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('company');
		$builder->select('company_name, company_id');

		$builder3 = $db->table('company')->getWhere(['company_id' =>$id])->getResultArray();;

		$data['current_company'] = $builder3;

		$data['company'] = $builder->get()->getResultArray();

		$builder2 = $db->table('person');
		$builder2->select('occupation')->distinct();
		// var_dump(($builder2));
		$data['occupation'] = $builder2->get()->getResultArray();

		// var_dump($query[0]['name']);
		return view('add-person', $data);
	}

	public function indexCompany($id =null  )
	{
		if ((session()->get('loggedIn')) == null) {
			return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('company');
		$builder->select('company_name, company_id');

		$builder3 = $db->table('company')->getWhere(['company_id' =>$id])->getResultArray();;

		$data['current_company'] = $builder3;

		$data['company'] = $builder->get()->getResultArray();

		$builder2 = $db->table('person');
		$builder2->select('occupation')->distinct();
		// var_dump(($builder2));
		$data['occupation'] = $builder2->get()->getResultArray();

		// var_dump($query[0]['name']);
		return view('add-person', $data);
	}

	public function addPerson()
	{
		$db      = db_connect();
		$builder = $db->table('person');
		$data = [
			'name' => $this->request->getVar('name'),
			'birth' => date("Y-m-d", strtotime($this->request->getVar('birth'))),
			'occupation' => $this->request->getVar('occupation'),
			'address' => $this->request->getVar('address'),
			'company_id' => $this->request->getVar('company_id'),
		];

		$save = $builder->insert($data);

		$builder2 = $db->table('person');

		$save = $builder2->getWhere(['name' =>$data['name'], 'birth' => $data['birth'] ])->getResultArray();

		return $this->response->setJSON($save[0]['person_id']);
 	}

	public function update( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();
		$queri = $db->query("SELECT * FROM person WHERE person_id=$queri_id");
		$data['queri'] =  $queri->getResultArray();
		$data['queri'][0]['birth'] = date("d-m-Y", strtotime($data['queri'][0]['birth'])) ;

		$builder = $db->table('company');
		$builder->select('company_name, company_id');
		$data['company'] = $builder->get()->getResultArray();

		$builder2 = $db->table('person');
		$builder2->select('occupation');
		$data['occupation'] = $builder2->get()->getResultArray();

		$builder3 = $db->table('certificate');
		$data['certificate'] = $builder3->getWhere(['person_id' =>$queri_id])->getResultArray();

		foreach ($data['certificate'] as $key => $value) {
			$builder4 = $db->table('course');
			$builder4 = $builder4->getWhere(['course_id' =>$value['course_id']])->getResultArray();
			$data['certificate'][$key] += $builder4[0];
		}

		foreach ($data['certificate'] as $key => $value) {
			$value['os'] = date("d-m-Y", strtotime($value['os']));
			$value['aop'] = date("d-m-Y", strtotime($value['aop']));
		}

		return view('update-person', $data);

	}

	public function searchPerson( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$data = [
			'name' => $this->request->getVar('name')
		];


		$db = db_connect();
		$builder = $db->table('person')->like('name', $data['name'], 'both')
									->join('company', 'company.company_id = person.company_id ', 'inner')
									->get()->getResultArray();

		foreach ($builder as $key => $value) {
			$value['birth'] = date("Y-m-d", strtotime($value['birth']));
		}

		$data['persons'] =  $builder;

		return json_encode($data);


	}


	public function updatePerson()
	{
		$db = db_connect();
		$builder = $db->table('person');
		$data = [
			'person_id' => $this->request->getVar('person_id'),
			'name' => $this->request->getVar('name'),
			'birth' =>date("Y-m-d", strtotime($this->request->getVar('birth'))),
			'occupation' => $this->request->getVar('occupation'),
			'address' => $this->request->getVar('address'),
			'company_id' => $this->request->getVar('company_id')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);

	}

	public function deletePerson()
	{
		$db = db_connect();
		$builder = $db->table('certificate');
		$save = $builder->delete(['person_id' => $this->request->getVar('person_id')]);

		$builder2 = $db->table('person');
		 $builder2->delete(['person_id' => $this->request->getVar('person_id')]);


		return $this->response->setJSON($save);
	}

}
