<?php 
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$query = "SELECT * FROM `food`";
$exe = mysqli_query($con,$query);

$arr = [];
while($row=mysqli_fetch_array($exe))
{
    $arr[]=$row;
}

$json = json_encode($arr);
// Output the JSON
echo $json;

?>