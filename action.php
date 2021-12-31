<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["description"])){
  $category_query = "SELECT * FROM products";
  $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
  echo "<div class='card card-outline-secondary my-4'>
            <div class='card-header'>
              Ficha Técnica
            </div>
            <div class='card-body'>
  ";
  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $pro_desc2 = $row["product_desc"];
      $pro_id2 = $row["product_id"];
      echo "
        <p>$pro_desc2</p>
      ";
    }
    echo "</div>";
  }
}
if(isset($_POST["category"])){
  $category_query = "SELECT * FROM categories ORDER BY cat_title";
  $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
  echo "<h5 class='my-4'>Categorias</h5>
          <div class='list-group'>
  ";
  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $cid = $row["cat_id"];
      $cat_name = $row["cat_title"];
      echo "
        <a href='#' class='list-group-item category' cid='$cid'>$cat_name</a>
      ";
    }
    echo "</div>";
  }
}
if(isset($_POST["get_category_prod"])){
  $category_query = "SELECT * FROM categories ORDER BY cat_title";
  $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
  echo "<h5 class='my-4'>Categorias</h5>
          <div class='list-group'>
  ";
  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $cid = $row["cat_id"];
      $cat_name = $row["cat_title"];
      echo "
        <a href='index.php' class='list-group-item category' cid='$cid'>$cat_name</a>
      ";
    }
    echo "</div>";
  }
}
if(isset($_POST["page"])){
  $sql = "SELECT * FROM products";
  $run_query = mysqli_query($con,$sql);
  $count = mysqli_num_rows($run_query);
  $pageno = ceil($count/9);
  for($i=1;$i<=$pageno;$i++){
    echo "
      <li><a href='#' page='$i' id='page'>$i</a></li>
    ";
  }
}
if(isset($_POST["getProduct"])){
  $limit = 5;
  if(isset($_POST["setPage"])){
    $pageno = $_POST["pageNumber"];
    $start = ($pageno * $limit) - $limit;
  }else{
    $start = 1;
  }
  $product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 6";
  $run_query = mysqli_query($con,$product_query);
  echo"<div id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
            <ol class='carousel-indicators'>
              <li data-target='#carouselExampleIndicators' data-slide-to='0'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
            </ol>
            <div class='carousel-inner' role='listbox'>
              <div class='carousel-item active'>
                <img class='d-block img-fluid' src='img/slide1.jpg'>
              </div>
              <div class='carousel-item '>
                <img class='d-block img-fluid' src='img/slide2.jpg'>
              </div>
              <div class='carousel-item'>
                <img class='d-block img-fluid' src='img/slide3.jpg'>
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
        <div class='row'>
        ";

  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $pro_id    = $row['product_id'];
      $pro_cat   = $row['product_cat'];
      $pro_title = $row['product_title'];
      $pro_price = $row['product_price'];
      $pro_image = $row['product_img'];
      $pro_desc = $row['product_desc'];
      $pro_ref = $row['product_ref'];
      echo "
      <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='product.php?name=$pro_ref'><img class='card-img-top' src='img/$pro_image.jpg'></a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a href='product.php?name=$pro_ref'>$pro_title</a>
                  </h4>
                  <h5>$pro_price €</h5>
                </div>
</div>
            </div>
      ";
    }
    echo "</div> <br><br><br>";
  }
}
if(isset($_POST["get_seleted_Category"])){
  if(isset($_POST["get_seleted_Category"])){
    $id = $_POST["cat_id"];
    $sql = "SELECT * FROM products WHERE product_cat = '$id' ORDER BY product_price";
  $run_query = mysqli_query($con,$sql);
  echo"<div id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
            <ol class='carousel-indicators'>
              <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
              <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
            </ol>
            <div class='carousel-inner' role='listbox'>
              <div class='carousel-item'></div>
              <div class='carousel-item'></div>
              <div class='carousel-item'></div>
            </div>
          </div>
          <div class='row'>";
  while($row = mysqli_fetch_array($run_query)){
      $pro_id    = $row['product_id'];
      $pro_cat   = $row['product_cat'];
      $pro_title = $row['product_title'];
      $pro_price = $row['product_price'];
      $pro_image = $row['product_img'];
      $pro_desc = $row['product_desc'];
      $pro_ref = $row['product_ref'];
      echo "
            <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='product.php?name=$pro_ref'><img class='card-img-top' src='img/$pro_image.jpg'></a>
                <div class='card-body'>
                  <h4 class='card-title'>
                    <a href='product.php?name=$pro_ref'>$pro_title</a>
                  </h4>
                  <h5>$pro_price €</h5>
                </div>
</div>
            </div>
      ";
    }
    echo "</div> <br><br><br>";
  }
}

