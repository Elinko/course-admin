<?php namespace App\Controllers;

class AdminHP extends BaseController
{
	public function index()
	{

		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();

		$company = $db->query("SELECT company_id, name FROM company");
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

	public function find( $queri_id = null)
	{

		$db      = db_connect();
		$builder = $db->table('company');
		$data = [

			'company' => $this->request->getVar('company'),
			'course_id' => $this->request->getVar('course_id'),
			'occupation' => $this->request->getVar('occupation'),
			'date-from' => $this->request->getVar('date-from'),
			'date-to' => $this->request->getVar('date-to'),
			'sort' => $this->request->getVar('sort')
		];

		$db = db_connect();
		$builder = $db->table('company');
		$data['queri'] = $builder->getWhere(['company_id' => $queri_id])->getResultArray();

		$builder2 = $db->table('person');
		$data['person'] = $builder2->getWhere(['company_id' => $queri_id])->getResultArray();

		return view('update-company', $data);

	}



	//--------------------------------------------------------------------

}
