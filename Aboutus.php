<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<?php
    include_once 'header.php';
    
?>
</head>
<body>
    <h1 id="h1positioning"><center>About Us</center></h1>
    <div class="container py-5"> 
        <br>
        <br>
        <h2><center>Who Are We?</center></h2>
        <div style="float: center; margin: 0px 50px 75px;background-color:pink;border-radius: 50px;height:400px">
            <img src="images/owner.jpg" style="width:400px;border-radius: 25px;position:relative;top:60px">
            <div style="width:550px;position:relative;left:450px;top:-250px">
                <p align="justify"><b>Founded by Lee Mei Xing. Lee Mei Xing was inspired to open a pet shop because
                of her parents could not allow her to own a pet. However, Lee Mei Xing loves pets and wanted to provide
                people with pets with affordable pricing so she founded Paws and Claws Pet Shop to provide people with 
                the joy and enjoyment of a pets company. Paws and Claws Pet Shop aims to provide customer comfort by selling
                cheap and affordable product with 2 different methods (online/physical). This allows pet owners, 
                future pet owners and to anyone who has an interest in purchasing pet related items have the freedom to choose 
                how they want to buy their products.Paws and Claws Pet Shop webpage provides futuristic designs, easy to use 
                user interface, and an always active automated and non-automated customer service to give service when it is 
                needed immediately. On top of that, we will actively listen to feedback, which helps us to improve overtime for us 
                to be the best pet store website, and for users to get the best service. </b></p>
            </div>
        </div>
        <div style="float: center; margin: 0px 50px 75px;background-color:pink;border-radius: 50px;height:500px">
            <div class="container py-5" style="position:relative; top:0px">    
                <div class="slideshow" style="position:relative;left:0">
                    <h2>Preview video for Paws and Claws Pet Shop</h2>
                    <iframe width="550" height="300" src="https://www.youtube.com/embed/JrwAhWDexRM" style="position:relative;left:100px"></iframe>
                </div>
            </div>
        </div>
        <br>
        <h2>Where We Are Located</h2>
        <div class="container py-5" style="position:relative; top:0px">    
            <div class="slideshow" style="position:relative;left:0">
            <h5 style="position:relative;top:470px">Design of our store</h5>
            <h5 style="position:relative;top:390px;left:665px">Our Store Location</h5>
            <h5 style="position:relative;top:400px;left:530px">(click the map to be redirected to Google Maps)</h5>
                <?php
                    $dir = "images/pawsandclaws*.jpg";
                    $images = glob( $dir );
                    foreach( $images as $image ):
                        echo'<div class="myslide">';
                        echo "<img src=" . $image . " style='width:100%; border-radius: 20px;width:600px;position:relative;top:-70px;left:-200px' />";
                        echo'</div>';
                    endforeach;
                ?>
                <!-- next and previous buttons -->
                <a class="previmg" onclick="plusSlides(-1)" style="position: absolute;left: -250px;top:250px">&#10094;</a>
                <a class="nextimg" onclick="plusSlides(1)" style="position: absolute;left: 400px;top:250px">&#10095;</a>
            </div>
            <br>

            <!-- bar button -->
            <div style="text-align:center;position:relative;top:-80px;left:-270px">
                <?php
                    $x = 1;

                    do {
                        echo '<span class="bar" onclick="currentSlide(x)"></span>';
                        $x++;
                    } while ($x <= 3);
                ?>
            </div>

            <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous control
            function plusSlides(n) {
            showSlides(slideIndex += n);}

            // Thumbnail image control
            function currentSlide(n) {
            showSlides(slideIndex = n);}

            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("myslide");
            var dots = document.getElementsByClassName("bar");
            if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";}
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");}
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";}
            </script>
        </div>

        <a href="https://www.google.com.my/maps/@1.5884673,110.3185252,19.78z"><i class="fas fa-map-pin" style="font-size:2em; float:right;position:relative;top:-290px;right:150px;z-index:100"></i>
        <IMG SRC="images/map.png"  style="width: 440px; height:400px; display:block; margin-left: auto; margin-right: auto; border: 1px solid black;position:relative;top:-580px;left:380px"></a>
        
        
        
        
        
        <div style="margin-top:-400px;">
            <h2><center>Enquiries</center></h2>
            <p><h4 style="position:relative;top:-50px"><center>Need More Enquiries regarding our shop or pets?</h4><br></center></p>
            <p style="font-weight:bold;position:relative;top:-50px">&emsp;Inform us via the feedback box below and we will try our best to reply via email:</p>
            <div style="position:relative;top:-50px;background-color:pink;border-radius: 50px ">
                <div style="padding:50px;position:relative;top:-50px;">
                    <form action="" method="post">
                        Name : <input type="text" name="name" placeholder="Name">
                        <br>
                        E-mail : <input type="text" name="email" placeholder="email">
                        <br>
                        Feedback : <textarea rows="10" name="feedback" style="width:1000px" placeholder="Enter your Feedback/Question here"></textarea>
                        <input type="submit" name="submitfeedback" value="Submit Feedback form" style="background-color:#ffc107;width:200px;height:80px;position:relative;top:50px">
                    </form>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST["submitfeedback"])){
                $name = $_POST["name"];
                $email = $_POST["email"];
                $feedback = $_POST["feedback"];
                if(empty($name) or empty($email) or empty($feedback)){
                    echo'
                    <script>
                        alert("Please fill in all the feedback form before submitting");
                    </script>
                    ';
                }
                else{
                    echo'
                    <script>
                        alert("Feedback Form successfully submitted. We will reply your email within 1 week or so");
                    </script>
                    ';
                }
            }
        ?>
<!-- feedback form?for contact us via email let ppl fill in the form -->
<!-- <i class="fas fa-map-pin"></i> -->
<div style="margin-top:-100px;">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <div style="background-color:#ffcc00;width: 1200px;position:relative;bottom:-95px;height:0px;position:relative;left:-40px;">
        <div style="width:450px;text-align:center;">
<?php
    include_once 'footer.php';
?>