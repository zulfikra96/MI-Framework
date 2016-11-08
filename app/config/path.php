<?php
// isi url anda di bawah ini contoh http://localhost/ atau url website anda

define('URL', 'http://localhost:8000/'); //




















function URL($url){
  echo URL.$url;
}



function assets($url){
  echo URL."assets/".$url;
}
