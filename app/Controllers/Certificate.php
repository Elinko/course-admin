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

		foreach ($data['person'] as $key => $value) {
			$data['person'][$key]['birth'] = formatTimePrint( strtotime($value['birth']));
		}

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
		$builder3->where(['person_id' =>$queri_id]);

		$data['certificate'] = $builder3->join('course', 'certificate.course_id = course.course_id ', 'inner')->get()->getResultArray();

		$data['certificate'] = cleanCertificatePrint($data['certificate']);

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

		$data['queri'][0]['os'] = formatTimePrint($data['queri'][0]['os']);
		$data['queri'][0]['aop'] = formatTimePrint($data['queri'][0]['aop']);

		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['person_id' =>$data['queri'][0]['person_id']])->getResultArray();

		$builder3 = $db->table('certificate');
		$builder3->where(['person_id' =>$data['queri'][0]['person_id']]);
		$data['certificate'] = $builder3->join('course', 'certificate.course_id = course.course_id ', 'inner')->get()->getResultArray();


		$data['certificate'] = cleanCertificatePrint($data['certificate']);




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
			'os' => $this->request->getVar('os') ,
			'aop' => $this->request->getVar('aop') ,
			'types' => $this->request->getVar('types')
		];

		//
		// echo 'ahoocj';
		// var_dump($result[0]['os_time']);

		$data['os'] = formatTimeDatabase($data['os']);
		$data['aop'] = formatTimeDatabase($data['aop']);

		$builder2 = $db->table('course');
		$result = $builder2->where(['course_id' =>$data['course_id']])->get()->getResultArray();

		if($result[0]['os_time'] != null && $result[0]['os_time'] != '' && $result[0]['os_time'] != 0 && $data['os'] != '' && $data['os'] != null) {
			// echo date('Y-m-d', strtotime("+" .$result[0]['os_time']. "months", strtotime($data['os']))) ;
			$months = "+" . $result[0]['os_time']. " months";
			$data['os_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['os']))));
 

		} else {
			$data['os_exp'] = '';
		}

		if($result[0]['aop_time'] != null && $result[0]['aop_time'] != '' && $result[0]['aop_time'] != 0 && $data['aop'] != '' && $data['aop'] != null) {
			$months = "+" . $result[0]['os_time']. " months";
			$data['aop_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['aop']))));
		} else {
			$data['aop_exp'] = '';
		}

		// echo'kurva ';
		// // echo 'months'.  strtotime($data['os']);
		// echo 'os_exp'. $data['os_exp'];

		//
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
			'os' => $this->request->getVar('os') ,
			'aop' => $this->request->getVar('aop') ,
			'types' => $this->request->getVar('types')
		];

		$data['os'] = formatTimeDatabase($data['os']);
		$data['aop'] = formatTimeDatabase($data['aop']);

		$builder2 = $db->table('course');
		$result = $builder2->where(['course_id' =>$data['course_id']])->get()->getResultArray();

		if($result[0]['os_time'] != null && $result[0]['os_time'] != '' && $result[0]['os_time'] != 0 && $data['os'] != '' && $data['os'] != null) {
			// echo date('Y-m-d', strtotime("+" .$result[0]['os_time']. "months", strtotime($data['os']))) ;
			$months = "+" . $result[0]['os_time']. " months";
			$data['os_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['os']))));
		} else {
			$data['os_exp'] = '';
		}

		if($result[0]['aop_time'] != null && $result[0]['aop_time'] != '' && $result[0]['aop_time'] != 0 && $data['aop'] != '' && $data['aop'] != null) {
			$months = "+" . $result[0]['aop_time']. " months";
			$data['aop_exp'] = date('Y-m-d' , (strtotime($months, strtotime($data['aop']))));
		} else {
			$data['aop_exp'] = '';
		}

		$save = $builder->replace($data);
		return $this->response->setJSON($save);
	}

	public function modifyCertificategsfgsdfggg()
	{
		$db = db_connect();
		$builder = $db->table('certificate')->get()->getResultArray();

		// var_dump($builder);

		foreach ($builder as $key => $value) {
			$builder2 = $db->table('course');
		 	$result = $builder2->where(['course_id' =>$value['course_id']])->get()->getResultArray();

			if($result[0]['os_time'] != null && $result[0]['os_time'] != '' && $result[0]['os_time'] != 0 && $value['os'] != '' && $value['os'] != null) {
				// echo date('Y-m-d', strtotime("+" .$result[0]['os_time']. "months", strtotime($data['os']))) ;
				$months = "+" . $result[0]['os_time']. " months";
				$value['os_exp'] = date('Y-m-d' , (strtotime($months, strtotime($value['os']))));
			} else {
				$value['os_exp'] = '';
			}

			if($result[0]['aop_time'] != null && $result[0]['aop_time'] != '' && $result[0]['aop_time'] != 0 && $value['aop'] != '' && $value['aop'] != null) {
				$months = "+" . $result[0]['aop_time']. " months";
				$value['aop_exp'] = date('Y-m-d' , (strtotime($months, strtotime($value['aop']))));
			} else {
				$value['aop_exp'] = '';
			}

			$builder3 = $db->table('certificate');
			$builder3->replace($value);


		}




		// $save = $builder->replace($data);
		// return $this->response->setJSON($save);
	}

	public function deleteCertificate()
	{
		$db = db_connect();
		$builder = $db->table('certificate');

		$save = $builder->delete(['certificate_id' => $this->request->getVar('certificate_id')]);
		return $this->response->setJSON($save);
	}

}
