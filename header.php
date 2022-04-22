<?php
    session_start();
    //start a session
?>

<!DOCTYPE html>
    <html lang="en" class="background">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
            <script>
                
            </script>
        </head>
            <body>
                <!-- <div class="wrapper"> -->
                    <nav id="firstMenu">
                        <!-- <div class="wrapper"> -->
                            <ul>
                                <li><a href="index.php" id="aligntext">Home</a></li>
                                <li><a href="aboutus.php" id="aligntext">About Us</a></li>
                                <li><a href="our_product.php" id="aligntext">Our Products</a></li>
                                <?php
                                    if(isset($_SESSION["id"])){
                                        if($_SESSION['id'] == '1'){
                                            echo "<li><a href='adminprofile.php' id='aligntext'>Profile Page</a></li>";//redicrect admin page
                                            echo "<li><a href='logout.php' id='aligntext'>Log Out</a></li>";
                                        }
                                        elseif(($_SESSION['id'] != '1')){
                                            echo "<li><a href='userprofile.php' id='aligntext'>Profile Page</a></li>";//redicrect admin page
                                            echo "<li><a href='logout.php' id='aligntext'>Log Out</a></li>";
                                        }
                                    }
                                    //if users didnt login
                                    else{
                                        echo "<li><a href='login.php' id='aligntext'>Login</a></li>";
                                        echo "<li><a href='register.php' id='aligntext'>Register</a></li>";
                                    }//if users didnt login
                                ?>
                            </ul>
                        <!-- </div> -->
                        
                    </nav>
                
                <div class="wrapper">
