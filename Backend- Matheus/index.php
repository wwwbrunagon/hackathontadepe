<?php 
   session_start();

?>

<!doctype HTML>
<html>
<head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <link rel="stylesheet" type="text/css" href="asset/css/login.css">   
</head>

<body>


<div class="a9">
   <div clas="a9"></div> <a class="button" href="#popup1">sing in with anab rafiq</a>
      <div id="popup1" class="overlay">
         <div class="popup">
            <?php 
               if(isset($_SESSION['erroLogin'])&& $_SESSION['erroLogin']==1){
               echo "<p id='erro'>E-mail ou senha incorretos!</p>";
               $_SESSION['erroLogin']=null;
            }        

             ?>
            <a class="close" href="#">X</a><br>
            <form method="POST" action="login.php">
               Email:<br /> <input type="email" name="email"  placeholder="email" required /><br />
           
               Senha:<br /> <input type="password" name="senha" placeholder="******" required /><br /><br />
               
               <button type="submit" class="btn btn-success" style="float: left;">Entrar </button><br>
               <a href="#popup2" style="float: right;">Inscreva-se</a>

            </form>
         </div>
      </div>
      <div id="popup2" class="overlay">
         <div class="popup">
            <?php 
               if(isset($_SESSION['erroCadastro'])&& $_SESSION['erroCadastro']==1){
               echo "<p id='erro'>Valores incorretos</p>";
               $_SESSION['erroCadastro']=null;
            }        

             ?>
            <a class="close" href="#">X</a>
            <form method="POST" action="registrar.php">
               Apelido:<br /> <input type="text" name="nick"  placeholder="xExemplo_" required /><br />
               Email:<br /> <input type="email" name="email"  placeholder="exemplo@tadepe.com" required /><br />
           
               Senha:<br /> <input type="password" name="senha" placeholder="******" required /><br />
               
               Confirmar Senha:<br /> <input type="password" name="confirmaSenha" placeholder="******" required /><br /><br />
               <button type="submit" class="btn btn-success" style="float: left;">Registrar </button><br>
               <a href="#popup1" style="float: right;">< Voltar</a>
            </form>
         </div>
      </div>
</div>
</body>
</html>