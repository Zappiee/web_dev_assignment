<?php
include_once 'header.php';
include_once 'database_handle.php';

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



if(isset($_POST['ProductID'])){
    $ProductID = $_POST['ProductID'];
    // echo $ProductID;echo "<br>";
}
else{
    echo '<script>alert("Please Access This Page From Admin Profile Navigation Bar!");window.location = "adminprofile.php"</script>';
}




// get ProName
$sql = "select Name from product_detail where ProductID = '" . $ProductID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ProductName = $row[0];
// echo $ProductName;echo "<br>";


// get Price
$sql = "select price from product_detail where ProductID = '" . $ProductID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ProductPri = $row[0];
// echo $ProductPri;echo "<br>";


// get Category
$sql = "select Category from product_detail where ProductID = '" . $ProductID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ProductCat = $row[0];
// echo $ProductCat;echo "<br>";


// get Discription
$sql = "select Description from product_detail where ProductID = '" . $ProductID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ProductDes = $row[0];
// echo $ProductDes;echo "<br>";

// get Discription
$sql = "select ProductImage from product_detail where ProductID = '" . $ProductID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$ProductImg = $row[0];
// echo $ProductImg;echo "<br>";


?>





<title>Product edit</title>
    <h1>Product Edit</h1>
    <form action="" method="POST">
            <h3 style="position:relative;top:50px;left:100px">Product Name : </h3>
            <div style="position:relative;top:50px;left:100px">
                <input type="text" name="n_productname" placeholder="<?php echo $ProductName?>"> &nbsp;
                <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
                <br>
                <input type="submit" name="update" value="Change Product Name">
            </div>
            <br>


            <h3 style="position:relative;top:100px;left:100px">Product Price : </h3>
            <div style="position:relative;top:100px;left:100px">
                <input type="text" name="n_productprice" placeholder="<?php echo $ProductPri ?>" style="position:relative;top:20px;height:40px "> &nbsp;
                <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
                <br>
                <input type="submit" name="update1" value="Change Product Price" style="position:relative;top:40px;">
            </div>
            <br>

            <h3 style="position:relative;top:200px;left:100px">Category : </h3>
            <div style="position:relative;top:200px;left:100px">
                <input type="text" name="n_category" placeholder="<?php echo $ProductCat ?>">&nbsp;
                <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
                <br>
                <input type="submit" name="update2" value="Change Category">
            </div>
            <br>
        <div style="position:relative;top:-670px;left:400px">
            <h3 style="position:relative;top:250px;left:100px">Description : </h3>
            <div style="position:relative;top:250px;left:100px">
                <br>
                <textarea id="" cols="30" rows="10" name="description" placeholder="<?php echo $ProductDes ?>" style="width:550px"></textarea>
                <br><br>
                <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
                <input type="submit" name="update3" value="Change Description">
            </div>
            <br>
        </div>
        </form>
        <div style="position:relative;top:-400px;left:500px">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="Productimg"><h3>Upload Product Picture</h3></label><br>
            <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
            <input type="file" name="file" id="file_1">
            <button type="submit" name="submit" style="width:200px;height:70px;position:relative;top:-30px">Confirm and Submit Picture</button>
        </form>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="Productimg"><h3>Upload Product Picture 2</h3></label><br>
            <input type="hidden" name="ProductID" value="<?php echo $ProductID?>">
            <input type="file" name="file2" id="file_2">
            <button type="submit" name="submit2" style="width:200px;height:70px;position:relative;top:-30px">Confirm and Submit Picture 2</button>
        </form>
        </div>
    



<?php



// When click update button
if(isset($_POST['update'])){
    $nproductname = $_POST['n_productname'];
    if(empty($_POST['n_productname'])){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql = "update product_detail SET `Name` = '".$nproductname."' where `ProductID` = '".$ProductID."';";
        if ($query_run = mysqli_query($conn, $sql)){;
        echo '<script type="text/javascript">alert("Product Name Updated");window.location = "Modify_Product.php"</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Product Name Not Updated")</script>';
        }
    }
    
}




if(isset($_POST['update1'])){
    $ProductPri = $_POST['n_productprice'];
    if($ProductPri == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql2 = "update product_detail set `Price` = $ProductPri where `ProductID`= $ProductID ;";
        $query_run = mysqli_query($conn, $sql2);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Data Updated");window.location = "Modify_Product.php"</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Data Not Updated")</script>';
        }
    }
}

if(isset($_POST['update2'])){
    $ProductCat = $_POST['n_category'];
    if($ProductCat == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql3 = "update product_detail set Category = '".$ProductCat."' where ProductID = '".$ProductID."'";
        $query_run = mysqli_query($conn, $sql3);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Data Updated");window.location = "Modify_Product.php"</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Data Not Updated")</script>';
        }
    }
}

