

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif
}

body {
    min-height: 100vh;
    background-color: #0C4160;
}

.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px
}

p {
    margin: 0px
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto
}

.btn.btn.btn-primary:hover {
    background-position: right center;
    color: #fff;
    text-decoration: none
}

.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none
}

.text {
    font-size: 14px;
    font-weight: 600
}

::placeholder {
    font-size: 14px;
    font-weight: 600
}
    </style>
</head>
<?php
    include_once 'header.php';

    if(isset($_SESSION['id'])){
        $UserID = $_SESSION['id'];
    }
    else{
        echo "<script>alert('You are not logged in!');window.location = 'index.php';</script>";
    }


?>

<body>

<link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href= "https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                <form method="POST" name="confirm"> 
                    <p class="text mb-1">Person Name</p> <input name="name" class="form-control mb-3" type="text" placeholder="Name"style="border-color: black;">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p> <input class="form-control mb-3" name="card" type="text" placeholder="1234 5678 435678" style="border-color: black;">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p> <input name="expiry" class="form-control mb-3" type="text" placeholder="MM/YYYY"    style="width:200px;border-color: black;">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input name="cvv" class="form-control mb-3 pt-1 " type="password" placeholder="***" style="width:200px;border-color: black;">
                </div>
            </div>
            <div class="col-12">
                <!-- <div  name="submit"> -->
                    
                    <!-- confirm payment -->
                    <input class="btn btn-primary mb-3" type="submit" name="submit" value="Confirm Payment">
                <!-- </div> --><span class="fas fa-arrow-right" style="position:relative;top:-60px;left:420px;z-index:1"></span> 
                    </form>
                    <?php
                
                    
                    
                    if (isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $card = $_POST['card'];
                        $expiry = $_POST['expiry'];
                        $cvv = $_POST['cvv'];
                        if(empty($name) or empty($card) or empty($expiry) or empty($cvv)){
                            echo '<script> alert("please fill in the require information!");</script>';
                        }
                        else{
                            echo '<script> alert("Payment Completed!");</script>';
                            echo '<script> window.location.href = "userprofile.php"</script>';
                            include_once 'database_handle.php';
                            $payment = "UPDATE cart SET payment = 'yes' WHERE UserID= $UserID;";
                            mysqli_query($conn, $payment);
                            
                        }
                    }
                    ?>
                    
                </div>
                    
            </div>
        </div>
    </div>
</div>
</body>
</html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
<div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:-9px;height:183px;position:relative;left:150px;">
    <div style="border-right: 3px solid black;width:450px;text-align:center">
<?php
    include_once 'footer.php'
?>