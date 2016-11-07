<?php


		try {

			$data 	= 	[

				'dns' 	=> 'mysql:host=localhost;dbname='.dbName,
				'user'	=>	username,
				'pass'	=>	password

			];

		// if (!$data) {
		// 	die("Maaf ada masalah dalam database");
		// 	exit(1);
		// }

		  	$db	=	new PDO($data['dns'],$data['user'],$data['pass']);

		} catch (	PDOException $e) {
			echo $e->getMessage();
		}


		//	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
