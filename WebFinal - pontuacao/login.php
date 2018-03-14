<?php
require("connection.php");
include("Pontuacao.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_POST["email"]) || !isset($_POST["senha"])){
	header("location: index.php#popup1");
}else{
	global $connect;
	$connect->set_charset("utf8");
	$email = $_POST['email'];
	$pass = $_POST['senha'];
	$pass = hash('sha256', $pass);

	$stmt = $connect->prepare("SELECT idUser FROM usuario WHERE email =? and pass=?");
	$stmt->bind_param('ss',$email,$pass);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows <=0){
		$_SESSION['erroLogin']=1;
		header("location: index.php#popup1");
	}else{
		$result= $stmt->bind_result($idUsuario);
		$stmt->fetch();
		$_SESSION['idAtivo']= $idUsuario;
		Pontuacao();
		header("location: index.php");	
	}
}