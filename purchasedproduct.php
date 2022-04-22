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

<h1 style="font-weight:bold;font-size:500%">Purchase Product for Rating</h1>
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


    h1 {
    font-weight: normal;
    margin: 0;
    padding: 0;
    }


    img, .basket-labels, .basket-product {
    width: 100%;
    }

     .basket, .basket-labels, .item, .name, 
     .basket-product, .product-image {
    float: left;
    }


    main {
    clear: both;
    font-size: 0.75rem;
    margin: 0 auto;
    overflow: hidden;
    padding: 1rem 0;
    width: 960px;
    }

    .basket {
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


    .name {
    width: 30%;
    font-size:20px;
    font-weight:bold;
    color:black;
    font-family: 'Raleway', sans-serif;
    margin-left: 40px;
    text-align: center;
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


    .product-frame {
    border: 3px solid black;
    width: auto !important;
  height: 140px !important;
  margin: 0 auto 1em auto;
    }



    </style>
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    
      <main>
          <div class="basket" >
          <div class="basket-labels">
            <ul style="position:relative;left:150px;font-size:24px">
            <li style="position:relative;left:-150px"class="item item-heading" style='font-family: "Times New Roman", Times, serif;'>Item</li>
            <li  style='font-family: "Times New Roman", Times, serif;margin-left:30px;'>Name</li>
            <li  style='font-family: "Times New Roman", Times, serif; margin-left:100px;'>ProductID</li>
            <li  style='font-family: "Times New Roman", Times, serif; margin-left:35px;'>Action</li>
            </ul>
          </div> 
        <?php
              
              require_once 'database_handle.php';
              $query = "SELECT * FROM product_detail join cart ON product_detail.ProductID = cart.ProductID where UserID = '$UserID' and payment = 'yes';";
              $query_run = mysqli_query($conn,$query);
              $check_faculty = mysqli_num_rows($query_run)>0;
              if($check_faculty){
                while($row=mysqli_fetch_array($query_run)){
            ?>
<div class="basket-product">
          <div class="item">
            <div class="product-image" style="width:200px;height:200px;position:relative;top:50px" >
                <img src="<?=$row['ProductImage']?>" class="product-frame">
            </div>
          </div>
          <div class="name"style="position:relative;top:100px">
            <?= $row['Name']?>
          </div>
          <div class="name" style="margin-left: -50px;position:relative;top:100px">
          <?= $row['ProductID']?>
        </div>
        <div class="name" style="margin-left: -100px;">
          <form method="POST" action="giverating.php" style="position:relative;top:90px">
            <input type="submit" name="giverating" method="POST" value="Provide Product Rating" style="height:50px;background-color:yellow">
            <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
          </form>
        </div>
        
</div>
        <?php
         }
        }else{
            echo "<h2 style='color:black;font-size:300%'>There is no product in cart!!!</h2>";}
        ?>
        
    </main>
       

</body>
</html>
<?php
include_once 'footer.php'
?>