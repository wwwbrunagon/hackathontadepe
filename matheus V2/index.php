<?php
  session_start();
  require("connection.php");
  global $connect;
  $sql = "SELECT sum(numeroAlertas) as num, sum(alertaRespondido) as numRespondido from alertas";
  if(!$result= $connect->query($sql)){
    header("Location index.php");
  }elseif($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $_SESSION['dadosTotalAlertas']=$row["num"];
          $_SESSION['dadosAlertasRespondidos']= $row["numRespondido"];
      }
  }
  
  
  
?>
<!DOCTYPE html> 
<!-- hackathon -->
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
    </style>
</head>

<body>
    <nav class="topbar">
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

    <header>
    <div class="dados"> 
        <div style = "margin-right: 50px;"> 
        <p> Total De Denuncias</p>
        </div>
        <?php
         $numeroAlertas= $_SESSION['dadosTotalAlertas'];
         echo"<div> 
          <p class='dadosborder' style='text-align: center;'> $numeroAlertas </p>
        </div>";
        ?>
        <div>
        <p> Denuncias Respondidas </p>
        </div>
        <?php
          $numRespondido = $_SESSION['dadosAlertasRespondidos'];
        echo"<div>
          <p class='dadosborder' style='text-align: center;'> $numRespondido </p>
        </div>";
        ?>
    </div>
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
    </header>

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
                        <h1>a cobrança move a obra </h1>
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

        <!-- FEED BOOTSTRAP -->
        <?php
          global $connect;
          $sql="SELECT endereco, cidade, uf, escola, numeroAlertas from alertas";
          $result=$connect->query($sql);
          while ($row = $result->fetch_assoc()) {
            $endereco = $row['endereco'];
            $cidade= $row['cidade'];
            $uf= $row['uf'];
            $escola= $row['escola'];
            $numeroAlertas= $row['numeroAlertas'];

            echo" <section>
            <div class='timeline-wrapper'>
                <div class='timeline-item'>
                  <div class='facebook'>
                    <div class='header-top'> $escola </div>
                    <div class='header-left'></div>
                    <div class='header-right'></div>
                    <div class='header-bottom'> $cidade,$uf </div><br>
                    <div class='subheader-left'></div>
                    <div class='subheader-right'></div>
                    <div class='subheader-bottom'> $endereco </div>
                    <div class='content-top'> Numero de denuncias: $numeroAlertas</div>
                    <div class='content-first-end'></div>
                    <div class='content-second-line'></div>
                    <div class='content-second-end'></div>
                    <div class='content-third-line'></div>
                    <div class='content-third-end'></div>
                  </div>
                </div>
              </div>
        </section>
          ";}
       ?>
    </main>

    
    
</body>
