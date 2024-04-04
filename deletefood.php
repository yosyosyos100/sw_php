<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$foodID = $_POST['food_id'];

$query1 = "DELETE FROM food WHERE food_id = '$foodID' ";
$exe1 = mysqli_query($con, $query1);

$query2 = "DELETE FROM recipe WHERE recipe_id = '$foodID'";
$exe2 = mysqli_query($con, $query2);


if ($exe1) {
    echo json_encode('Delete Food Success');
} else {
    echo json_encode('Delete Food Failed');
}

if ($exe2) {
    echo json_encode('Delete Recipe Success');
} else {
    echo json_encode('Delete Recipe Failed');
}

?>