<?php
namespace App;
use Models\user;

class home extends controller{


	public function __construct()
	{
			//tulis kode disini
	}

	public function index()
	{
		
		return $this->view('home/index');

	}



}
