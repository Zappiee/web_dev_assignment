<?php
include_once 'header.php';
include_once 'database_handle.php';

// get userid from session
if(isset($_SESSION['id'])){
    $userID = $_SESSION['id'];
}
else{
    echo "<script>alert('You are not logged in!');window.location = 'index.php';</script>";
}

// get username from database using session id
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

// get phonenumber
$sql = "select PhoneNumber from customer_detail where ID = '" . $userID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$phonenumber = $row[0];
//echo $phonenumber;

// get HomeAddress
$sql = "select HomeAddress from customer_detail where ID = '" . $userID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$homeAddress = $row[0];
//echo $homeAddress;

// get password
$sql = "select Passwords from customer_detail where ID = '" . $userID . "' limit 1;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$password = $row[0];
//echo $password;
?>





<title>Profile edit</title>
    <h1>Profile Edit</h1>
    <form action="" method="POST" enctype="multipart/form-data">
            <h3 style="position:relative;top:50px;left:100px">Username : </h3>
            <div style="position:relative;top:50px;left:100px">
                <input type="text" name="n_username" placeholder="<?php echo $username?>"> &nbsp;
                <br>
                <input type="submit" name="update" value="Change Username">
            </div>
            <br>

            <h3 style="position:relative;top:100px;left:100px">Date of Birth : </h3>
            <div style="position:relative;top:100px;left:100px">
                <input type="date" name="dob" placeholder="<?php echo $dob?>" style="position:relative;top:20px;height:40px "> &nbsp;
                <br>
                <input type="submit" name="update1" value="Change Date of Birth" style="position:relative;top:40px;">
            </div>
            <br>

            <h3 style="position:relative;top:200px;left:100px">Gender : </h3>
            <div style="position:relative;top:200px;left:100px;font-size:20px">
            <br>    
                <input type="radio" name="gender" value="male" style="transform:scale(1.5);">&nbsp;Male
                <br>
                <input type="radio" name="gender" value="female" style="transform:scale(1.5);">&nbsp;Female
                <br>
                <br>
                <input type="submit" name="update2" value="Change Gender">
            </div>
            <br>

            <h3 style="position:relative;top:250px;left:100px">Email : </h3>
            <div style="position:relative;top:250px;left:100px">
                <input type="text" name="email" placeholder="<?php echo $email?>">&nbsp;
                <br>
                <input type="submit" name="update3" value="Change Email">
            </div>
            <br>

            <h3 style="position:relative;top:-520px;left:600px">Phone Number : </h3>
            <div style="position:relative;top:-520px;left:600px">
                <input type="text" name="phonenumber" placeholder="<?php echo $phonenumber?>">&nbsp;
                <br>
                <input type="submit" name="update4" value="Change Phone Number">
            </div>
            <br>

            <h3 style="position:relative;top:-470px;left:600px">Address : </h3>
            <div style="position:relative;top:-480px;left:600px">
                <input type="text" name="address" placeholder="<?php echo $homeAddress?>">&nbsp;
                <br>
                <input type="submit" name="update5" value="Change Home Address">
            </div>
            <br>

            <h3 style="position:relative;top:-425px;left:600px">Password : </h3>
            <div style="position:relative;top:-430px;left:600px">
                <input type="text" name="password" placeholder="<?php echo $password?>">&nbsp;
                <br>
                <input type="submit" name="update6" value="Change Password">
                <div style="position:relative;top:70px;left:0px">
                <label for="Profileimg"><h3>Upload Profile Picture</h3></label><br>
                <input type="file" name="file">
                <input type="hidden" name="ProductID" value="<?php echo $ID?>">
                <button type="submit" name="submitphoto" style="width:200px;height:70px;position:relative;top:-30px">Confirm and Submit Picture</button>
                </div>
            </div>
        </div>
    </form>








<?php


// When click update button
if(isset($_POST['update'])){
    $nusername = $_POST['n_username'];
    if(empty($nusername)){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        // get list of username
        $userList = [];
        $sql = "select Username from customer_detail;";
        $result = mysqli_query($conn, $sql);
        foreach($result as $row){
            array_push($userList, $row['Username']);
        }
        //check if name repeats
        $sameusername = false;
        foreach($userList as $Existuser){
            if($nusername == $Existuser){
                $sameusername = true;
            }
        }
        // action of username check result
        if($sameusername == false){
            // actual update the username
            $sql1 = "update customer_detail set username = '".$nusername."'where ID = '".$userID."';";   
            $query_run = mysqli_query($conn, $sql1);
            if($query_run){
                echo '<script type="text/javascript">alert("Username Updated")</script>';
            }
            else{
                echo '<script type="text/javascript">alert("Username Not Updated")</script>';
            }
        }elseif($sameusername == true){
            echo '<script type="text/javascript">alert("Username taken! Please enter another username!")</script>';
        }

    }
}

