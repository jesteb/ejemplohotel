<?php
session_start();

if (isset($_SESSION['username'])){ 
	$es = 1;
	$mail = $_SESSION['username'];
	$rol = $_SESSION['rol'];
	$id_usuario = $_SESSION['id_usuario'];
	 
}else{
	$es=0; 
	header('Location: ./login.php');	
 } 
  

 ?>
