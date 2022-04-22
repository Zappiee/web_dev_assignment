<?php
    include_once 'header.php';
    include_once 'database_handle.php';
    if(isset($_SESSION['id'])){
        $UserID = $_SESSION['id'];
    }

    //moved to oldprpductcart.php

?>

<!-- link if its customer then can add to cart if guest then cant add to cart and alert msg will appear -->
    <h1 id="h1positioning">
        <li id="navbar">
            <i class="fa fa-bars"></i>
            <ul>
                <li><a href="#pets" id="categorytext">Pets</a></li>
                <li><a href="#food" id="categorytext">Food</a></li>
                <li><a href="#accessory" id="categorytext">Accessory</a></li>
                <li><a href="#toys" id="categorytext">Toys</a></li>
            </ul>
        </li>
        Our Products
    </h1>
    <div>
        <!-- make product catogory here -->
        <form class="search" method="post" action="search_product.php">
            <input type="text" placeholder="Search a product name" name="searchproduct">
            <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
        </form>
        <div style="padding:50px"> 
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <nav class="petbackground">
                <div class="container py-5">
                <h2 id="pets">Pets</h2>
                    <div class="row mt-4">
                        <?php
                            require_once 'database_handle.php';
                            $query = "SELECT * FROM product_detail where Category ='Pets'";
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
                                                    <div class="cartlogo">
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
                                }
                                
                            else{
                                echo "<h2 style='color:red;font-size:300%'>There is currently no product for this category!!!</h2>";
                            }
                        
                        ?>
            </nav>
        </div>
    <!-- /*===========================================food category========================================================= */ -->
    <div style="padding:50px">   
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <nav class="foodbackground">
                <div class="container py-5">
                <h2 id="food">Food</h2>
                    <div class="row mt-4">

                        <?php
                            require_once 'database_handle.php';
                            $query = "SELECT * FROM product_detail where Category ='food'";
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
                                                    <div class="cartlogo">
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
                                }
                                
                            else{
                                echo "<h2 style='color:red;font-size:300%'>There is currently no product for this category!!!</h2>";
                            }
                        
                        ?>
            </nav>
    </div> 
    <!-- /*===========================================accessory category========================================================= */ -->
    <div style="padding:50px">         
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <nav class="accessorybackground">
                <div class="container py-5">
                <h2 id="accessory">Accessory</h2>
                    <div class="row mt-4">
                    <input type="hidden" name="product_id" value="<?php echo $row['ProductID']?>">
                        <?php
                            require_once 'database_handle.php';
                            $query = "SELECT * FROM product_detail where Category ='accessory'";
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
                                                    <div class="cartlogo">
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
                                }
                                
                            else{
                                echo "<h2 style='color:red;font-size:300%'>There is currently no product for this category!!!</h2>";
                            }
                        
                        ?>
            </nav>
    </div>
<!-- /*===========================================toy category========================================================= */ -->
    <div style="padding:50px">     
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <nav class="toybackground">
                <div class="container py-5">
                <h2 id="toys">Toys</h2>
                    <div class="row mt-4">

                        <?php
                            require_once 'database_handle.php';
                            $query = "SELECT * FROM product_detail where Category ='toys'";
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
                                                    <div class="cartlogo">
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
                                }
                                
                            else{
                                echo "<h2 style='color:red;font-size:300%'>There is currently no product for this category!!!</h2>";
                            }
                        
                        ?>
            </nav>
    </div>   
        
        <!--if guest then will give warning cant add to cart if user then can add to cart  -->
        <?php
            if(isset($_GET["view"])){
                if($_GET["view"]== "guest"){
                    //if click add to shopping cart then echo u hv to login to add to cart
                }
            }
            if(isset($_GET["view"])){
                if($_GET["view"]== "user"){
                    //if click add to shopping cart then will add to cart
                }
            }
        ?>
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
            $sql = "INSERT INTO cart(ProductID, UserID, payment) VALUES ('$ProductID','$UserID','no');";
            if (mysqli_query($conn, $sql)) 
            {
            echo '<script> alert("Add to Cart Successfully!");window.location = "our_product.php";</script>';
            }
        }
    }
    else{
        echo "<script>alert('Please login to add product to cart.');window.location = 'our_product.php';</script>";
    }
}

    include_once 'footer.php';
?>
