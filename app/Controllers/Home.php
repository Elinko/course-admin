<?php namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		// return view('home');
	  // $encrypter = \Config\Services::encrypter();
		// $tmp = $encrypter->encrypt('patrik');
		// // echo $tmp;
		// // echo '<br> and decrypt <br>';
		// // echo $encrypter->decrypt($tmp);
		$data = [
			'name' => 0,
			'loggedIn' => 0,
		];
		session()->set($data);

		return view('home');
	}

	public function register()
	{
		// if ((session()->get('loggedIn')) == null) {
		// 		return redirect()->to('/Home');
		// }

		return view('register-user');
	}

	public function login()
	{
		$db      = db_connect();
		$builder = $db->table('users');
		$builder = $builder->getWhere(['user_name' => $this->request->getVar('name')])->getResultArray();

		$encrypter = \Config\Services::encrypter();

		if( $builder[0]['user_password'] ==  md5(sha1($this->request->getVar('password'))) ) {

			$builder2 = $db->table('company');
			$data['company'] =  $builder2->get()->getResultArray();

			$builder2 = $db->table('course');
			$data['course'] =  $builder2->get()->getResultArray();

			$builder2 = $db->table('person');
			$data['occupation'] =  $builder2->select('occupation')->get()->getResultArray();

			$this->setSession($builder[0], true);

			// return view('admin-hp', $mysession);

			return '/adminHP';

		} else {

			$this->setSession($builder[0], false);
			return '/';

		}

	}

	public function setSession($user, $logged)
	{
		 $data = [
			 'name' => $user['user_name'],
			 'loggedIn' => $logged,
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
