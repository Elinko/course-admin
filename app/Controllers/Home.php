<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// return view('home');
	  $encrypter = \Config\Services::encrypter();
		$tmp = $encrypter->encrypt('patrik');
		// echo $tmp;
		// echo '<br> and decrypt <br>';
		// echo $encrypter->decrypt($tmp);
		return view('home');
	}

	public function register()
	{
		return view('register-user');
	}

	public function login()
	{
		$db      = db_connect();
		$builder = $db->table('users');
		$builder = $builder->getWhere(['user_name' => $this->request->getVar('name')])->getResultArray();

		$encrypter = \Config\Services::encrypter();

		if( $builder[0]['user_password'] ==  md5(sha1($this->request->getVar('password'))) ) {
			echo 'hesla sa zhoduju';

			$builder2 = $db->table('company');
			$data['company'] =  $builder2->get()->getResultArray();

			$builder2 = $db->table('course');
			$data['course'] =  $builder2->get()->getResultArray();

			$builder2 = $db->table('person');
			$data['occupation'] =  $builder2->select('occupation')->get()->getResultArray();

			$mysession = $this->setSession($builder[0]);

			// return view('admin-hp', $data);
  
			// var_dump( $builder);
		} else {
		}

	}

	public function setSession($user)
	{
		 $data = [
			 'name' => $user['user_name'],
			 'password' => $user['user_password'],
			 'loggedIn' => true,
		 ];

		 session()->set($data);

	}


	public function registration()
	{
		$db      = db_connect();
		$builder = $db->table('users');
		$encrypter = \Config\Services::encrypter();

		$data = [
			'user_name' => $this->request->getVar('name'),
			'user_password' => md5(sha1($this->request->getVar('password')))
		];

		$save = $builder->insert($data);
		return $this->response->setJSON($save);
	}

	//--------------------------------------------------------------------

}
