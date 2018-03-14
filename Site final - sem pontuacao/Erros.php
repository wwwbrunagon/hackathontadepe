
<?php
function ErroLogin(){
  echo "<p id='erro'>E-mail ou senha incorretos!</p>";
  $_SESSION['erroLogin']=null;
}
function ErroCadastro(){
  echo "<p id='erro'>Valores incorretos</p>";
  $_SESSION['erroCadastro']=null;
}
?>