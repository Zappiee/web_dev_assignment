<?php


include_once 'header.php';

$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);



// when login button pressed
if(isset($_POST['passlog'])){

    //get entered username
    $username = $_POST['username'];
    $passEntered = $_POST['password'];

    // Get password using username and verify if exist
    $sql = 'SELECT Passwords from customer_detail where Username = "'.$username.'";';
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){  
        $row = mysqli_fetch_array($result);
        foreach($row as $data){
            $truepass = $data;
        }
    
        if($truepass == $passEntered){
            // if($username != 'Admin'){
            //     header('Location: adminprofile.php');
            // }
            // else{
            // header('Location: userprofile.php');
            // }
        
            //Get user ID using username
            $sql = 'SELECT ID from customer_detail where Username = "'.$username.'";';
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            foreach($row as $data){
            $userID = $data;
            }

            //save entered username's ID as session varaible
            $_SESSION['id'] = $userID;

            
        }
        else{
            echo "<script>alert('Invalid Username or Password Entered!')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Username or Password Entered!')</script>";
    }

}

if(isset($userID)){
    if($userID == 1){
        echo "<script>alert('Welcome Admin');window.location = 'adminprofile.php';</script>";
    }
    else{
        echo "<script>alert('Welcome User');window.location = 'userprofile.php';</script>";
    }
}



?>



<title>Login To Pet Shop</title>

<form action="" method="POST">
    <h1>Login</h1>
    <div id="tableregister" style="position:relative;top:150px;left:100px">
        <label for="loginname">Username: </label>
        <input type="text" name='username' method="POST"><br><br>
        <label for="loginpass">Password: </label>
        <input type="password" name='password' method='POST'><br><br>
        <input type="Submit" name='passlog' value= "Login" style="height:50px; width:400px">
        <br><br>
        <a href="register.php">No account? Click here to register with us!</a>
    </div>
</form>
<img src="images/Dog_SignUp.jpg" style="position:relative;left:700px;top:-270px;width:320px;">


<?php
include_once 'footer.php'
?>