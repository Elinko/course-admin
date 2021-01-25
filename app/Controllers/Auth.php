<?php namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		// return view('home');
	  $encrypter = \Config\Services::encrypter();
		$tmp = $encrypter->encrypt('patrik');
		// echo $tmp;
		// echo '<br> and decrypt <br>';
		// echo $encrypter->decrypt($tmp);
		if (isset($_SESSION['loggedIn']) ) {
			echo 'session is set';
		}
		// return view('home');

	}


	//--------------------------------------------------------------------

}
