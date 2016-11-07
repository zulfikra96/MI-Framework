<?php
namespace App;

class home extends controller{


	public function __construct()
	{
			//Session::init();
	}


	public function index()
	{



		return $this->view('home/index');



	}



}
