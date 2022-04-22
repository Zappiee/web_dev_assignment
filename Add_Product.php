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

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} else {
}



$name_valid = 0;
$price_valid = 0;
$category_valid = 0;
$description_valid = 0;


if(isset($_POST['submit'])){
    $nname = $_POST['ProName'];
    if($nname == ''){
        echo '<script>alert("Please fill in Product Name!")</script>';
    }
    else{
        $name_valid = 1;
    }

    // get new product price
    $nprice = $_POST['Price'];
    if($nprice == ''){
        echo '<script>alert("Please fill in Product Price")</script>';
    }
    else{
        $price_valid = 1;
    }

    //get new product category
    $ncategory = $_POST['Category'];
    if($ncategory == ''){
        echo '<script>alert("Please fill in Product Category!")</script>';
    }
    else{
        $category_valid = 1;
    }

    // get new product description
    $ndescription = $_POST['Description'];
    if($ndescription == ''){
        echo '<script>alert("Please fill in Product Description!")</script>';
    }
    else{
        $description_valid = 1;
    }



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


                // sql save all database
                // get new id
                $sql = 'SELECT `ProductID` FROM `product_detail` ORDER BY `ProductID` DESC LIMIT 1;';
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                foreach($row as $data){
                    //echo $data;
                    $nproid = $data + 1;
                }

                // get image location
                $nproimg = $fileDestination;

                // check everything filled in
                $add_valid = $name_valid * $price_valid * $category_valid * $description_valid;
                if($add_valid == 1){
                    // insert into db
                    $sql = 'insert into product_detail (ProductID, Name, Price, Category, ProductImage, Description)
                    values ("'.$nproid.'","'.$nname.'","'.$nprice.'","'.$ncategory.'","'.$nproimg.'","'.$ndescription.'")';
                    mysqli_query($conn,$sql);

                    // Notice Success
                    echo '<script>alert("New Product Added Successfully")</script>';
                }
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
        echo '<script>alert("Please upload a file of jpg, jpeg, and png!")</script>';

    }
}

?>


<title>Add Product</title>
<h1>Add New Product</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div style="background-color:pink;height:500px;border-radius:50px;position:relative;top:50px">
        <div style="position:relative;top:100px;left:100px">
            <label for="ProductName"><h3>Enter New Product Name</h3></label>
            <input type="text" name="ProName" placeholder="Product Name"><br>

            <label for="Product"><h3>Enter Price of New Product</h3></label>
            <input type="text" name="Price" placeholder="Product Price"><br>

            <label for="Product"><h3>Enter Category of New Product</h3></label>
            <input type="text" name="Category" placeholder="Product Category"><br>
        </div>
        <div style="position:relative;top:-250px;left:600px">
            <label for="Product"><h3>Enter Description of New Product</h3></label><br>
            <textarea name="Description" id="" cols="30" rows="10" placeholder="Description of new product"> </textarea><br>

            <label for="Productimg"><h3>Upload Product Picture</h3></label><br>
            <input type="file" name="file">
            <br>
            <br>
            <br>
        </div>
    </div>
        <button type="submit" name="submit" style="width:200px;height:70px;position:relative;top:-50px;left:890px"> Confirm and Submit</button>
</form>

<?php
include_once 'footer.php';
?>

<!-- <div style="background-color:pink;height:500px;border-radius:50px;position:relative;top:50px">
<div style="position:relative;top:100px;left:100px">
</div>

<div style="position:relative;top:-250px;left:600px">
</div>
</div> -->