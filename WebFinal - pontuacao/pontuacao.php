<?php
function Pontuacao(){
	global $connect;
  	if(isset($_SESSION['idAtivo'])){
	    $id= $_SESSION['idAtivo'];
	    $sql= "SELECT nickname, pontuacao from usuario where idUser='$id' ";
	    $result= $connect->query($sql);
	    $prePontos= $result->fetch_assoc();
	    $_SESSION['nick'] = $prePontos['nickname'];
	    $_SESSION['pontos']= $prePontos['pontuacao']; 
	}
  }
?>