if(isset($_POST['update3'])){
    $ProductDes = $_POST['description'];
    if($ProductDes == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql4 = "update product_detail set Description = '".$ProductDes."' where ProductID = '".$ProductID."'";
        $query_run = mysqli_query($conn, $sql4);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Data Updated");window.location = "Modify_Product.php"</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Data Not Updated")</script>';
        }
    }
}



//Picture
if(isset($_POST['submit'])){
    //$_FILES global variable, an array store multiple data
    $file = $_FILES['file'];


    // get file name
    $fileName = $_FILES['file']['name'];
    // temporary location of the file
    $fileTmpName = $_FILES['file']['tmp_name'];
    // get file size
    $fileSize = $_FILES['file']['size'];
    // get upload error (0=no e)
    $fileError = $_FILES['file']['error'];
    // get file type
    $fileType = $_FILES['file']['type'];


    // get extension of file (filetype)
    $fileExt = explode('.', $fileName);
    // lowering case for extension
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualExt, $allowed)){
        //check if got error
        if($fileError === 0){
            if($fileSize < 50000000){ //500 mb
                // timeformat in microseconds, unique name
                $fileNameNew = uniqid('',true).".".$fileActualExt;

                // location of file need to be uploaded
                $fileDestination = 'productimage/'.$fileNameNew;
                
                // echo $fileDestination;
                // move from temp location to actual
                move_uploaded_file($fileTmpName, $fileDestination);


                // get image location
                $nproimg = $fileDestination;

                // // insert into db
                // $sql = 'insert into product_detail (ProductID, Name, Price, Category, ProductImage, Description)
                // values ("'.$nproid.'","'.$nname.'","'.$nprice.'","'.$ncategory.'","'.$nproimg.'","'.$ndescription.'")';
                // mysqli_query($conn,$sql);

                $sql5 = "update product_detail set ProductImage = '".$nproimg."' where ProductID = '".$ProductID."'";
                mysqli_query($conn, $sql5);

                echo '<script>alert("Your Product Image 1 is Successfully Uploaded!");window.location = "Modify_Product.php"</script>';
            }
            else{
                echo '<script>alert("Your file is bigger than 50mb!")</script>';
            }
        }
        else{
            echo '<script>alert("There was an error uploading your file!")</script>';
        }
    }
    else{
        echo '<script>alert("You can only upload file of jpg, jpeg, and png!")</script>';

    }
}


if(isset($_POST['submit2'])){
    //$_FILES global variable, an array store multiple data
    $file = $_FILES['file2'];


    // get file name
    $fileName = $_FILES['file2']['name'];
    // temporary location of the file
    $fileTmpName = $_FILES['file2']['tmp_name'];
    // get file size
    $fileSize = $_FILES['file2']['size'];
    // get upload error (0=no e)
    $fileError = $_FILES['file2']['error'];
    // get file type
    $fileType = $_FILES['file2']['type'];


    // get extension of file (filetype)
    $fileExt = explode('.', $fileName);
    // lowering case for extension
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualExt, $allowed)){
        //check if got error
        if($fileError === 0){
            if($fileSize < 50000000){ //500 mb
                // timeformat in microseconds, unique name
                $fileNameNew = uniqid('',true).".".$fileActualExt;

                // location of file need to be uploaded
                $fileDestination = 'productimage/'.$fileNameNew;
                
                // echo $fileDestination;
                // move from temp location to actual
                move_uploaded_file($fileTmpName, $fileDestination);


                // get image location
                $nproimg = $fileDestination;

                // // insert into db
                // $sql = 'insert into product_detail (ProductID, Name, Price, Category, ProductImage, Description)
                // values ("'.$nproid.'","'.$nname.'","'.$nprice.'","'.$ncategory.'","'.$nproimg.'","'.$ndescription.'")';
                // mysqli_query($conn,$sql);
                $sql6 = "update product_detail set ProductImage2 = '".$nproimg."' where ProductID = '".$ProductID."'";
                mysqli_query($conn, $sql6);

                echo '<script>alert("Your Product Image 2 is Successfully Uploaded!");window.location = "Modify_Product.php"</script>';
            }
            else{
                echo '<script>alert("Your file is bigger than 50mb!")</script>';
            }
        }
        else{
            echo '<script>alert("There was an error uploading your file!")</script>';
        }
    }
    else{
        echo '<script>alert("You can only upload file of jpg, jpeg, and png!")</script>';

    }
}




?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
<div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:180px;height:0px;position:relative;left:0px;">
    <div style="width:450px;text-align:center;">
</div>
<?php
include_once 'footer.php'
?>