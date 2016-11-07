<?php
namespace App;


class controller{

	public function __construct()
	{
		session::init();
	}
	public function view($view, $data = [])
	{

			require 'views/'.$view.'.php';

	}

	public function redirect($redirect)
	{
		header('location:'.URL.$redirect);
	}





}
