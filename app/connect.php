<?php


		try {

			$data 	= 	[

				'dns' 	=> 'mysql:host=localhost;dbname='.dbName,
				'user'	=>	username,
				'pass'	=>	password

			];

		

		  	$db	=	new PDO($data['dns'],$data['user'],$data['pass']);

		} catch (	PDOException $e) {
			echo $e->getMessage();
		}


		//	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
