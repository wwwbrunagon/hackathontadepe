<?php
require("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!isset($_POST["email"]) || !isset($_POST["senha"]) || !isset($_POST['nick']) || !isset($_POST["confirmaSenha"]) || ($_POST["confirmaSenha"] != $_POST["senha"])){
	$_SESSION['erroCadastro']=1;
	header("location: index.php#popup2");
}else{
	global $connect;
	$connect->set_charset("utf8");
	$email = $_POST['email'];
	$pass = $_POST['senha'];
	$pass = hash('sha256', $pass);
	$nick= $_POST['nick'];

	$stmt = $connect->prepare("INSERT INTO usuario values(null,?,?,?,5)");
	$stmt->bind_param('sss',$nick,$email,$pass);
	if(!$stmt->execute()){
		$_SESSION['erroCadastro']=1;
		header("location: index.php#popup2");
	}else{
		$result=$connect->query("SELECT idUser from usuario where email='$email' ");
		$_SESSION['idAtivo']= $result->fetch_assoc();
		header("location: index.php");
	}
}