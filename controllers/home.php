<?php
namespace App;

class home extends controller{


	public function __construct()
	{
			//Session::init();
	}


	public function index()
	{


		//$assocText	=	$postingan->fetch(PDO::FETCH_ASSOC);
		return $this->view('home/index');

		// return $this->view('home/index');

	}

	public function delete($id)
	{
		$post = new post;
		$post->deletePost($id);
	}

	public function detail($id)
	{
		require 'app/connect.php';
		$selectDb = $db->query("SELECT * FROM postingan WHERE Judul='$id'");

		$selectAssoc  = $selectDb->fetch(PDO::FETCH_ASSOC);

		$postingan	  =  htmlspecialchars_decode($selectAssoc['postingan'],ENT_QUOTES);

		 return $this->view('detailPage/index',['posting' => $selectAssoc, 'postingan' => $postingan]);
	}




}
