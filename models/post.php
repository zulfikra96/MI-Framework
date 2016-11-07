<?php
namespace App;

require 'app/connect.php';
class post extends controller{



	public function saveData($dataDB)
	{

		require 'app/connect.php';

		try {
			 $judul		=	$dataDB['judul'];
			 $posting	=	htmlspecialchars($dataDB['posting'], ENT_QUOTES);
			 $photo		=	$dataDB['photo'];

			$penulis	=	$_SESSION['nama_depan'];
			$id_profil	=	$_SESSION['id_profil'];



		$insert = $db->query("INSERT INTO postingan (Judul,postingan,oleh,waktu,id_profil,photo) VALUES('$judul','$posting','$penulis',NOW(),'$id_profil','$photo' ) ");

		redirect::page('home');


		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	}

	public function showPost()
	{
		require 'app/connect.php';
		return $select = $db->query("SELECT * FROM postingan ORDER BY id DESC ");
		// return $selectRow	=	$select->fetch(PDO::FETCH_ASSOC);

		 $this->redirect('home');
	}
	public function profilPost()
	{
		require 'app/connect.php';
		$id_profil	=	$_SESSION['id_profil'];
		return $select = $db->query("SELECT * FROM postingan WHERE id_profil='$id_profil' ");
		// return $selectRow	=	$select->fetch(PDO::FETCH_ASSOC);

		// $this->redirect('home');
	}

	public function deletePost($id)
	{
		require 'app/connect.php';
		try {

			$delete = $db->query("DELETE FROM postingan WHERE id='$id'");


			return redirect::page('home');


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


}
