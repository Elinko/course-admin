<?php namespace App\Controllers;


class Certificate extends BaseController
{
	public function index($queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}
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
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}
		$db = db_connect();
		$builder = $db->table('course');
		$data['course'] = $builder->get()->getResultArray();


		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['person_id' => $queri_id])->getResultArray();

		$builder3 = $db->table('certificate');
		$builder3->getWhere(['person_id' =>$queri_id]);
		$data['certificate'] = $builder3->join('course', 'certificate.course_id = course.course_id ', 'inner')->get()->getResultArray();


		// var_dump($query[0]['name']);
		return view('add-certificate', $data);
 	}

	public function update( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}
		$db = db_connect();
		$queri = $db->table('certificate');
		$data['queri'] =  $queri->getWhere(['certificate_id' =>$queri_id])->getResultArray();
		$builder4 = $db->table('course');
		$builder1 = $builder4->getWhere(['course_id' =>$data['queri'][0]['course_id']])->getResultArray();
		$data['queri'][0] +=$builder1[0];

		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['person_id' =>$data['queri'][0]['person_id']])->getResultArray();

		$builder3 = $db->table('certificate');
		$builder3->getWhere(['person_id' =>$queri_id]);
		$data['certificate'] = $builder3->join('course', 'certificate.course_id = course.course_id ', 'inner')->get()->getResultArray();


		return view('update-certificate', $data);

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

	public function updateCertificate()
	{
		$db = db_connect();
		$builder = $db->table('certificate');
		$data = [
			'certificate_id' => $this->request->getVar('certificate_id'),
			'person_id' => $this->request->getVar('person_id'),
			'course_id' => $this->request->getVar('course_id'),
			'evidence_num' => $this->request->getVar('evidence_num'),
			'os' => $this->request->getVar('os'),
			'aop' => $this->request->getVar('aop'),
			'types' => $this->request->getVar('types')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);
	}

	public function deleteCertificate()
	{
		$db = db_connect();
		$builder = $db->table('certificate');

		$save = $builder->delete(['certificate_id' => $this->request->getVar('certificate_id')]);
		return $this->response->setJSON($save);
	}

}
