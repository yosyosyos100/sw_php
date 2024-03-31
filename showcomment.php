<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$userid = $_POST['user_id'];
$postid = $_POST['post_id'];

$sql = "SELECT comment.comment, user.id as user_id, user.name, user.image FROM comment INNER JOIN post ON comment.post_id = post.post_id INNER JOIN user ON comment.user_id = user.id WHERE comment.post_id = '$postid'";

$result = array();
$aQResult = mysqli_query($con, $sql);

while ($aRow = mysqli_fetch_assoc($aQResult)) {
    $result[] = $aRow;
}

echo json_encode($result);

?>