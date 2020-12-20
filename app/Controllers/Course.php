<?php namespace App\Controllers;


class course extends BaseController
{
	public function index()
	{
		$db = db_connect();

		// var_dump($query[0]['name']);
		return view('add-course');

	}

	public function update( $queri_id = null)
	{
		$db = db_connect();
		$queri = $db->query("SELECT * FROM course WHERE course_id=$queri_id");
		$data['queri'] =  $queri->getResultArray();

		return view('update-course', $data);
	}

	public function addCourse()
	{
		$db      = \Config\Database::connect();
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

}
