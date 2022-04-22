<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop</title>
<style>
    #container {
  position: relative;
  width: 300px;
  height: 200px;
}
#block {
  background: #CCC;
  filter: alpha(opacity=60);
  /* IE */
  -moz-opacity: 0.35;
  /* Mozilla */
  opacity: 0.35;
  /* CSS3 */
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
#text {
  position: absolute;
  top: 0;
  left: 0;
  text-align:center;
  width: 1200px;
  height: 100%;
  font-size:24px;
  font-weight:bold;
  text-align:center;
  position:relative;
  top:-40px;
}
.cartlogo1 i{

position: absolute;
left: 57px;
top: 353px;
color:gray;
}
</style>
    <?php
    include_once 'header.php';
    if(isset($_SESSION['id'])){
        $UserID = $_SESSION['id'];
    }
    ?>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <br>
        <!-- <div style="opacity:0.6;"> -->
        <img src="images/petwelcome.jpg" style="width:1200px;position:relative;top:-40px;">
        <div id="container">
            <div id="block">
                <img src="images/homepage_dog.jpg" style="width:1200px;height:400px;">
            </div>
            <div id="text">
                <h1>Paws & Claw Pet Shop</h1>
                <br>
                Providing the best quality of product for your pets
                <br>
                <!-- <div style="border:2px solid black; border-bottom:5px; margin-right:325px; margin-left:325px;border-radius: 15px;">     -->
                    <p style="text-align : justify; margin-left: 6%;font-size:20x;font-family: 'Nunito', sans-serif;  font-weight:bold;">
                        <b>
                            <br>
                            <i class="fas fa-check" style="color:green"></i>&nbsp;Good Quality Of Products that will Guarantee Satisfaction
                            <br>
                            <i class="fas fa-check" style="color:green"></i>&nbsp;Have Reputation of Good After-Sales Service throughout Sarawak
                            <br>
                            <i class="fas fa-check" style="color:green"></i>&nbsp;Cheap and Reasonable Price For All Product
                            <br>
                            <i class="fas fa-check" style="color:green"></i>&nbsp;Provide Customer with a Refund Policy if customer is not satisfied on the product (T&C Applied)
                            <br>
                            <i class="fas fa-check" style="color:green"></i>&nbsp;Monthly Discount for Memberships
                        </b>
                    </p>
                    <div style="background-color:pink;width:1200px">
                        <div class="container py-5" style="position:relative; top:0px">    
                            <!-- slideshow -->
                            <div class="slideshow" style="position:relative;left:0">
                            <h2>Our Photos</h2>
                                <!-- Full-width images -->
                                <?php
                                    $dir = "images/petshopimage*.jpg";
                                    //get the list of all files with .jpg extension in the directory and safe it in an array named $images
                                    $images = glob( $dir );
                                    
                                    //extract only the name of the file without the extension and save in an array named $find
                                    foreach( $images as $image ):
                                        echo'<div class="myslide">';
                                        echo "<img src=" . $image . " style='width:100%; border-radius: 20px;width:800px' />";
                                        echo'</div>';
                                    endforeach;
                                ?>
                                <div class="myslide">
                                    <img src="images/petshopimage4.jfif" style="width:100%; border-radius: 20px;width:800px"></a>
                                </div> 
                                <!-- next and previous buttons -->
                                <a class="previmg" onclick="plusSlides(-1)" style="position: absolute;left: -100px;top:350px">&#10094;</a>
                                <a class="nextimg" onclick="plusSlides(1)" style="position: absolute;left: 810px;top:350px">&#10095;</a>
                            </div>
                            <br>

                            <!-- bar button -->
                            <div style="text-align:center">
                                <?php
                                    $x = 1;

                                    do {
                                      echo '<span class="bar" onclick="currentSlide(x)"></span>';
                                      $x++;
                                    } while ($x <= 12);
                                ?>
                            </div>

                            <script>
                            var slideIndex = 1;
                            showSlides(slideIndex);

                            // Next/previous control
                            function plusSlides(n) {
                            showSlides(slideIndex += n);}

                            // Thumbnail image control
                            function currentSlide(n) {
                            showSlides(slideIndex = n);}

                            function showSlides(n) {
                            var i;
                            var slides = document.getElementsByClassName("myslide");
                            var dots = document.getElementsByClassName("bar");
                            if (n > slides.length) {slideIndex = 1}
                                if (n < 1) {slideIndex = slides.length}
                                    for (i = 0; i < slides.length; i++) {
                                        slides[i].style.display = "none";}
                                for (i = 0; i < dots.length; i++) {
                                    dots[i].className = dots[i].className.replace(" active", "");}
                            slides[slideIndex-1].style.display = "block";
                            dots[slideIndex-1].className += " active";}
                            </script>
                        </div>
                    </div>
            </div>
        </div>        
        <div style="margin-top:1000px;">
        <form action="our_product.php" method="post" style="padding:20px;"></form> 
        <div class="container py-5">
            <h2>Recommended Product for you</h2>
                <div class="row mt-4">
                    <?php
                        require_once 'database_handle.php';
                        $query = "SELECT * FROM product_detail ORDER BY RAND() LIMIT 4;";
                        $query_run = mysqli_query($conn,$query);
                        $check_faculty = mysqli_num_rows($query_run)>0;
                        if($check_faculty){
                            while($row=mysqli_fetch_array($query_run)){?>
                                <div class="col-md-3">
                                        <div class="card mt-5"style="background-color:pink;text-align:center;position:relative; top:-78px;">
                                            <div class="card-body">
                                                <img src="<?php echo $row['ProductImage']?>" class="productimage" alt="product images" style="width:200px;height:200px">
                                                <h4 class="card-title">
                                                    <?php echo $row['Name']?>
                                                </h4>
                                                <h4 class="card-title mt-0">
                                                    <?php echo "RM ". $row['Price']?>
                                                </h4>
                                                <form method="post" value="<?=$row['ProductID']?>" action="product_details.php?viewproductid=<?=$row['ProductID']?>">
                                                    <input type="submit" name="viewproduct" class="mt-2" style="width:200px;margin-left: auto;margin-right: auto;" value="View Product Details">
                                                    <input type="hidden" name="product_id" value="<?php echo $row['ProductID']?>">
                                                    <input type="hidden" name="product_name" value="<?php echo $row['Name']?>">
                                                    <input type="hidden" name="product_price" value="<?php echo $row['Price']?>">
                                                    <input type="hidden" name="product_category" value="<?php echo $row['Category']?>">
                                                    <input type="hidden" name="product_img" value="<?php echo $row['ProductImage']?>">
                                                </form>
                                                <form method="post" value="<?=$row['ProductID']?>" action="">
                                                    <div class="cartlogo1">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <input type="submit" name="addtocart" class="mt-2" style="width:200px;margin-left: auto;margin-right: auto;" value="Add to Cart">
                                                        <!-- <i class="fas fa-shopping-cart"></i> -->
                                                        <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                            }
                        }else{
                            echo "<h2 style='color:red;font-size:300%'>There is currently no product for this category!!!</h2>";}
                    ?>
                </div>
        </div>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:-95px;height:0px;position:relative;left:10px;">
            <div style="width:450px;text-align:center;">
<?php
   if(isset($_POST['addtocart'])){
    $UserID = 0;
    $UserID = $_SESSION['id'];
    if($UserID != 0){
        $ProductID = $_POST['ProductID'];
        $sql = "SELECT * FROM cart where UserID = $UserID and ProductID = $ProductID and payment = 'no';";
        $num = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($num);
        if($num_rows > 0)
        {
         echo '<script> alert("Product is already in Cart");window.location = "index.php";</script>';
        }
        else{
            $sql = "INSERT INTO cart(ProductID, UserID, payment) VALUES ('$ProductID','$UserID','no');";
            if (mysqli_query($conn, $sql)) 
            {
            echo '<script> alert("Add to Cart Successfully!");window.location = "index.php";</script>';
            }
        }
    }
    else{
        echo "<script>alert('Please login to add product to cart');window.location = 'index.php';</script>";
    }
}

?>
<?php
    include_once 'footer.php';
?>