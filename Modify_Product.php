<?php

include_once 'header.php';
// check if user is admin / logged in
if(isset($_SESSION['id'])){
    $userID = $_SESSION['id'];
    if($userID != 1){
        echo '<script>alert("You are not an Admin!");window.location = "index.php"</script>;';
    }
}
else{
    echo '<script>alert("Please Login!");window.location = "index.php"</script>;';
}


$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);

?>

<h1>Modify Product</h1>
<form class="search" method="post" action="search_modify_product.php">
    <input type="text" placeholder="Search a product name" name="searchproduct">
    <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
</form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
    $query = "SELECT * FROM product_detail";
    $query_run = mysqli_query($conn,$query);
    $check_faculty = mysqli_num_rows($query_run)>0;
    if($check_faculty){
        while($row=mysqli_fetch_array($query_run)){?>
            <div style="display: block;margin-left: auto;margin-right: auto;width: 80%;position:relative;left:0px">
                <div class="col-md-12">
                    <div class="card mt-5"style="background-color:pink;position:relative; top:8px;height:300px">
                        <div class="card-body">
                            <img src="<?php echo $row['ProductImage']?>"style="width:300px;height:250px">
                            <div class="card-title" style="position:relative;left:330px;top:-250px;width:580px">
                                <h4>
                                    <?php echo $row['Name']?>
                                </h4>
                                <div style="font-family: 'Nunito', sans-serif;font-weight:bold;">
                                    <?php echo "Price : RM ". $row['Price']?>
                                    <br>
                                    <?php echo "Category : ". $row['Category']?>
                                    <br>
                                    <?php echo "Product Description : ". $row['Description']?>
                                <br>
                                <br>
                                </div>
                                <form action="update_product.php" method="post">
                                    <button type="submit" name="modifyproduct" class="btn btn-warning" style="width:200px;margin-left: auto;margin-right: auto;">
                                    <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                        Modify Product Detail
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                </form>
                                <form method="post" name="form" value="<?php echo $row['ProductID']?>" onClick="Refresh()">
                                <div style="position:relative;top:-60px;left:250px;width:200px;height:61px" class="btn btn-danger">
                                    <input type="submit"  name="comfirmremove" value="Remove" style="background: transparent;border: none;">
                                    <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
                                </div>    
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
                                echo "<h2 style='color:red;font-size:300%'>There is currently no product!</h2>";
                            }
                        
                        ?>
<?php
    if(isset($_POST['comfirmremove'])){
        echo "<meta http-equiv='refresh' content='0'>";
        $ProductID = $_POST['ProductID'];
        $delete_data = "DELETE FROM product_detail WHERE ProductID = $ProductID;";
            if (mysqli_query($conn, $delete_data)){
                echo '<script> alert("Product Successfully Deleted!");</script>';
            }
    }
?>


<?php
    include_once 'footer.php';
?>