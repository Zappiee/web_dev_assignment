<?php
  include_once 'header.php';
?>
  <title>Product Rating</title>
  <style>
    *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:70px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
</head>
<?php
include_once 'database_handle.php';
?>
<!-- display the product infor with the stars below -->
<?php
if (isset($_POST['giverating'])) {
  if(isset($_SESSION['id'])){
  $userID = $_SESSION['id'];
  $ProductID = $_POST['ProductID'];
  }
}// try now

if(isset($_POST['submit'])){
    
    $ProductID = $_POST['ProductID'];
    $UserID = $_POST['UserID'];
    $rate = $_POST["rate"];


        //add to total rating
        $tsql = "SELECT TotalRating FROM product_detail where ProductID = $ProductID";
        $total = mysqli_query($conn,$tsql);
        $row = mysqli_fetch_array($total);




        $total1 = $row['TotalRating'];
        $total2 = $total1 + $rate;
        

        //add to num of rating
        $nsql = "SELECT num_of_rating AS num FROM product_detail where ProductID = $ProductID;";
        $num = mysqli_query($conn,$nsql);
        $row = mysqli_fetch_array($num);
        $num1 = $row['num'];
        $num2 = $num1 + 1;


        $isql = "UPDATE product_detail SET TotalRating = '".$total2."', num_of_rating = '".$num2."' where ProductID = '".$ProductID."';";
        mysqli_query($conn,$isql);


        
        $delete = "DELETE FROM cart WHERE ProductID = $ProductID and payment = 'yes' and UserID = $UserID;";
        if(mysqli_query($conn, $delete)){
            echo '<script> alert("Thank You for providing us with your rating. You will be redirected back to the user page");</script>';
            echo '<script> window.location.href = "userprofile.php"</script>';
        }
      }

?>
<?php


$query = "SELECT * FROM product_detail where ProductID = $ProductID";
$query_run = mysqli_query($conn,$query);
$row=mysqli_fetch_array($query_run);
?>

<div style="margin: 0 auto;width: 1200px; overflow-x: hidden; overflow-y: hidden;">
  <h1>Product Rating</h1>
  <br>
  <img src="<?php echo $row['ProductImage']?>" style="width:300px;height:300px">
  <?php echo "<h2 style='font-size:60px;position:relative;left:350px;top:-300px;width:800px'>" . $row['Name'] . "</h3>"?>
  <h3 style="position:relative;top:-280px;left:500px">please provide us with your rating on your purchased product</h3>
  <body>
  
  
    <form method="post">
      <div class="rate" style="position:relative;left:570px;top:-250px;">
        <input type="radio" id="star5" name="rate" value="5">
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4">
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3">
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2">
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1">
        <label for="star1" title="text">1 star</label>
      </div>
      <input type="submit" name="submit" style="position:relative;top:-150px;left:230px;width:300px;height:100px;background-color:yellow">
      <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']?>">
      <input type="hidden" name="UserID" value="<?php echo $userID?>">
    </form>
  </body>
  <br><br><br>
  <?php 
          $query = "SELECT * FROM product_detail where ProductID = $ProductID";
          $query_run = mysqli_query($conn,$query);
          $row=mysqli_fetch_array($query_run);
  ?>
  <div style="position:relative;top:-150px;left:200px;width:800px">
    <h5 style="font-size:28px">Product Details</h5>
    <hr style="height:2px;border:none;color:#333;background-color:#333;width:800px" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <div style="font-size:20px;font-family: 'Nunito', sans-serif;padding-top:5px;">
    <h5 style="padding-top:10px;font-weight:bold;">Pricing: RM <?php echo $row['Price']?> </h5>
    <h5 style="padding-top:10px;font-weight:bold;">Product Category: <?php echo $row['Category']?> </h5>
    <h5 style="padding-top:10px;font-weight:bold;">Total value of Rating: <?php echo $row['TotalRating']?> </h5>
    <h5 style="padding-top:10px;font-weight:bold;">Number of Rating: <?php echo $row['num_of_rating']?> </h5>
    <h5 style="padding-top:10px;font-weight:bold;">Product Description: <?php echo $row['Description']?> </h5>
  </div>
</div>

<?php
  include_once 'footer.php'
?>