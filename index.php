<?php
session_start();
if(isset($_SESSION["uid"])){
  header("location:profile.php");
}
?>
<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loja</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="main.js"></script>
    
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      <a href="index.php"><img src="img/logo_nav.png"></a>
      

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Info</a>
              <ul class="dropdown-menu" style="left: 70% !important;">      
              <a class="nav-link" href="servicos.php" style="color:grey">Serviços</a>
              <a class="nav-link" href="contactos.php" style="color:grey">Contactos</a>
              </ul>
            </li>
            <li><a href="#" class="nav-link dropdown-toggle"  data-toggle="dropdown">Entrar</a>
          <ul class="dropdown-menu" style="left: 70% !important;" >
            <div style="width:400px;">
              <div class="panel panel-primary">
                <div class="panel-heading"></div>
          <div class="panel-body">
            <form onsubmit="return false" id="login">
              <label for="email" style="margin-left: .5rem;">Email</label>
              <input type="email" class="form-control" name="email" id="email" required/>
              <label for="email" style="margin-left: .5rem;">Password</label>
              <input type="password" class="form-control" name="password" id="password" required/>
              <p><br/></p>
              <a href="#" style="color:#333; list-style:none;margin-left: .5rem;">Esqueci a Password</a><input type="submit" class="btn btn-success" style="float:right;margin-right: .5rem;" Value="Entrar">
              <div><a href="customer_registration.php?register=1" style="color:#333;margin-left: .5rem;">Registar</a></div>           
            </form>
        </div>
        <div class="panel-footer"><div id="e_msg"></div></div>
      </div>
    </div>
          </ul>
        </li>
    </nav>
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <div id="get_category"></div>

      </div>

        <div class="col-lg-9">

                    
          
            <div id="get_product"></div>
          </div>
        </div>
      </div>
    </div>
<footer class="py-4 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Loja 2018</p>
      </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
