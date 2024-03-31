<?php
header('Content-Type: application/json');
require "connect.php";
if (!$con) {
    echo "connection error";
}

if ($count == 1) {
    echo json_encode('Error');
} else {
    $image = $_FILES['image']['name'];
    $name = $_POST['name'];

    $imagePath = 'uploads/'.$image;
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $imagePath);

    $insert = "INSERT INTO user(name,image)VALUES('$name','$image')";
    $query = mysqli_query($con, $insert);
    if ($query) {
        echo json_encode('Succeed');
    }
}
