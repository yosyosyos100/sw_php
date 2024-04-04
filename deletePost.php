<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$postID = $_POST['post_id'];

$query1 = "DELETE FROM post WHERE post_id = '$postID' ";
$exe1 = mysqli_query($con, $query1);

$query2 = "DELETE FROM comment WHERE post_id = '$postID'";
$exe2 = mysqli_query($con, $query2);


if ($exe1 && $exe2) {
    echo json_encode('Delete Post and Comment Success');
} else {
    echo json_encode('Delete Post and Comment Failed');
}


?>