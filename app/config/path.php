<?php




define('URL', "http://".$_SERVER['SERVER_NAME']."/MIframework/"); //



















function URL($url){
  echo URL.$url;
}


function assets($url){
  echo URL."assets/".$url;
}
