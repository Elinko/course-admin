<?php namespace App\Controllers;

class AdminHP extends BaseController
{
	public function index()
	{

		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();
		$company = $db->table('company');
		$data['company'] =  $company->orderBy('company_name', 'ASC')->get()->getResultArray();

		$course = $db->table('course')->orderBy('course_name', 'ASC');

		// $course = $db->query("SELECT course_id, name FROM course")->orderBy('course_id', 'DESC');
		// $data['course'] =  $course->getResultArray();
		$data['course'] =  $course->get()->getResultArray();


		$builder2 = $db->table('person');
		$builder2->select('occupation')->distinct()->orderBy('occupation', 'ASC');
		// var_dump(($builder2));
		$data['occupation'] = $builder2->get()->getResultArray();


		// var_dump($query[0]['name']);
		return view('admin-hp', $data);

	}

	public function search( $queri_id = null)
	{
		$data = [
			'company_id' => $this->request->getVar('company_id'),
			'course_id' => $this->request->getVar('course_id'),
			'occupation' => $this->request->getVar('occupation'),
			'date-from' => date("Y-m-d", strtotime($this->request->getVar('date-from'))),
			'date-to' => date("Y-m-d", strtotime($this->request->getVar('date-to'))),
			'sort' => $this->request->getVar('sort')
		];

		$db = db_connect();

		if($data['sort'] == 'course') { 		// COURSE PRINT



			$builder = $db->table('certificate');

			// $array = array('aop >' => $data['date-from'], 'aop <' => $data['date-to'], 'os >' => $data['date-from'], 'os <' => $data['date-to']);
			$wherecond = "( ( ( aop >'" . $data['date-from'] . " ' AND aop <'" . $data['date-to'] . "') OR ( os >'" .$data['date-from'] . " 'AND os <'" .$data['date-to'] . " ' ) ) )";
			$builder->where($wherecond);

			// $builder->where(['aop >' => $data['date-from']])
			// 				->where(['aop <' => $data['date-to']]);
			// $builder->orWhere(['os >' => $data['date-from']])
			// 				->where(['os <' => $data['date-to']]);


			$builder->join('person', 'person.person_id = certificate.person_id ', 'inner')
			->join('company', 'company.company_id = person.company_id ', 'inner')
			->join('course', 'certificate.course_id = course.course_id', 'inner');

			if($data['company_id']) {
				$builder->whereIn('person.company_id' , $data['company_id']);
			}

			if($data['occupation']) {
				$builder->whereIn('occupation' , $data['occupation']);
			}

			if($data['course_id']) {
				$builder->whereIn('course.course_id' , $data['course_id']);
			}

			$builder->orderBy('course.course_id')
							->orderBy('name', 'ASC');

			$result = $builder->get()->getResultArray();

			$data2 = [];
			$course='';
			$i=-1;
			foreach ($result as $key => $value) {
				$value['os'] = formatTimePrint($value['os']);
				$value['aop'] = formatTimePrint($value['aop']);
				$value['birth'] = formatTimePrint($value['birth']);

				if($course != $value['course_id']) {
					$i++;
					$course = $value['course_id'];
					$data2[$i]['row'][]=($value);
					$data2[$i]['course']=($value['course_name']);
					$data2[$i]['os_time']=$value['os_time'];
					$data2[$i]['aop_time']=($value['aop_time']);
				} else {
					$data2[$i]['row'][]=($value);
					$data2[$i]['course']=($value['course_name']);
					$data2[$i]['os_time']=($value['os_time']);
					$data2[$i]['aop_time']=($value['aop_time']);
				}
			}

			// var_dump($data);
			if($data['company_id']) {

				$result2['count_company'] = count($data['company_id']);
			} else {
				$result2['count_company'] = 0;

			}
			$result2['generatedUntil'] = formatTimePrint($data['date-to']);
			$result2['today'] = date("d-m-Y");
			$result2['type'] = $data['sort'];
			$result2['data'] = $data2;

			$result = json_encode($result2);

			// return($result);

		} else { 		//PERSON PRINT

			$builder = $db->table('certificate');
			// $builder->where(['os >' => $data['date-from']])
			// 				->where(['os <' => $data['date-to']]);

			$wherecond = "( ( ( aop >'" . $data['date-from'] . " ' AND aop <'" . $data['date-to'] . "') OR ( os >'" .$data['date-from'] . " 'AND os <'" .$data['date-to'] . " ' ) ) )";
			$builder->where($wherecond);

			$builder->join('person', 'person.person_id = certificate.person_id ', 'inner')
			->join('company', 'company.company_id = person.company_id ', 'inner')
			->join('course', 'certificate.course_id = course.course_id', 'inner');

			if($data['company_id']) {
				$builder->whereIn('person.company_id' , $data['company_id']);
			}

			if($data['occupation']) {
				$builder->whereIn('occupation' , $data['occupation']);
			}

			if($data['course_id']) {
				$builder->whereIn('course.course_id' , $data['course_id']);
			}

			$builder->orderBy('company.company_id')
							->orderBy('person.name', 'ASC')
							->orderBy('person.person_id');


			$result = $builder->get()->getResultArray();

			$data2 = [];
			$person='';
			$i=-1;

			foreach ($result as $key => $value) {

				$value['os'] = formatTimePrint($value['os']);
				$value['aop'] = formatTimePrint($value['aop']);
				$value['birth'] = formatTimePrint($value['birth']);

				if($person != $value['person_id']) {
					$i++;
					$person = $value['person_id'];
					$data2[$i]['row'][]=($value);
					$data2[$i]['person']=($value['name']);
					$data2[$i]['os_time']=($value['os_time']);
					$data2[$i]['aop_time']=($value['aop_time']);
				} else {
					$data2[$i]['row'][]=($value);
					$data2[$i]['person']=($value['name']);
					$data2[$i]['os_time']=($value['os_time']);
					$data2[$i]['aop_time']=($value['aop_time']);
				}
			}

			// var_dump($data);
			$result2['generatedUntil'] = formatTimePrint($data['date-to']);
			$result2['today'] = date("Y-m-d");
			$result2['type'] = $data['sort'];
			// $result2['count_company'] = count($data['company_id']);
			$result2['data'] = $data2;

			$result = json_encode($result2);


		}

		return($result);

	}



	//--------------------------------------------------------------------

}
