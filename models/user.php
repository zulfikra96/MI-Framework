<?php

namespace App;



class user extends controller{


	public function __construct()
	{
		// code disini
	}



	public function saveData($dataDB)
	{

		try {

					$nama_depan 		=	$dataDB['nama_depan'];
					$nama_belakang 		= 	$dataDB['nama_belakang'];
					$email				=	$dataDB['email'];
					$password			=	$dataDB['password'];

					$passwordHash   		=	password_hash($password,PASSWORD_DEFAULT);

		$insert = $db->query("");

		$insert = null;

		$this->redirect('home');
		} catch (PDOException $e) {

			echo $e->getMessage();

		}


	}

	public function checkLogin($dataDB)
	{

		require 'app/connect.php';
		$email			=		$dataDB['email'];
		$password		=		$dataDB['password'];
		$filterEmail = filter_var($email,FILTER_SANITIZE_STRING);
		$filterPassword = filter_var($password,FILTER_SANITIZE_STRING);
		// $passwordEnc	=		password_hash($filterPassword,PASWORD_DEFAULT);
		$check 		= $db->query("SELECT * FROM profil WHERE email='$filterEmail'");


			$checkRow = $check->fetch(PDO::FETCH_ASSOC);

			if ($check->rowCount()> 0) {
				if (password_verify($filterPassword,$checkRow['password'])) {
					session::set('email',$checkRow['email']);
					session::set('nama_depan',$checkRow['nama_depan']);
					session::set('id_profil',$checkRow['id']);

					$this->redirect('home');
				}
				else{

					$this->redirect('login');

				}


			}
			else{
				$this->redirect('login');
			}


			// foreach ($check as $key)  {

			// 	print_r($key['nama_depan']);

			// 	if (!isset($key['email']) && !isset($key['password'])) {
			// 		echo "maaf anda gagal";
			// 	}
			// 	else{
			// 		echo "berhasil";
			// 	}

			// }

			// foreach ($check as $key ) {
			// 	 $fixEmail = $key['email'];
			// 	 $fixPass  = $key['password'];
			// }
			//  echo  $_SESSION['email'] 		= $fixEmail;
			//  echo  $_SESSION['password']		= $fixPass;
			//$this->redirect('login');





	}



}
