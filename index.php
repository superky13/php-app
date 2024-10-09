<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new pg_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ocpstatus";
$result = $conn->pg_query($sql);

if ($result->pg_num_rows > 0) {
    // output data of each row
    while($row = $result->pg_fetch_assoc()) {
        if($row['status'] == 'HEALTHY'){
        ?>
            <tr><td><?=$row['clustername']?></td><td style="color:green;"><?=$row['status']?></td></tr>
        <?php   
        }
        else{
        ?>
            <tr><td><?=$row['clustername']?></td><td style="color:red;"><?=$row['status']?></td></tr>
        <?php   
        }
    }    
} 
else 
{
    echo "0 results";
}
$conn->pg_close();
?>

</body>
</html>
