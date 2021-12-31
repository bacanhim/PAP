<?php

session_start();
if(!isset($_SESSION["uid"])){
  header("location:index.php");
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
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho <span class="badge">0</span></a>
                <div class="dropdown-menu" style="width: 400px;left: 70% !important;">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">Produto:</div>
                        <div class="col-md-2">Ref:</div>
                        <div class="col-md-3">Preço:</div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li class="nav-item"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["name"]; ?></a>
              <ul class="dropdown-menu" style="left: 70% !important;">
                <li><a href="customer_order.php" style="text-decoration:none; color:grey;">Últimas compras</a></li>
                <li class="divider"></li>
                <li><a href="" style="text-decoration:none; color:grey;">Mudar Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php" style="text-decoration:none; color:grey;">Sair</a></li>
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
