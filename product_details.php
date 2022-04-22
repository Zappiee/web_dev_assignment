<?php
    include_once 'header.php';
    require_once 'database_handle.php';
    // $ProductID = $_POST['product_id'];
    if(isset($_POST['viewproduct'])){
        $ProductID = $_POST['product_id'];
        // break;
        // return $ProductID;
        //select * where id=productid then display all info

        //userid from $_SESSION['id']
        if(isset($_SESSION['id'])){
            $UserID = $_SESSION['id'];
        }
        $query = "SELECT * FROM product_detail where ProductID = $ProductID";
        $query_run = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($query_run);
        $tsql = $conn->query("SELECT TotalRating AS total FROM product_detail where ProductID = $ProductID;");
        $nData = $tsql->fetch_array();
        $total = $nData['total'];
        $sql = $conn->query("SELECT num_of_rating AS num FROM product_detail where ProductID = $ProductID;");/* Wait to connect to product ID */
        $rData = $sql->fetch_array();
        $num = $rData['num'];
        if($total > 0){
            $avg = $total / $num;
        }else{
            $avg = 0;
        }
        ?>
        
<style>
    span{
        color: black;
        font-size:2em;
        display: none;
    }
    .cartlogo1 i{

    position: absolute;
    left: 57px;
    top: 353px;
    color:gray;
    }
</style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- <div style="float: right;margin: 0px 00px;"> -->
            <h1>Product Details</h1>
                    <div class="col-md-4" style="width:500px;    margin: 20px 150px;;float:right;">
                        <h5 style="font-size:50px;font-family: 'Ubuntu', sans-serif;"><?=$row['Name']?></h5>
                        <h5><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <span id="0" class="stars" data-rating="0" data-num-stars="5"></span>
                        <span id="0.5" class="stars" data-rating="0.5" data-num-stars="5"></span>
                        <span id="1" class="stars" data-rating="1" data-num-stars="5"></span>
                        <span id="1.5" class="stars" data-rating="1.5" data-num-stars="5"></span>
                        <span id="2" class="stars" data-rating="2" data-num-stars="5"></span>
                        <span id="2.5" class="stars" data-rating="2.5" data-num-stars="5"></span>
                        <span id="3" class="stars" data-rating="3" data-num-stars="5"></span>
                        <span id="3.5" class="stars" data-rating="3.5" data-num-stars="5"></span>
                        <span id="4" class="stars" data-rating="4" data-num-stars="5"></span>
                        <span id="4.5" class="stars" data-rating="4.5" data-num-stars="5"></span>
                        <span id="5" class="stars" data-rating="5" data-num-stars="5"></span></h5>
                        <h5 style="font-size: 1.3em;border-left: thick solid #ff0000;"><?php echo "Average Rating :  " . round($avg,1)."  Stars" ?></h5>
                        <h5 style="font-size: 1.3em;border-left: thick solid #ff0000;"><?php echo "Total Amount of Rating :  " . $num, "   Total Ratings"?></h5>
                        <script>
                            var avg = <?php echo round($avg,1); ?>;
                                $.fn.stars = function() {
                                    return $(this).each(function() {
                                        var rating = $(this).data("rating");
                                        var numStars = $(this).data("numStars");
                                        var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fas fa-star"></i> ');
                                        var halfStar = ((rating % 1) !== 0) ? '<i class="fas fa-star-half-alt"></i> ' : '';
                                        var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="far fa-star"></i> ');
                                        $(this).html(fullStar + halfStar + noStar + "<br />");  
                                    });
                                }
                        $('.stars').stars();
                            if (avg <=0.25){
                                document.getElementById("0").style.display = 'block';
                            }else if(avg <= 0.75){
                                document.getElementById("0.5").style.display = 'block'; 
                            }else if(avg <= 1.25){
                                document.getElementById("1").style.display = 'block'; 
                            }else if(avg <= 1.75){
                                document.getElementById("1.5").style.display = 'block'; 
                            }else if(avg<= 2.25){
                                document.getElementById("2").style.display = 'block'; 
                            }else if (avg <= 2.75){
                                document.getElementById("2.5").style.display = 'block';
                            }else if(avg<=3.25){
                                document.getElementById("3").style.display = 'block';
                            }else if(avg<=3.75){
                                document.getElementById("3.5").style.display = 'block';
                            }else if(avg<=4.25){
                                document.getElementById("4").style.display = 'block';
                            }else if(avg<=4.75){
                                document.getElementById("4.5").style.display = 'block';
                            }else{
                                document.getElementById("5").style.display = 'block';}
                        </script>

                        <br>
                        <h5 style="font-size:28px">Product Details</h5>
                        <hr style="height:2px;border:none;color:#333;background-color:#333;" />
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
                        <div style="font-size:20px;font-family: 'Nunito', sans-serif;padding-top:5px;">
                            <h5 style="padding-top:10px;font-weight:bold;">Pricing: RM <?=$row['Price']?></h5>
                            <h5 style="padding-top:10px;font-weight:bold;">Product Category: <?=$row['Category']?></h5>
                            <h5 style="padding-top:10px;font-weight:bold;">Estimate Arrival Date :
                                <?php
                                    $now = new DateTime();
                                    echo $now->add(new DateInterval('P1W'))->format('d-m-Y');
                                ?>
                            </h5>
                            <h5 style="padding-top:10px;font-weight:bold;">Distributed By : Paws & Claws Pet Shop</h5>
                            <h5 style="padding-top:10px;font-weight:bold;"><i class="fas fa-map-marker-alt" style="color:red;font-size:24px"></i> Location : Kampung Semerah Padi, 93050 Kuching, Sarawak</h5>
                        </div>
                        <br>
                        <div style="content:' ';display:block;border:2px solid black;width:500px;position:relative;left:-590px;top:0px">
                            <h4>By Purchasing We Provide and Guarantee : </h2>
                            <h5 style="font-size:20px;"><i class="fas fa-check-double" style="color:green;"></i> 100% Authenticity</h5>
                            <h5 style="font-size:20px;"><i class="fas fa-check-double" style="color:green;"></i> Warranty with Refund Policy</h5>
                            <h5 style="font-size:20px;"><i class="fas fa-shipping-fast"></i> Guarantee shipped within 1 week</h5>
                            <h5 style="font-size:20px;"><i class="fa fa-truck" aria-hidden="true"></i> Free Shipping</h5>
                        </div>
                        <br>
                        <br>
                        <!-- change the action -->
                        <!-- change here to add to cart php -->
                            <form method="post" value="<?=$row['ProductID']?>" action="product_details.php?viewproductid=<?=$row['ProductID']?>" style="position:relative;top:-230px">
                                <!-- <i class="fas fa-shopping-cart" style="position:absolute;left: 810px;top:110px;color:gray;font-size:25px"></i> -->
                                <input type="submit" name="addtocart" style="background-color:#ffc107;width:150px;height:70px" value="Add To Cart">
                                <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                <input type="hidden" name="UserID" value="<?php echo $UserID?>">
                            </form>
                            <form method="post" action='pay.php' style="position:relative;top:-300px; left:200px;" >
                                <input type="submit" name="buynow" style="background-color:#ffc107;width:150px;height:70px" value="Buy Now">                                            
                            </form>
                            
                    </div>

        <div style="padding-top:840px;width:950px;margin: 0 auto;width: 1000px;">
                    <h5 style="font-size:28px;"> Product Description</h5>
                    <hr style="height:2px;border:none;color:#333;background-color:#333;width:600px" />
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
                        
                    <h5  style="font-weight:bold;font-family: 'Raleway', sans-serif;"><?=$row['Description']?></h5>
        </div>
    <!-- </div> -->
<!-- make back button make next button etc?idk possible or not -->
<!-- also need identify igf guest or member if member can add to cart here and if guest give warning need login -->
<div style="max-width: 45%;width:500px;position:relative; top:-900px;left:70px">

    <!-- Full-width images -->
    <div class="myslide">
    <img src="<?=$row['ProductImage']?>" style="width:500px;height:400px;position:relative;top:-10px"></a>
    </div>
    <!-- if 2 img exist will display slide show if dont then will display 1 img -->
    <?php
        if(empty($row['ProductImage2'])) {?>
            <img src="<?=$row["ProductImage"]?>" style="width:500px;height:300px"></a>
        <?php 
        }
        else {
        ?>
            <div class="myslide">
            <img src="<?=$row["ProductImage2"]?>" style="width:500px"></a>
            </div>


            <!-- next and previous buttons -->
            <a class="previmg" onclick="plusSlides(-1)"style="position: relative;top: -200px;left:-50px">&#10094;</a>
            <a class="nextimg" onclick="plusSlides(1)"style="position: relative;top: -200px;left:450px">&#10095;</a>
</div>
            <br>

            <!-- bar button (if got 1 then no need if gt 2 then do 2 if got 3 then do 3--> 
            <div style="position:relative;left:25%">
                <span class="bar" onclick="currentSlide(1)" style="position: relative;top: -950px;left:-50px"></span>
                <span class="bar" onclick="currentSlide(2)" style="position: relative;top: -950px;left:-40px"></span>
            </div>

            <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous control
            function plusSlides(n) {
            showSlides(slideIndex += n);
            }

            // Thumbnail image control
            function currentSlide(n) {
            showSlides(slideIndex = n);
            }

            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("myslide");
            var dots = document.getElementsByClassName("bar");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
<?php 
    }
}
?>
</div>
<div style="margin: 0 auto;width: 1000px;">
    <h2>Recommended Product for you</h2>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
                                                <h4 class="card-title; ">
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
                                                    <div class="cartlogo">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <input type="submit" name="addtocart" class="mt-2" style="width:200px;margin-left: auto;margin-right: auto;" value="Add to Cart">
                                                        <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                                    </div>
                                                </form>
                                                <p class="card-text">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                            }
                        }
                    ?>
</div>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
<div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:-95px;height:0px;position:relative;left:-105px;">
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
         echo '<script> alert("Product is already in Cart");window.location = "our_product.php";</script>';
        }
        else{
            $sql = "INSERT INTO cart(ProductID, UserID, payment) VALUES ('$ProductID','$UserID', 'no');";
            if (mysqli_query($conn, $sql)) 
            {
            echo '<script> alert("Add to Cart Successfully!");window.location = "our_product.php";</script>';
            }
        }
    }
    else{
        echo "<script>alert('Please login to add product to cart. You will be redirected back to our product page');window.location = 'our_product.php';</script>";
    }
}

?>
<?php
    include_once 'footer.php';
?>