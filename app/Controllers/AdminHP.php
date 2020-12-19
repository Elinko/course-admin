<?php namespace App\Controllers;

class AdminHP extends BaseController
{
	public function index()
	{
		$db = db_connect();

		$company = $db->query("SELECT company_id, name FROM company");
		$data['company'] =  $company->getResultArray();

		$course = $db->query("SELECT course_id, name FROM course");
		$data['course'] =  $course->getResultArray();


		$occupation = $db->query("SELECT DISTINCT  occupation FROM person");
		$data['occupation'] =  $occupation->getResultArray();


		// var_dump($query[0]['name']);
		return view('admin-hp', $data);

	}

	//--------------------------------------------------------------------

}