if(isset($_POST['update1'])){
    $ndob = $_POST['dob'];
    if($ndob == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql2 = "update customer_detail set DOB = '".$ndob."'where ID = '".$userID."';"; 
        $query_run = mysqli_query($conn, $sql2);
        
        if($query_run){
            echo '<script type="text/javascript">alert("DOB Updated")</script>';
        }
        else{
            echo '<script type="text/javascript">alert("DOB Not Updated")</script>';
        }
    }
}

if(isset($_POST['update2'])){
    $ngender = $_POST['gender'];
    if($ngender == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql3 = "update customer_detail set Gender = '".$ngender."'where ID = '".$userID."';";
        $query_run = mysqli_query($conn, $sql3);

        if($query_run){
            echo '<script type="text/javascript">alert("Data Updated")</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Data Not Updated")</script>';
        }
    }
} 

if(isset($_POST['update3'])){
    $nemail = $_POST['email'];
    if($nemail == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sql4 = "update customer_detail set Email = '".$nemail."'where ID = '".$userID."';";
        $query_run = mysqli_query($conn, $sql4);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Email Updated")</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Email Not Updated")</script>';
        }
    }
}

if(isset($_POST['update4'])){
    $nphonenum = $_POST['phonenumber'];
    if($nphonenum == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sqln = "update customer_detail set PhoneNumber = '".$nphonenum."'where ID = '".$userID."';";
        $query_run = mysqli_query($conn, $sqln);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Phone Number Updated")</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Phone Number Not Updated")</script>';
        }
    }
}

if(isset($_POST['update5'])){
    $nhomeadd = $_POST['address'];
    if($nhomeadd ==''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        $sqln = "update customer_detail set HomeAddress = '".$nhomeadd."'where ID = '".$userID."';";
        $query_run = mysqli_query($conn, $sqln);
        
        if($query_run){
            echo '<script type="text/javascript">alert("Address Updated")</script>';
        }
        else{
            echo '<script type="text/javascript">alert("Address Not Updated")</script>';
        }
    }
}


if(isset($_POST['update6'])){
    $npassword = $_POST['password'];
    if($npassword == ''){
        echo '<script>alert("You left the column blank!")</script>';
    }
    else{
        if(strlen($npassword <= 6)){
            echo '<script type="text/javascript">alert("Password Length needs to be 6 and above")</script>';
        }else{
            $sqln = "update customer_detail set Passwords = '".$npassword."'where ID = '".$userID."';";
            $query_run = mysqli_query($conn, $sqln);
            
            if($query_run){
                echo '<script type="text/javascript">alert("Password Successfully Updated")</script>';
            }
            else{
                echo '<script type="text/javascript">alert("Password Not Updated")</script>';
            }
        }
    }
}




//modify profile pic
if(isset($_POST['submitphoto'])){
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
                $fileDestination = 'profileimage/'.$fileNameNew;
                
                // echo $fileDestination;
                // move from temp location to actual
                move_uploaded_file($fileTmpName, $fileDestination);



                // get image location
                $nprofileimg = $fileDestination;

                // // insert into db
                // $sql = 'insert into product_detail (ProductID, Name, Price, Category, ProductImage, Description)
                // values ("'.$nproid.'","'.$nname.'","'.$nprice.'","'.$ncategory.'","'.$nproimg.'","'.$ndescription.'")';
                // mysqli_query($conn,$sql);

                $sql5 = "update customer_detail set UserProfile = '".$nprofileimg."' where ID = '".$userID."'";
                mysqli_query($conn, $sql5);

                echo '<script>alert("Your Profile Image is Successfully Uploaded!");window.location = "editprofile.php"</script>';
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

// ------------------ done i think, you can try, i continue the doc first


?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
<div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:195px;height:0px;position:relative;left:150px;">
    <div style="width:450px;text-align:center;">
</div>
<?php
include_once 'footer.php'
?>