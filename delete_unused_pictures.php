<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} 
else{
    
}


?>



<?php


// Get an array of image used

$image_in_use_list =[];

$sql = 'SELECT `ProductImage`, `ProductImage2` FROM `product_detail`;';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

foreach($result as $i){
    array_push($image_in_use_list, $i['ProductImage']);
    array_push($image_in_use_list, $i['ProductImage2']);
}

// echo "===below is item used in DB";echo "<br>";echo "<br>";

// print_r($image_in_use_list);echo "<br>";echo "<br>";



// echo "===below is item used in DB, without empty array element";echo "<br>";echo "<br>";
//filter empty element
//'strlen' built in function is passed in to prevent evaluation of '0' into boolean false 
$img_used_array = array_filter($image_in_use_list, 'strlen');
// print_r($img_used_array);echo "<br>";echo "<br>";



// echo "===below is item used in DB, in strings";echo "<br>";echo "<br>";
// foreach($img_used_array as $i){
//     print_r($i);echo "<br>";
// }


// echo "<br>";
// echo "<br>";




// echo "===below is all item used in folder";echo "<br>";echo "<br>";
// Get all files in images/ directory
$path = 'productimage/';
$files = scandir($path);

// remove . and .. from the returned array from scandir function
$files = array_diff(scandir($path), array('.', '..'));
// print_r($files);


// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";

// echo "===below is all item used in folder with directories";echo "<br>";echo "<br>";

$files_w_directory = [];

foreach($files as $img){
    $img = 'productimage/'.$img;
    array_push($files_w_directory, $img);
}



// print_r($files_w_directory);


// // Get unused files
// $unused_files = array_diff($files, $img_array);
// print_r($unused_files);

// echo "<br>";
// echo "<br>";
// echo "===below is array diff, displays files that are not used but in folder";
// echo "<br>";
// echo "<br>";

$unused_files = array_diff($files_w_directory, $img_used_array);
// print_r($unused_files);

// echo "<br>";
// echo "<br>";




// Delete unused files
foreach($unused_files as $pic_delete){
    // echo $pic_delete;
    unlink($pic_delete);
}



//--------------------------------------------------------Profiles-------------------------------------

// Get an array of image used

$image_in_use_list =[];

$sql = 'SELECT `UserProfile` FROM `customer_detail`;';
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

foreach($result as $i){
    array_push($image_in_use_list, $i['UserProfile']);
}

// echo "===below is item used in DB";echo "<br>";echo "<br>";

// print_r($image_in_use_list);echo "<br>";echo "<br>";



// echo "===below is item used in DB, without empty array element";echo "<br>";echo "<br>";
//filter empty element
//'strlen' built in function is passed in to prevent evaluation of '0' into boolean false 
$img_used_array = array_filter($image_in_use_list, 'strlen');
// print_r($img_used_array);echo "<br>";echo "<br>";



// echo "===below is item used in DB, in strings";echo "<br>";echo "<br>";
// foreach($img_used_array as $i){
//     print_r($i);echo "<br>";
// }


// echo "<br>";
// echo "<br>";




// echo "===below is all item used in folder";echo "<br>";echo "<br>";
// Get all files in images/ directory
$path = 'profileimage/';
$files = scandir($path);

// remove . and .. from the returned array from scandir function
$files = array_diff(scandir($path), array('.', '..'));
// print_r($files);


// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";

// echo "===below is all item used in folder with directories";echo "<br>";echo "<br>";

$files_w_directory = [];

foreach($files as $img){
    $img = 'profileimage/'.$img;
    array_push($files_w_directory, $img);
}



// print_r($files_w_directory);


// // Get unused files
// $unused_files = array_diff($files, $img_array);
// print_r($unused_files);

// echo "<br>";
// echo "<br>";
// echo "===below is array diff, displays files that are not used but in folder";
// echo "<br>";
// echo "<br>";

$unused_files = array_diff($files_w_directory, $img_used_array);
// print_r($unused_files);

// echo "<br>";
// echo "<br>";




// Delete unused files
foreach($unused_files as $pic_delete){
    // echo $pic_delete;
    unlink($pic_delete);
}





echo '<script>alert("Unused Pictures Deleted Successful!");window.location = "adminprofile.php"</script>;';




?>


