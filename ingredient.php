<?php 
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}
$query = "SELECT * FROM `ingredient`";
$exe = mysqli_query($con,$query);

$arr = [];
while($row=mysqli_fetch_array($exe))
{
    $arr[]=$row;
}

$json = json_encode($arr, JSON_UNESCAPED_UNICODE);
// Output the JSON
echo $json;

?>