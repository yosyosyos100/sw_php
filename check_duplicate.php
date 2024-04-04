<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$name = $_POST['name'];
$email = $_POST['email'];

// ค้นหาในฐานข้อมูลว่ามี email หรือ username ที่ซ้ำกันหรือไม่
$sql = "SELECT * FROM user WHERE email = '$email' OR name = '$name'";
$result = mysqli_query($con, $sql);

// ตรวจสอบผลลัพธ์
if (mysqli_num_rows($result) > 0) {
    // ถ้ามี email หรือ username ที่ซ้ำกัน ส่งข้อความผิดพลาดกลับไปยังแอพพลิเคชั่น Flutter
    $response = array('error' => true, 'message' => 'Email or username already exists');
    echo json_encode($response);
} else {
    // ถ้าไม่มีการซ้ำกัน สามารถดำเนินการ sign up ต่อไปได้
    $response = array('error' => false, 'message' => 'No duplicates, proceed with sign up');
    echo json_encode($response);
}
?>