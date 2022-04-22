<?php

include_once 'header.php';

$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} else {
}

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

echo "Total Number Of User";
echo $num_of_User;
echo "<br>";

?>

<form method="POST" action="">
    <table>
        <tr>
            <td>
                Names :
            </td>
            <td>
                Gender :
            </td>
            <td>
                Email :
            </td>
        </tr>
        <tr>
            <?php
            while ($x <= $num_of_User) {
                $sqli = "select * from customer_detail where ID = '" . $x . "';";
                $result = mysqli_query($conn, $sqli);
                $row = mysqli_fetch_array($result);

                echo "<tr>";
                    echo "<td>"; echo $row['Username']; echo "</td>";
                    
                    echo "<td>"; echo $row['Gender']; echo "</td>";

                    echo "<td>"; echo $row['Email']; echo "</td>";
                    
                
                    echo "<td>";
                        echo 'If want display other thing echo $row["other column"], me still thinking how to select specific';

                    
                    echo "</td>";
                echo "<tr>";
                $x += 1;
                $y += 1;
            }
            ?>
        </tr>
        


    </table>
</form>