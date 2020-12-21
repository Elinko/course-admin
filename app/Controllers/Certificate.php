<?php namespace App\Controllers;


class Certificate extends BaseController
{
	public function index($queri_id = null)
	{
		$db = db_connect();
		$builder = $db->table('course');
		$data['course'] = $builder->get()->getResultArray();


		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['person_id' => $queri_id])->getResultArray();

		// var_dump($query[0]['name']);
		return view('add-certificate', $data);
	}

	public function add($queri_id = null)
	{
		$db = db_connect();
		$builder = $db->table('course');
		$data['course'] = $builder->get()->getResultArray();


		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['person_id' => $queri_id])->getResultArray();

		$builder3 = $db->table('certificate');
		$data['certificate'] = $builder3->getWhere(['person_id' =>$queri_id])->getResultArray();
		foreach ($data['certificate'] as $key => $value) {
			$builder4 = $db->table('course');
			$builder4 = $builder4->getWhere(['course_id' =>$value['course_id']])->getResultArray();
			$data['certificate'][$key] += $builder4[0];
		}

		// var_dump($query[0]['name']);
		return view('add-certificate', $data);
 	}

	public function update( $queri_id = null)
	{
		$db = db_connect();
		$queri = $db->query("SELECT * FROM person WHERE person_id=$queri_id");
		$data['queri'] =  $queri->getResultArray();

		$builder = $db->table('company');
		$builder->select('name, company_id');
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

		return view('update-person', $data);

	}

	public function addCertificate()
	{
		$db = db_connect();
		$builder = $db->table('certificate');
		$data = [
			'person_id' => $this->request->getVar('person_id'),
			'course_id' => $this->request->getVar('course_id'),
			'evidence_num' => $this->request->getVar('evidence_num'),
			'os' => $this->request->getVar('os'),
			'aop' => $this->request->getVar('aop'),
			'types' => $this->request->getVar('types')
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($save);

	}

}
