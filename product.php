<?php 
session_start();
if(!isset($_SESSION["uid"])){
	$name="Entrar";
}
else {
	$name = $_SESSION["name"];
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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="" id ="getCartItem" class="nav-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho <span class="badge">0</span></a>
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
            <li class="nav-item"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $name;?></a>
              <ul class="dropdown-menu" style="left: 70% !important;">
                <li><a href="customer_order.php" style="text-decoration:none; color:grey;">Últimas compras</a></li>
                <li class="divider"></li>
                <li><a href="" style="text-decoration:none; color:grey;">Mudar Password</a></li>
                <li class="divider"></li>
                <li><a href="logout.php" style="text-decoration:none; color:grey;">Sair</a></li>
              </ul>
            </li>
    </nav>
<?php
  $ref=$_GET["name"];
  include "db.php";
  $product_query = "SELECT * FROM products WHERE product_ref='$ref'";
  $run_query = mysqli_query($con,$product_query);
  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $pro_id = $row['product_id'];
      $pro_title = $row['product_title'];
      $pro_price = $row['product_price'];
      $pro_image = $row['product_img'];
      $pro_image2 = $row['product_img2'];
      $pro_desc = $row['product_desc'];
      $pro_ref = $row['product_ref'];
      $stock = $row['qt'];
    
  }
}
if ($stock >0) { 
        $stock_eq="<p>REF: $pro_ref</p><span class='btn btn-success'style='pointer-events: none;'>Disponível</span> <button pid='$pro_id' style='float:right;' id='product' class='btn btn-primary btn-xs'>Comprar</button>"; 
     } 
    else { 
      $stock_eq="<p>REF: $pro_ref</p><span class='btn btn-danger' style='pointer-events: none;'>Indisponível</span>"; 
    }

 echo"
    <div class='container'>

      <div class='row'>

        <div class='col-lg-3'>

          <div id='get_category_prod'></div>
      </div>
       "; 
echo "
        <div class='col-lg-9'>
          
          <div  id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
            <ol class='carousel-indicators'>
              <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
            </ol>
            <div class='carousel-inner' role='listbox' >
              <div class='carousel-item active'>
                <img width='' height='280' src='img/$pro_image.jpg' alt='First slide'>
              </div>
              <div class='carousel-item'>
                <img width='' height='280' src='img/$pro_image2.jpg' alt='Secondi slide'>
              </div>
            </div>
            <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>
          <div class='col-md-20' id='product_msg'></div>
          <div class='card mt-4'>
            <div class='card-body'>
          <h3 class='card-title'>$pro_title</h3>
          <h5>$pro_price €</h5>
          <div>$stock_eq</div>
            </div>
          </div>
          <!-- /.card -->

          <div class='card card-outline-secondary my-4'>
            <div class='card-header'>
              Ficha Técnica
            </div>
            <div class='card-body'>
             $pro_desc
            </div>
          </div>
          <br><br><br>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->
"; ?>
    <footer class="py-4 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Loja 2018</p>
      </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
