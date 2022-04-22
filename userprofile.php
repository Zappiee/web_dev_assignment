<?php

    
    include_once 'header.php';
    require_once 'database_handle.php';

    // get userid from session
    if(isset($_SESSION['id'])){
        $userID = $_SESSION['id'];
    }
    else{
        echo "<script>alert('You are not logged in!');window.location = 'index.php';</script>";
    }


    // get username from database using sessionid
    $sql = 'SELECT Username from customer_detail where ID = "'.$userID.'";';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    foreach($row as $data){
        $username = $data;
    }

    // get dob
    $sql = "select DOB from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $dob = $row[0];
    //echo $dob;

    // get gender
    $sql = "select Gender from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $gender = $row[0];
    //echo $gender;

    // get email
    $sql = "select Email from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $email = $row[0];
    //echo $email;

    // get password
    $sql = "select Passwords from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $password = $row[0];
    //echo $password;

    // get phone number
    $sql = "select PhoneNumber from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $phoneNumber = $row[0];
    //echo $phoneNumber;

    // get HomeAddress
    $sql = "select HomeAddress from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $homeAddress = $row[0];
    //echo $homeAddress;
 
    //get profile image
    $sql = "select UserProfile from customer_detail where ID = '" . $userID . "' limit 1;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $userprofile = $row[0];
?>

<!-- ------------------------------------------------------------------------------------------------------ -->

<script>var username = '<?php $username ?>';</script>
<title>User Profile</title>
<script>document.write(username)</script>



<h1 id="h1positioning" style="width:1200px">
        <!-- modify profile details and also view cart when modify cart it will lead to cart if modify profile will allow the user to modify -->
</h1>
<!-- allow users to modify profile picture? and also add phone number? -->
<h1 id="h1positioning" style="width:1200px">
    <li id="navbar" style="text-align:left;">
        <i class="fa fa-bars"></i>
        <h5>user functions</h5>
        <!-- navbar to lead to functions -->
        <ul>
            <li><a href="editprofile.php" id="categorytext">Edit Profile</a></li>
            <li><a href="our_product.php" id="categorytext">View Product</a></li>
            <li><a href="cart.php" id="categorytext">View Cart</a></li>
            <li><a href="purchasedproduct.php" id="categorytext">Rate a Product That You Pruchased</a></li>
        </ul>
    </li>
</h1>
<h1>Welcome <?php echo $username ?> </h1>


<!-- if database profile img empty then do this  -->
<div style="margin: 0 auto;width: 800px;position:relative; top:50px;left:-80px">
    <img src="<?php echo $userprofile ?>" style="width:250px;height:250px">
        <div style="    float: right;word-break: break-all;">
            <h5 class="text-center" style="width:250px;font-size:30px;font-family: 'Ubuntu', sans-serif;position:absolute;top:305px;left:85px"> <?php echo $username ?> </h5>
        </div>
</div>

<!-- else display the img in database -->

<div class="col-md-4" style="width:400px;position:relative;top:-240px;left:650px">
    <br>
    <br>
    <br>
    <h5 style="font-size:28px">User Profile Details</h5>
    <hr style="height:2px;border:none;color:#333;background-color:#333;" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <div style="font-size:22px;font-family: 'Nunito', sans-serif;padding-top:5px;">
        <h5 class="text-center" style="padding-top:10px;"><i class="fas fa-venus-mars" style="color:red;font-size:24px"></i> Gender :<?php echo $gender ?> </h5>
        <h5 class="text-center" style="padding-top:10px;"><i class="fas fa-birthday-cake" style="color:red;font-size:24px"></i> Date of Birth : <?php echo $dob ?> </h5>
        <h5 style="padding-top:10px;"><i class="far fa-envelope-open" style="color:red;font-size:24px"></i> Email : <?php echo $email ?> </h5>
        <h5 style="padding-top:10px;"><i class="fas fa-phone" style="color:red;font-size:24px"></i> Phone Number : <?php echo $phoneNumber; ?> </h5>
        <h5 style="padding-top:10px;"><i class="fas fa-map-marker-alt" style="color:red;font-size:24px"></i> Address: <?php echo $homeAddress; ?> </h5>
    </div>
    <br>
    <br>
    <br>
        <form method="post" action="editprofile.php">

            <i class="fas fa-user-edit" style="margin: auto auto;position:absolute;left: 10px;top:355px;color:gray;font-size:25px"></i>
            <input type="submit" name="editprofile" style="background-color:#ffc107;width:200px;height:70px" value="       Edit Profile Details">
        </form>
</div>
<br>
<br>
<div style="width:1000px; margin: 0 auto; width: 900px;">
            <h5 style="font-size:28px;"> Product in Cart
                <form method="post" action="cart.php">
                <input type="submit" name="editprofile" style="background-color:#ffc107;width:150px;height:50px;margin: -50px 10px;;float:right;" value="   Edit Cart">
                <i class="fas fa-edit" style="margin: auto auto;position:absolute;left: 1060px;top:935px;color:gray;font-size:25px"></i>
            </h5>
            <!-- display cart item if possible then if nothing then say there is currently nothing in ur cart -->
            <!-- insert the table from viewcart.php -->              
            <hr style="height:2px;border:none;color:#333;background-color:#333;" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
            <h5 class="text-center" style="font-size:18px;font-family: 'Raleway', sans-serif;padding-bottom:100px;">display all cart stuff</h5>
            <!-- edit cart button to go to viewcart.php -->
</div>
<?php

require_once 'database_handle.php';
$query = "SELECT * FROM product_detail join cart ON product_detail.ProductID = cart.ProductID where UserID = '$userID' and payment ='no';";
$query_run = mysqli_query($conn,$query);
$check_faculty = mysqli_num_rows($query_run)>0;
if($check_faculty){
  while($row=mysqli_fetch_array($query_run)){?>
    <div style="display: block;margin-left: auto;margin-right: auto;width: 800px;position:relative;left:0px;top:-100px">
                <div class="col-md-12">
                    <div class="card mt-5"style="background-color:pink;position:relative; top:8px;height:300px">
                        <div class="card-body">
                            <img src="<?php echo $row['ProductImage']?>"style="width:300px;height:250px">
                            <div class="card-title" style="position:relative;left:330px;top:-250px;width:580px">
                                <h4 style="font-size:28px">
                                    <?php echo $row['Name']?>
                                </h4>
                                <br>
                                <br>
                                <div style="font-family: 'Nunito', sans-serif;font-weight:bold;">
                                    <?php echo "Price : RM ". $row['Price']?>
                                    <br>
                                    <?php echo "Category : ". $row['Category']?>
                                    <br>
                                    <div style="width:400px">
                                        <?php echo "Product Description : ". $row['Description']?>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<?php
  }
}
include_once 'footer.php';
?>