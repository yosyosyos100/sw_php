<?php
require "connect.php";
if (!$con) {
    echo "connection error";
}

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$image = $_FILES['image']['name'];
$encrypted_pwd = md5($password);
$sql = "SELECT * FROM user WHERE email = '$email'";

$imagePath = 'upload/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, $imagePath);


$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode('Error');
} else {
    $insert = "INSERT INTO user(name,password,email,image)VALUES('$name','$encrypted_pwd','$email','$image')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo json_encode('Succeed');
    }
}