<?php namespace App\Controllers;


class course extends BaseController
{
	public function index()
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}

		$db = db_connect();
		$builder = $db->table('course');
		$data['course'] = $builder->get()->getResultArray();
		// var_dump($query[0]['name']);
		return view('add-course', $data);

	}

	public function update( $queri_id = null)
	{
		if ((session()->get('loggedIn')) == null) {
				return redirect()->to('/Home');
		}
		
		$db = db_connect();
		$builder = $db->table('course');
		$data['queri'] = $builder->getWhere(['course_id' =>$queri_id])->getResultArray();


		return view('update-course', $data);
	}

	public function addCourse()
	{
		$db      = db_connect();
		$builder = $db->table('course');

		$data = [
			'name' => $this->request->getVar('name'),
			'time' => $this->request->getVar('time')
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($save);
 	}

	public function updateCourse()
	{
		$db = db_connect();
		$builder = $db->table('course');
		$data = [
			'course_id' => $this->request->getVar('course_id'),
			'name' => $this->request->getVar('name'),
			'time' => $this->request->getVar('time')
		];

		$save = $builder->replace($data);
		return $this->response->setJSON($save);
	}

	public function deleteCourse()
	{
		$db = db_connect();
		$builder = $db->table('certificate');
		$save = $builder->delete(['course_id' => $this->request->getVar('course_id')]);

		$builder2 = $db->table('course');
		$builder2->delete(['course_id' => $this->request->getVar('course_id')]);

		return $this->response->setJSON($save);
	}

}
