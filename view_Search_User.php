<?php
include_once 'header.php';
include_once 'database_handle.php'
?>

<?php
if(isset($_POST["submitsearch"])){
    $searchresult = $_POST["searchusername"];
    $searchresult = mysqli_real_escape_string($conn,$_POST['searchusername']);
    $sql = "SELECT * FROM customer_detail WHERE Username LIKE '%$searchresult%'";
    $finalresult = mysqli_query($conn,$sql);
    $queryresult = mysqli_num_rows($finalresult);
}
else{
    echo '<script>alert("Please Access This Page From Admin Profile Search Bar!");window.location = "adminprofile.php"</script>';
}
?>
<h1>User Search Result</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<form class="search" method="post" action="view_Search_User.php">
    <input type="text" placeholder="Search a Customer Username to view specific detail" name="searchusername" value="<?php echo $searchresult ?>">
    <button type="submit"name="submitsearch"><i class="fa fa-search"></i></button>
</form>
<?php
    echo "There are " . $queryresult . " result(s) found from your search result" . " '$searchresult'";
    if($queryresult>0){
        echo'
            <script>
                alert("User found!");
            </script>
        ';
        while($row=mysqli_fetch_assoc($finalresult)){?>
            <div style="display: block;margin-left: auto;margin-right: auto;width: 80%;position:relative;left:0px">
                <div class="col-md-12">
                    <div class="card mt-5"style="background-color:pink;position:relative; top:8px;height:300px">
                        <div class="card-body">
                            <div style="background-color:#DCDCDC; border-radius:25px; height:250px; width:250px; text-align:center; display: flex; flex-direction: column; justify-content: center;">
                                <i class="fa fa-user" aria-hidden="true" style="font-size:250px;"></i>
                            </div>
                            <div class="card-title" style="position:relative;left:330px;top:-250px;width:580px">
                                <h4>
                                    <?php echo $row['Username']?>
                                </h4>
                                <div style="font-family: 'Nunito', sans-serif;font-weight:bold;font-size:22px">
                                    <?php echo "UserID :  ". $row['ID']?>
                                    <br>
                                    <?php echo "Date Of Birth : ". $row['DOB']?>
                                    <br>
                                    <?php echo "Gender : ". $row['Gender']?>
                                    <br>
                                    <?php echo "Phone Number : ". $row['PhoneNumber']?>
                                    <br>
                                    <?php echo "Email : ". $row['Email']?>
                                    <br>
                                    <?php echo "HomeAddress : ". $row['HomeAddress']?>
                                    <br>
                                    <?php echo "Password : ". $row['Passwords']?>
                                    <br>
                                </div>
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
?>


<?php
    include_once 'footer.php';
?>