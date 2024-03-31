<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}

$userid = $_POST['user_id'];
$postid = $_POST['post_id'];
$topic = $_POST['topic'];
$descrip = $_POST['descrip'];

$image = $_FILES['image']['name'];
$sql = "INSERT INTO post(user_id,image,topic,descrip) VALUES((select id from user where id = '$userid' ),'$image','$topic','$descrip')";

$imagePath = 'upload/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, $imagePath);

$query = mysqli_query($con, $sql);
    
if ($query) {
    echo json_encode('Succeed');
} else {
    echo json_encode('Error');
}