<?php
    header('Content-Type: application/json');
    require "connect.php";
    if (!$con) {
        echo "connection error";
    }

    $sql = "SELECT * FROM post";
    $result = array();
    $aQResult = mysqli_query($con, $sql);
    
    while ($aRow = mysqli_fetch_array($aQResult))
        {
            
            $result[]=$aRow;
        }
    $post0 = json_encode($result);
    echo $post0;
?>