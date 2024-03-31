<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}

$userid = $_POST['user_id'];
$postid = $_POST['post_id'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comment(user_id, post_id, comment) VALUES (
    (SELECT id FROM user WHERE id = '$userid'), 
    (SELECT post_id FROM post WHERE post_id = '$postid'), 
    '$comment'
)";

$query = mysqli_query($con, $sql);
    
if ($query) {
    echo json_encode('Succeed');
} else {
    echo json_encode('Error');
}