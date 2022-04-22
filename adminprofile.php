<?php

    
    include_once 'header.php';
    require_once 'database_handle.php';

    // get userid from session
    if(isset($_SESSION['id'])){
        $userID = $_SESSION['id'];
        if($userID != 1){
            echo '<script>alert("You are not an Admin!");window.location = "index.php"</script>;';
        }
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


    //initialise

    //count total user
    $num_of_User = 0;
    $userCount = 0;

    $id_List = [];

    // loop until max user
    $x = 1;


    // for button check userdetail
    $button = 'check';
    $y = 1;
    $nbutton = $button . (string)$y;


    // Get total Number Of user
    // get id list
    $sql = "select ID from customer_detail;";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $row) {
        $num_of_User = $num_of_User + 1;
        foreach ($row as $id)
            // echo $id;
            // echo "<br>";
            array_push($id_List, $id);
    }
?>

<script>
    var username = '<?php $username ?>';
</script>

<title>Admin Profile</title>
    <!-- Profile -->
<!-- when click into profile on header then direct to this page -->
<script>document.write(username)</script>
<h1 id="h1positioning" style="width:1200px">
    <li id="navbar" style="text-align:left;">
        <i class="fa fa-bars"></i>
        <h5>admin functions</h5>
        <!-- navbar to lead to functions -->
        <ul>
            <li><a href="Add_Product.php" id="categorytext">Add a New Product</a></li>
            <li><a href="Modify_Product.php" id="categorytext">Update or Remove a Product</a></li>
            <li><a href="delete_unused_pictures.php" id="categorytext">Remove Unused Pictures</a></li>
            <li><a href="#displayusers" id="categorytext">Display all active users</a></li>
        </ul>
    </li>
</h1>
<h1>Welcome Admin</h1>
<div style="margin: 0 auto;width: 800px;position:relative; top:50px;">
    <div style="background-color:#DCDCDC; border-radius:25px; height:200px; width:200px; text-align:center; display: flex; flex-direction: column; justify-content: center;">
        <i class="fa fa-user" aria-hidden="true" style="font-size:200px;"></i>
    </div>    
</div>
<div class="col-md-4" style="width:500px;margin: -250px 150px;;float:right;">
    <br>
    <br>
    <br>
    <h5 style="font-size:28px">Admin Profile Details</h5>
    <hr style="height:2px;border:none;color:#333;background-color:#333;" />
    <h5 class="text-center" style="width:250px;font-size:30px;font-family: 'Ubuntu', sans-serif;position:relative;top:455%;"> <?php echo $username ?> </h5>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <div style="font-size:22px;font-family: 'Nunito', sans-serif;padding-top:5px;">
    <h5 class="text-center" style="padding-top:10px;"><i class="fas fa-venus-mars" style="color:red;font-size:24px"></i> Gender :<?php echo $gender; ?></h5>
        <h5 class="text-center" style="padding-top:10px;"><i class="fas fa-birthday-cake" style="color:red;font-size:24px"></i> Date of Birth : <?php echo $dob?></h5>
        <h5 style="padding-top:10px;"><i class="far fa-envelope-open" style="color:red;font-size:24px"></i> Email : <?php echo $email?></h5>
        <h5 style="padding-top:10px;"><i class="fas fa-phone" style="color:red;font-size:24px"></i> Phone Number : <?php echo $phoneNumber; ?> </h5>
        <h5 style="padding-top:10px;"><i class="fas fa-map-marker-alt" style="color:red;font-size:24px"></i> Address: <?php echo $homeAddress; ?> </h5>
    </div>
    <br>
    <br>
    <br>


</div>

    <!-- <form class="searchuser" method="post" action="view_Search User.php">
        <input type="text" placeholder="Search a Specific Username" name="searchusername" value="<?php echo $searchresult ?>">
        <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
    </form> -->
<br>
<br>
<style>
    * {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  border-left: 4px solid black;
  border-right: 4px solid black;
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
  border-collapse: collapse;
  
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 3px solid black;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>
<div id="displayusers" style="padding-top:300px; width:1000px; margin: 0 auto;width: 900px;">
    <h5 style="font-size:28px;"> All Active Users</h5>     
    <hr style="height:2px;border:none;color:#333;background-color:#333;" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <h5 class="text-center" style="font-size:18px;font-family: 'Raleway', sans-serif;padding-bottom:100px;">All Active User with the account detail will be displayed as below :</h5>
    <div style="position:relative;top:-120px;font-size:18px;font-family: 'Raleway', sans-serif;font-weight:bold">
        <form class="search" method="post" action="view_Search_User.php">
            <input type="text" placeholder="Search a Customer Username to view specific detail" name="searchusername">
            <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
        </form>
        <?php     
        echo "Total Number Of User : " . $num_of_User;
        echo "<br>"; 
        ?>
        <br><br>
        <div style="    margin: 0 auto;width: 800px;    overflow:scroll;height:500px;overflow-x: hidden;">
            <table class="content-table" style="text-align:center;  margin-left: auto;margin-right: auto;">
                <tr style="background-color:pink">
                    <td>
                        ID
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Gender
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Phone Number
                    </td>
                </tr>
                <tr>
                    <?php
                    while ($x <= $num_of_User) {
                        $sqli = "select * from customer_detail where ID = '" . $x . "';";
                        $result = mysqli_query($conn, $sqli);
                        $row = mysqli_fetch_array($result);

                        echo "<tr class='active-row' style='background-color:white'>";
                            echo "<td>"; echo $row['ID']; echo "</td>";
                            echo "<td>"; echo $row['Username']; echo "</td>";
                            echo "<td>"; echo $row['Gender']; echo "</td>";

                            echo "<td>"; echo $row['Email']; echo "</td>";
                        
                            echo "<td>"; echo $row['PhoneNumber']; echo "</td>";
                        echo "<tr>";
                        
                        // if (isset($_POST[$nbutton])){
                        //     $checkname = $_POST['Username'];
                        //     $url = 'view_Detail.php';
                        //     // header('Location: ' . $url);
            
                        //     echo $checkname;
                        $x += 1;
                        $y += 1;
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>



</div>
<!-- if click this will redirect to new page for the specific functions -->
<!-- show list of members but only id username then got view details button when click will popup and show full detail-->
<!-- https://www.youtube.com/watch?v=KnIHLaxnNJ4 -->


<?php
    include_once 'footer.php';
?>