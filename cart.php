 <?php
    include_once 'header.php';
    include_once 'database_handle.php';

    //userid from $_SESSION['id']
    if(isset($_SESSION['id'])){
      $UserID = $_SESSION['id'];
    }
    else{
      echo "<script>alert('You are not logged in!');window.location = 'index.php';</script>";
    }

?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    html, html a {
    -webkit-font-smoothing: antialiased;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    }

    body {
    background-color: #fff;
    color: #666;
    font-family: 'Open Sans', sans-serif;
    font-size: 62.5%;
    margin: 0 auto;
    }

    a {
    border: 0 none;
    outline: 0;
    text-decoration: none;
    }

    strong {
    font-weight: bold;
    }

    p {
    margin: 0.75rem 0 0;
    }

    h1 {
    font-size: 0.75rem;
    font-weight: normal;
    margin: 0;
    padding: 0;
    }

    input,button {
    border: 0 none;
    outline: 0 none;
    }

    button {
    background-color: #666;
    color: #fff;
    }

    button:hover,button:focus {
    background-color: #555;
    }

    img, .basket-labels, .basket-product {
    width: 100%;
    }

    input, button, .basket, .basket-labels, .item, .price, .quantity, 
    .subtotal, .basket-product, .product-image, .product-details {
    float: left;
    }

    .price:before, .subtotal:before, .subtotal-value:before,
    .total-value:before, .promo-value:before {
content: 'RM';
    }

    .hide {
    display: none;
    }

    main {
    clear: both;
    font-size: 0.75rem;
    margin: 0 auto;
    overflow: hidden;
    padding: 1rem 0;
    width: 960px;
    }

    .basket, aside {
    padding: 0 1rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

    .basket {
    width: 100%;
    }

    label {
    display: block;
    margin-bottom: 0.3125rem;
    }


    .basket-labels {
    border-top: 3px solid black;
    border-bottom: 3px solid black;
    margin-top: 1.625rem;
    }

    ul {
    list-style: none;
    margin: 0;
    padding: 0;
    }

    li {
    color: #111;
    display: inline-block;
    padding: 0.625rem 0;
    }

    li.price:before, li.subtotal:before {
    content: '';
    }

    .price, .quantity, .subtotal {
    width: 15%;
    font-size:30px;
    font-weight:bold;
    color:black;
    font-family: 'Raleway', sans-serif;
    }

    .subtotal {
    text-align: right;
    }

    .remove {
    bottom: 1.125rem;
    float: right;
    position: absolute;
    right: -225px;
    text-align: right;
    width: 45%;
    }

    .remove button {
    background-color: transparent;
    color: #777;
    float: none;
    text-decoration: underline;
    text-transform: uppercase;
    }

    .item-heading {
    padding-left: 4.375rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

    .basket-product {
    border-bottom: 3px solid black;
    padding: 1rem 0;
    position: relative;
    }

    .product-image {
    width: 29%;
    }

    .product-details {
    width: 105%;
    font-size:20px;
    }

    .product-frame {
    border: 3px solid black;
    width: auto !important;
  height: 140px !important;
  margin: 0 auto 1em auto;
    }


    .product-details {
    padding: 0 1.5rem;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

    .quantity-field {
    background-color: #ccc;
    border: 1px solid #aaa;
    border-radius: 4px;
    font-size: 0.625rem;
    padding: 2px;
    width: 3.75rem;
    width:100px;
    height:50px;
    font-size:24px;
    }

    aside {
    float: right;
    position: relative;
    width: 30%;
    }

    .summary {
    background-color: #eee;
    border: 1px solid #aaa;
    padding: 1rem;
    position: relative;
    width: 250px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    margin-top: 65px;
    }

    .summary-total-items {
    color: #666;
    font-size: 0.875rem;
    text-align: center;
    }

    .summary-total, .summary-total {
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    clear: both;
    margin: 1rem 0;
    overflow: hidden;
    padding: 0.5rem 0;
    padding-bottom: 3rem;
    }

    .subtotal-title, .subtotal-value, .total-title, .total-value {
    color: #111;
    float: left;
    width: 50%;
    }

    .subtotal-value, .total-value {
    text-align: right;
    }

    .total-title {
    font-weight: bold;
    text-transform: uppercase;
    }

    .summary-checkout {
    display: block;
    }

    .checkout-cta {
    display: block;
    float: none;
    font-size: 0.75rem;
    text-align: center;
    text-transform: uppercase;
    padding: 0.625rem 0;
    width: 100%;
    }



    </style>
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
<h1 style="font-size:500%;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Cart</h1> 
      <main>
          <div class="basket" >
          <div class="basket-labels">
            <ul style="position:relative;left:150px;font-size:24px">
            <li style="position:relative;left:-150px"class="item item-heading" style='font-family: "Times New Roman", Times, serif;'>Item</li>
            <li class="price" style='font-family: "Times New Roman", Times, serif;'>Price</li>
            <li class="quantity" style='font-family: "Times New Roman", Times, serif;'>Quantity</li>
            <li class="subtotal" style='font-family: "Times New Roman", Times, serif;'>Subtotal</li>
            </ul>
          </div> 
        <?php
              
              require_once 'database_handle.php';
              $query = "SELECT * FROM product_detail join cart ON product_detail.ProductID = cart.ProductID where UserID = '$UserID' and payment = 'no';";
              $query_run = mysqli_query($conn,$query);
              $check_faculty = mysqli_num_rows($query_run)>0;
              if($check_faculty){
                while($row=mysqli_fetch_array($query_run)){
            ?>
<div class="basket-product">
          <div class="item">
            <div class="product-image">
                <img src="<?=$row['ProductImage']?>" class="product-frame">
            </div>
            <div class="product-details" >

                <h3><strong><?= $row['Name']?></strong></h3>
                <p><strong>Category : <?= $row['Category']?></strong></p>
                <p>Product Code : <?= $row['ProductID']?></p>
            </div>
          </div>
          <div class="price"><?= $row['Price']?></div>
          <div class="quantity">
            <input type="number" value="1" min="0" class="quantity-field">
          </div>
          <div class="subtotal"><?= $row['Price']?></div>
          <div class="remove">
          <form method="post" name="form" value="<?php echo $row['ProductID']?>">
            <input type="submit"  name="comfirmremove" value="Remove Product" style="width:150px;height:30px;position:relative;top:-130px;left:50px">
            <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
            </form>
          </div> 
</div>
        <?php
         }
        }else{
            echo "<h2 style='color:black;font-size:300%'>There is no product in cart!!!</h2>";}
        ?>
        </div>
        <aside>
        <div class="summary">
        <?php
        $query = "select sum(numbers) AS total from (select Price as numbers FROM product_detail join cart ON product_detail.ProductID = cart.ProductID where UserID = $UserID and payment = 'no') as a;";
        $query_run = mysqli_query($conn,$query);
        $row1=mysqli_fetch_array($query_run);
        ?>

            <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
            <div class="summary-total">
            <div class="total-title">Total</div>
            
            <div class="total-value final-value" id="basket-total"><?php echo $row1['total'];?> </div>
            </div> 
            <div class="summary-checkout">
            <form method="post" name="pay">
            <input type='submit' class="checkout-cta" name="checkout" value="Checkout Now">
            </form>
            </div>
        </div>
        </aside>
    </main>

    <script>
        /* Set misc */
var fadeTime = 200;

/*actions */
$('.quantity input').change(function() {
  updateQuantity(this);
});


$(document).ready(function() {
  updateSumItems();
});

/* calculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;

  /* Sum up row total */
  $('.basket-product').each(function() {
    subtotal += parseFloat($(this).children('.subtotal').text());
  });
  var total = subtotal;


  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    $('.total-value').fadeOut(fadeTime, function() {
      $('#basket-total').html(total.toFixed(2));
      $('.total-value').fadeIn(fadeTime);
    });
  } else {
    /* Update summary display. */
    $('.final-value').fadeOut(fadeTime, function() {
      $('#basket-subtotal').html(subtotal.toFixed(2));
      $('#basket-total').html(total.toFixed(2));
      $('.final-value').fadeIn(fadeTime);
    });
  }
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update price display and recalc cart totals */
  productRow.children('.subtotal').each(function() {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });

  productRow.find('.item-quantity').text(quantity);
  updateSumItems();
}

function updateSumItems() {
  var sumItems = 0;
  $('.quantity input').each(function() {
    sumItems += parseInt($(this).val());
  });
  $('.total-items').text(sumItems);
}

    </script>
    <?php
          if(isset($_POST['comfirmremove'])){
            echo "<meta http-equiv='refresh' content='0'>";
            $ProductID = $_POST['ProductID'];
            $delete_data = "DELETE FROM cart WHERE  UserID= $UserID AND ProductID = $ProductID;";
            if (mysqli_query($conn, $delete_data)) {
              echo '<script> alert("Delete from Cart Successfully!");</script>';
              
          }
  }?>

<?php
          if(isset($_POST['checkout'])){
            $query = "SELECT * FROM product_detail join cart ON product_detail.ProductID = cart.ProductID where UserID = '$UserID' and payment = 'no';";
            $query_run = mysqli_query($conn,$query);
            if (mysqli_num_rows($query_run)>0) {
            echo '<script> window.location.href = "pay.php"</script>';
         }
             else{echo '<script> alert("No Product In Cart");</script>';
                  
            
              
          }
  }?>


              

</body>
</html>