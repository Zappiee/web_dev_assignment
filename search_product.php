<!-- if isset search button then post the user input and select all in database where name = user input -->
<?php
    include_once 'database_handle.php';
    include_once 'header.php';
    if(isset($_SESSION['id'])){
        $UserID = $_SESSION['id'];
    }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
<h1>Product Search Result</h1>
<?php
if(isset($_POST["submitsearch"])){
    $searchresult = $_POST["searchproduct"];
    $searchresult = mysqli_real_escape_string($conn,$_POST['searchproduct']);
    $sql = "SELECT * FROM product_detail WHERE Name LIKE '%$searchresult%'";
    $finalresult = mysqli_query($conn,$sql);
    $queryresult = mysqli_num_rows($finalresult);
    ?>
<form class="search" method="post" action="search_product.php">
    <input type="text" placeholder="Search a product name" name="searchproduct" value="<?php echo $searchresult ?>">
    <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
</form>
<?php
    echo "There are " . $queryresult . " result(s) found from your search result" . " '$searchresult'";
    if($queryresult>0){
        echo'
            <script>
                alert("Product found!");
            </script>
        ';
        while($row=mysqli_fetch_assoc($finalresult)){?>
            <div style="display: block;margin-left: auto;margin-right: auto;width: 80%;position:relative;left:0px">
                <div class="col-md-12">
                    <div class="card mt-5"style="background-color:pink;position:relative; top:8px;height:300px">
                        <div class="card-body">
                            <img src="<?php echo $row['ProductImage']?>"style="width:300px;height:250px">
                            <div class="card-title" style="position:relative;left:330px;top:-250px;width:580px">
                                <h4>
                                    <?php echo $row['Name']?>
                                </h4>
                                <br>
                                <br>
                                <div style="font-family: 'Nunito', sans-serif;font-weight:bold;">
                                    <?php echo "Price : RM ". $row['Price']?>
                                    <br>
                                    <?php echo "Category : ". $row['Category']?>
                                    <br>
                                    <?php echo "Product Description : ". $row['Description']?>
                                <br>
                                </div>
                                <form method="post" action="our_product.php">
                                    <div class="cartlogo">
                                        <i class="fas fa-shopping-cart"></i>
                                        <input type="submit" name="addtocart" class="mt-2" style="width:200px;margin-left: auto;margin-right: auto;" value="Add to Cart">
                                        <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                    </div>
                                </form>
                                <form method="post" value="<?=$row['ProductID']?>" action="product_details.php?viewproductid=<?=$row['ProductID']?>">
                                    <input type="submit" name="viewproduct" class="mt-2" style="width:200px;margin-left: auto;margin-right: auto;" value="View Product Details">
                                    <input type="hidden" name="product_id" value="<?php echo $row['ProductID']?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row['Name']?>">
                                    <input type="hidden" name="product_price" value="<?php echo $row['Price']?>">
                                    <input type="hidden" name="product_category" value="<?php echo $row['Category']?>">
                                    <input type="hidden" name="product_img" value="<?php echo $row['ProductImage']?>">
                                </form>
                            </div>
                            <p class="card-text">
                            
                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    else{
        echo'
        <script>
            alert("There are no matching results");
        </script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
        <div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:-258px;height:0px;position:relative;left:px;">
            <div style="width:450px;text-align:center;">
        ';
        
    }
}
?>
<?php
    if(isset($_POST['addtocart'])){
        $UserID = 0;
        $UserID = $_SESSION['id'];
        if($UserID != 0){
            $ProductID = $_POST['ProductID'];
            $sql = "SELECT * FROM cart where UserID = $UserID and ProductID = $ProductID;";
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
            echo "<script>alert('Please login to add product to cart. You will be redirected back to our product page');window.location = 'search_product.php';</script>";
        }
    }
    
    ?>

<?php
    include_once 'footer.php';
?>