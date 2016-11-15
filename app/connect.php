<?php
namespace Database;
use PDO;

class Connect extends PDO
{

	function __construct()
	{
			//
	}

	public static function DB()
	{
		try {

			$data 	= 	[

				'dns' 	=> 'mysql:host='.host.';dbname='.dbName,
				'user'	=>	username,
				'pass'	=>	password

			];

		  	return $db	=	new PDO($data['dns'],$data['user'],$data['pass']);

		} catch (	PDOException $e) {
			echo $e->getMessage();
		}
	}

}





		//	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
