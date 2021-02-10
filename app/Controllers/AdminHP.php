<?php namespace App\Controllers;

class AdminHP extends BaseController
{
	public function index()
	{

		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();

		$company = $db->query("SELECT company_id, company_name FROM company");
		$data['company'] =  $company->getResultArray();

		$course = $db->table('course')->orderBy('course_id', 'ASC');

		// $course = $db->query("SELECT course_id, name FROM course")->orderBy('course_id', 'DESC');
		// $data['course'] =  $course->getResultArray();
		$data['course'] =  $course->get()->getResultArray();


		$occupation = $db->query("SELECT DISTINCT  occupation FROM person");
		$data['occupation'] =  $occupation->getResultArray();


		// var_dump($query[0]['name']);
		return view('admin-hp', $data);

	}

	public function search( $queri_id = null)
	{
		$data = [
			'company_id' => $this->request->getVar('company_id'),
			'course_id' => $this->request->getVar('course_id'),
			'occupation' => $this->request->getVar('occupation'),
			'date-from' => $this->request->getVar('date-from'),
			'date-to' => $this->request->getVar('date-to'),
			'sort' => $this->request->getVar('sort')
		];

		$db = db_connect();

		if($data['sort'] == 'course') {
  
			$builder = $db->table('certificate');
			$builder->join('person', 'person.person_id = certificate.person_id ')
							->join('company', 'company.company_id = person.company_id ')
							->where(['os >' => $data['date-from']])
							->where(['os <' => $data['date-to']]);

			if($data['company_id']) {
				$builder->whereIn('person.company_id' , $data['company_id']);
			}

			if($data['occupation']) {
				$builder->whereIn('occupation' , $data['occupation']);
			}

			if($data['course_id']) {
				$builder->whereIn('course_id' , $data['course_id']);
			}
			$builder->where(['os >' => $data['date-from']])
							->where(['os <' => $data['date-to']])
							->orderBy('company.company_id')
							->orderBy('course_id');

			$result = $builder->get()->getResultArray();

			var_dump($result);

		} else {
			echo 'person';

		}

		$db = db_connect();
		$builder = $db->table('company');
		$data['queri'] = $builder->getWhere(['company_id' => $queri_id])->getResultArray();

		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['company_id' => $queri_id])->getResultArray();

		// return view('update-company', $data);

	}



	//--------------------------------------------------------------------

}
