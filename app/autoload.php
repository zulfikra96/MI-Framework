<?php
namespace bootstrap;

use App;



class autoload{


	private $controller = 'home';
	private $method     = 'index';
	private $param 			= [];


	public function __construct()
	{
		$this->getUrl();
		$this->getController();
	}

	public function getUrl()
	{


		if (isset($_GET['url'])) {

			$url 		= 	$_GET['url'];
			$part_url	=	rtrim($url,'/');
			$fix_url	=	explode("/", $part_url);

			//print_r($fix_url);

			return $fix_url;

		}


	}

	public function getController()
	{
			$url 	=	$this->getUrl();

			// mencari controller apakah ada atau tidak
			if (isset($url[0])) {

				//jika ada file akan di eksekusi
				if (file_exists('controllers/'.$url[0].'.php')) {

					//controller di panggil
					$this->controller = $url[0];

					require 'controllers/'.$url[0].'.php';
					$a = '\\'.'App'.'\\'.$url[0];
					$this->controller = new $a;

					unset($url[0]);

				}
				else{

						require 'controllers/error.php';
						$this->controller	=	new App\error;

				}
			}
			else
			{
				require 'controllers/'.$this->controller.'.php';
				$test = $this->controller;
				$a = '\\'.'App'.'\\'.$this->controller;

				$this->controller 	= new $a;
			}
				//mengecek method

				if (isset($url[1])) {
					if (method_exists($this->controller,$url[1])) {

						//mendeklarasikan method

						$this->method = $url[1];

						unset($url[1]);

					}

				}




				//mengecek parameter
				$this->params = $url  ? array_values($url) : [];

				  call_user_func_array([$this->controller,$this->method],$this->params);

				//jika tidak ada file akan di masukan kedalam controller error




	}

}
