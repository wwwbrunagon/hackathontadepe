<?php
  require("connection.php");
  global $connect;
  $sql = "SELECT sum(numeroAlertas) as num, sum(alertaRespondido) as numRespondido from alertas";
  if(!$result= $connect->query($sql)){
    header("Location index.php");
  }elseif($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['dadosTotalAlertas']=$row["num"];
      $_SESSION['dadosAlertasRespondidos']= $row["numRespondido"];

  }

?>