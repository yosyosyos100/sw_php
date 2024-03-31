<?php
    header('Content-Type: application/json');
    require "connect.php";
    if (!$con) {
        echo "connection error";
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_pwd = md5($password);

    $sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $encrypted_pwd . "' ";
    $result = array();
    
    $aQResult = mysqli_query($con, $sql);
    while ($aRow = mysqli_fetch_array($aQResult))
        {
            $result[]=$aRow;
            $name1=$aRow['email'];
        }
    if ($name1 == null) {
        echo json_encode($result);
        
    } else if($name1 != null) {
        echo json_encode($result);
        
    }
?>