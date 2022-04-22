<?php

include_once 'header.php';

$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);



?>

<h1 style="text-align:center;background-color:#ffcc00;">Register</h1>

<img src="images/Dog_SignUp.jpg" style="position:relative;left:700px;top:90px;width:450px;">
<div class="registerleft">
    <form action="" method="post">
        <table id="tableregister" cellpadding="-10000000000">
            <tr id="trregister">
                <td>Username : </td>
                <td><input type="text" name="username" method="POST" placeholder="Username"></td>
            </tr>

            <tr>
                <td>Date of Birth : </td>
                <td><input type="date" name="dob" method="POST"></td>
            </tr>

            <tr>
                <td>Gender :</td>
                <td><input type="radio" name="gender" value="male" checked="checked" method="POST">Male<td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="gender" value="female" method="POST">Female<td>
            </tr>

            <tr>
                <td>E-mail : </td>
                <td><input type="text" name="email" method="POST" placeholder="Email"></td>
            </tr>
            <tr>
                <td>Phone Number : </td>
                <td><input type="tel" name="phonenum" method="POST" placeholder="Phone Number"></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><textarea rows="10" name="address" method="POST" style="width:400px">Address</textarea></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" method="POST" placeholder="Password"></td>
            </tr>

            <tr>
                <td>Confirm Password: </td>
                <td><input type="password" name="con_password" method="POST" placeholder="Confirm Password"></td>
            </tr>
            </table><br>
        <input type="checkbox" name="agree" method="POST"> Acceptance of terms & conditions <br><br>
        <input type="submit" name="submit" value="Create Account" style="height:50px; width:400px" /><br><br>
    </form>

<?php



//initialise

// Conditions (all input)
$reg_valid_name = 0;
$reg_valid_dob = 0;
$reg_valid_email = 0;
$reg_valid_gender = 0;
$reg_valid_address = 0;
$reg_valid_phone_number = 0;
$reg_valid_password = 0;
$reg_valid_confirm_pass = 0;
$reg_valid_terms = 0;

$userList = [];
// get list of user
$sql = "select Username from customer_detail;";
$result = mysqli_query($conn, $sql);
foreach($result as $row){
    array_push($userList, $row['Username']);
}
$emailList = [];
// get list of email
$sql = "select Email from customer_detail;";
$result = mysqli_query($conn, $sql);
foreach($result as $row){
    array_push($emailList, $row['Email']);
}



// check same username / email
$sameusername = false;
$same_email = false;

if(isset($_POST['submit'])){

    // username
    if($_POST['username'] == ''){
        echo "<script type='text/javascript'>alert('You left username blank!')</script>";echo"<br>";
    }
    else{
        // check username exist
        $username = $_POST['username'];
        foreach($userList as $Existuser){
            if($username == $Existuser){
                $sameusername = true;
                echo "<script type='text/javascript'>alert('Username Exist! Please use another username!')</script>";echo"<br>";
            }
        }
        if($sameusername == false){
            if(!preg_match("/^[a-zA-Z0-9 ]*$/",$username)){
                echo "<script type='text/javascript'>alert('You can only use a-Z or 0-9 as username characters!')</script>";
            }
            else{
                $reg_valid_name = 1;
            }
        }
    }

    // Date of birth
    if($_POST['dob'] == ''){
        echo "<script type='text/javascript'>alert('You left dob blank')</script>";
    }
    else{
        $dob = $_POST['dob'];
        $reg_valid_dob = 1;
    }

    // Email
    if($_POST['email'] == ''){
        echo "<script type='text/javascript'>alert('You left email blank')</script>";
    }
    else{
        // check email exist
        $email = $_POST['email'];
        foreach($emailList as $Existemail){
            if($email == $Existemail){
                $same_email = true;
                echo "<script type='text/javascript'>alert('Email exist! Please use another email!')</script>";
            }
        }
        if($same_email == false){
            $reg_valid_email = 1;
        }
    }

    // Gender
    if($_POST['gender'] == ''){
        echo "<script type='text/javascript'>alert('You left gender blank')</script>";
    }
    else{
        $gender = $_POST['gender'];
        $reg_valid_gender = 1;
    }
   
    // Address
    if($_POST['address'] == ''){
        echo "<script type='text/javascript'>alert('You left address blank')</script>";
    }
    else{
        $address = $_POST['address'];
        $reg_valid_address = 1;
    }

    // Phonenum
    if($_POST['phonenum'] == ''){
        echo "<script type='text/javascript'>alert('You left phone number blank')</script>";
    }
    else{
        $phone_number = $_POST['phonenum'];
        $reg_valid_phone_number = 1;
    }

    // Password
    if($_POST['password'] == ''){
        echo "<script type='text/javascript'>alert('You left password blank')</script>";
    }
    else{
        if(strlen($_POST['password'] < 6)){
            echo "<script type='text/javascript'>alert('Password must be 6 character or above')</script>";

        }
        else{
            $password = $_POST['password'];
            $reg_valid_password = 1;

            // Confirm password
            if($_POST['con_password'] == ''){
                echo "<script type='text/javascript'>alert('You left confirm password blank')</script>";
            }
            else{
                $con_password = $_POST['con_password'];

                // check password and confirm password
                if($password != $con_password){
                    echo "<script type='text/javascript'>alert('Password does not match!')</script>";
                }
                else{
                    $reg_valid_confirm_pass = 1;
                }

            }
        }
    }

    // Agree terms & condition
    if(!empty($_POST['agree'])){
        $reg_valid_terms = 1;
    }
    else{
        echo '<script type="text/javascript">alert("You need to agree terms & condition to create account!")</script>';
    }


    // check if all condition valid
    $reg_valid = $reg_valid_name * $reg_valid_dob * $reg_valid_email * $reg_valid_gender * $reg_valid_address * $reg_valid_phone_number * $reg_valid_password * $reg_valid_confirm_pass *  $reg_valid_terms;

    $profileimage = 'profileimage/defaultprofile.jpg';

    // Save in DB when all valid
    if($reg_valid == 1){
        //echo "No error found";echo"<br>";

        // get new id
        $sql = 'SELECT `ID` FROM `customer_detail` ORDER BY `ID` DESC LIMIT 1;';
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        foreach($row as $data){
            //echo $data;
            $nid = $data + 1;
        }

        $sql = 'insert into customer_detail (ID, Username, UserProfile, DOB, Gender, Email, PhoneNumber, HomeAddress, Passwords)
                values ("'.$nid.'","'.$username.'","'.$profileimage.'", "'.$dob.'","'.$gender.'","'.$email.'","'.$phone_number.'","'.$address.'","'.$password.'");';
        mysqli_query($conn,$sql);

        echo '<script>alert("Register Successfully!");window.location = "Login.php"</script>';
    }
    else{
        echo "<script>alert(Please Fill in details properly!)</script>";
    }
}


?>

<?php
    include_once 'footer.php';
?>