if(isset($_POST["addToCart"])){
    

    $p_id = $_POST["proId"];
    

    if(isset($_SESSION["uid"])){

    $user_id = $_SESSION["uid"];

    $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
      echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>O produto já se encontra no carrinho!</b>
        </div>
      ";
    } else {
      $sql = "INSERT INTO `cart`
      (`p_id`, `ip_add`, `user_id`, `qt`) 
      VALUES ('$p_id','$ip_add','$user_id','1')";
      if(mysqli_query($con,$sql)){
        echo "
          <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Produto adicionado ao carrinho</b>
          </div>
        ";
      }
    }
    }
    else{
      $sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
      $query = mysqli_query($con,$sql);
      if (mysqli_num_rows($query) > 0) {
        echo "
          <div class='alert alert-warning'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <b>Produto já foi adicionado ao carrinho!</b>
          </div>";
          exit();
      }
      $sql = "INSERT INTO `cart`
      (`p_id`, `ip_add`, `user_id`, `qty`) 
      VALUES ('$p_id','$ip_add','-1','1')";
      if (mysqli_query($con,$sql)) {
        echo "
          <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Produto adicionado ao carrinho!</b>
          </div>
        ";
        exit();
      }
      
    }
//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
  $remove_id = $_POST["rid"];
  if (isset($_SESSION["uid"])) {
    $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
  }else{
    $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
  }
  if(mysqli_query($con,$sql)){
    echo "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Produto removido do carrinho</b>
        </div>";
    exit();
  }
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
  $update_id = $_POST["update_id"];
  $qty = $_POST["qty"];
  if (isset($_SESSION["uid"])) {
    $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
  }else{
    $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
  }
  if(mysqli_query($con,$sql)){
    echo "<div class='alert alert-info'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Quantidade atualizada</b>
        </div>";
    exit();
  }
}        
}

if (isset($_POST["count_item"])) {
  if (isset($_SESSION["uid"])) {
    $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
  }else{
    $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
  }
  $query = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($query);
  echo $row["count_item"];
  exit();
}

if (isset($_POST["Common"])) {

  if (isset($_SESSION["uid"])) {
    $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
  
  $query = mysqli_query($con,$sql);
  if (isset($_POST["getCartItem"])) {
    if (mysqli_num_rows($query) > 0) {
      $n=0;
      while ($row=mysqli_fetch_array($query)) {
        $n++;
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_price = $row["product_price"];
        $product_image = $row["product_image"];
        $cart_item_id = $row["id"];
        $qty = $row["qty"];
        echo '
          <div class="row">
            <div class="col-md-3">'.$n.'</div>
            <div class="col-md-3"><img class="img-responsive" src="$product_image" /></div>
            <div class="col-md-3">'.$product_title.'</div>
            <div class="col-md-3">$'.$product_price.'</div>
          </div>';
        
      }
      ?>
        <a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
      <?php
      exit();
    }
  }
  }
}
if (isset($_POST["checkOutDetails"])) {
    if (mysqli_num_rows($query) > 0) {
      //display user cart item with "Ready to checkout" button if user is not login
        $n=0;
        while ($row=mysqli_fetch_array($query)) {
          $n++;
          $product_id = $row["product_id"];
          $product_title = $row["product_title"];
          $product_price = $row["product_price"];
          $product_image = $row["product_image"];
          $cart_item_id = $row["id"];
          $qty = $row["qty"];

          echo 
            '<div class="row">
                <div class="col-md-2">
                  <div class="btn-group">
                    <a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
                  </div>
                </div>
                <input type="hidden" name="product_id[]" value="'.$product_id.'"/>
                <input type="hidden" name="" value="'.$cart_item_id.'"/>
                <div class="col-md-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
                <div class="col-md-2">'.$product_title.'</div>
                <div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
                <div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
                <div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
              </div>';
        }
        
        echo '<div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <b class="net_total" style="font-size:20px;"> </b>
          </div>';
        if (!isset($_SESSION["uid"])) {
          echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
              </form>';
          
        }else if(isset($_SESSION["uid"])){
          //Paypal checkout form
          echo '
            </form>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="business" value="shoppingcart@khanstore.com">
              <input type="hidden" name="upload" value="1">';
                
              $x=0;
              $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
              $query = mysqli_query($con,$sql);
              while($row=mysqli_fetch_array($query)){
                $x++;
                echo    
                  '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
                     <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
                     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
                }
                
              echo   
                '<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
                          <input type="hidden" name="notify_url" value="http://localhost/project1/payment_success.php">
                  <input type="hidden" name="cancel_return" value="http://localhost/project1/cancel.php"/>
                  <input type="hidden" name="currency_code" value="USD"/>
                  <input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
                  <input style="float:right;margin-right:80px;" type="image" name="submit"
                    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
                    alt="PayPal - The safer, easier way to pay online">
                </form>';
        }
      }
  }
  
  



?>
