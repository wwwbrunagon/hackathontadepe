<?php
  session_start();
  require("DadosEstatisticas.php");
  require("Erros.php");
  require("pontuacao.php");
function FeedAlertas(){
  global $connect;
  $sql="SELECT endereco, cidade, uf, escola, numeroAlertas from alertas";
  return $connect->query($sql);
}
if(!isset($_SESSION['idAtivo'])){
    $_SESSION['pontos']= "";
    $_SESSION['nick']= "Faça Login";
}else{
    Pontuacao();
}


?>
<!DOCTYPE html> 
<!-- hackathon -->
<html>
<head>
    <meta charset="utf-8" />
    <title> Ta De Pé </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="asset/css/style.css" />
    <link rel="stylesheet"  href="asset/css/login.css" />
    <script src="asset/js/jquery.min.js"></script>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="asset/js/bootstrap.min.js"></script>
    
    <style type="text/css">
      .dados p{
        margin-top: 25px;
      }
      #linkLogin{
        text-decoration: none;
        color: #fff;
      }
      
    </style>
</head>

<body>
    <nav class="topbar" style="z-index: 20;">
            <div>
                <a href="#">
                    <img src="img/logo.png">
                </a>          
            </div>
            
            <div>  
                <ul>
                    <li> <a href="#"> QUEM SOMOS  </a> </li>
                    <li> <a href="#"> APOIE </a> </li>
                    <li> <a href="#"> PROJETOS </a> </li>
                    <li> <a href="#"> BLOG </a> </li>
                    <li> <a href="#"> PUBLICAÇÕES </a> </li>
                    <li> <a href="#"> NOTÍCIAS </a> </li>
                    <li> <a href="#"> CONTATO </a> </li>  
                </ul>
            </div>  
            <div class="midias">
                <a href="#">
                <img src="img/midias.png">
                </a>          
            </div>
    </nav>


    
        <?php
          if(!isset($_SESSION['idAtivo'])){
            echo "<div class='logar'> 
                <a class='botao' href='#popup1'> <strong> Login </strong> </a>
            </div>";
          }
          ?>
        <div id="popup1" class="overlay">
         <div class="popup">
            <?php 
               if(isset($_SESSION['erroLogin'])&& $_SESSION['erroLogin']==1){
                  ErroLogin();
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
               ErroCadastro();
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
    

    <main>
        <section class="intro">    
        <div class="topo"> 
                <div class="header-brand"> 
                    <div >
                        <a href="#">
                        <img src="img/logoHeader.png">
                        </a>          
                    </div>
                       
                    <div class="cabeca-txt"> 
                        <h1>A cobrança move a obra </h1>
                        <p class="paragrafo">  Fiscalize obras de escolas e creches públicas perto de você e pressione por uma gestão mais eficiente de recursos públicos!</p>
                        <p class="cerquilha"> #FIQUENOPÉ     #MINHAFOTOMUDAOMUNDO</p>  
                    </div>
                                    
                    <div class="downloadapp">
                        <a href="#">
                        <img src="img/introapp.png" alt="Download App">
                        </a>          
                    </div>
                    
                </div>
    
                <div class="header-map"> 
                    <div class="img-mapa">
                        <a href="#">
                        <img src="img/mapa.jpg">
                        </a>          
                    </div>
                </div>
            </div>
        </section>
        <section class="container ">
          
            <div style="background-color: #e09706;" class="cardDados"> 
                <div>
                     <img src="img/alerta.svg">
                </div>
                <div>
                    <var><?= $_SESSION['dadosTotalAlertas']?></var>
                    <label class="text-muted"; style="margin-left: 29%;">Total de Alertas</label>
                </div>
            </div>
            
            <div style="background-color: #e5cb32;" class="cardDados"> 
                <div>
                     <img src="img/pontos.svg">
                </div>
                <div>
                    <var ><?=$_SESSION['pontos']; ?></var>
                    <label class="text-muted"; style="margin-left: 40%;"><a href="#popup1" id="linkLogin"><?= $_SESSION['nick'];?></a></label>
                </div>
            </div>
            
            <div class="cardDados" style=" background-color: #41a041;"> 
                <div>
                     <img src="img/like.svg">
                </div>
                <div>
                    <var ><?= $_SESSION['dadosAlertasRespondidos']?></var>
                    <label class="text-muted"; style="margin-left: 25%;">Alertas Respondidos</label>
                </div>
            </div>
            
          
        </section>
          <hr><br><br>

        <!-- FEED BOOTSTRAP -->
        <?php
          $result= FeedAlertas();
          while ($row= $result->fetch_assoc()) {
            $endereco = $row['endereco'];
            $cidade= $row['cidade'];
            $uf= $row['uf'];
            $escola= $row['escola'];
            $numeroAlertas= $row['numeroAlertas'];
            ?>
           
            <div class='container'>
              <div class='row panel'>
                  <div class='col-sm-13'>
                    <div class='jumbotron'>
                      <p> <?= $escola?> </p>
                      <p> <?= $cidade,$uf?> </p>
                      <p> <?= $endereco?> </p>
                      <p> Numero de denuncias: <?=$numeroAlertas?></p>
                    </div>
                  </div>
                </div>
              </div>
          <?php } ?>
    </main>

    
    
</body>
</html>