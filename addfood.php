<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$foodname = $_POST['food_name'];
$fooddesc = $_POST['food_desc'];
$foodinst = $_POST['food_inst'];
$image = $_FILES['image']['name'];

$imagePath = 'img/' . $image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name, $imagePath);

$selectedIngredients = explode(',', $_POST['selectedIngredients']);
$selectedIngredients = array_filter($selectedIngredients);

$query = "INSERT INTO food (food_name,description,instructions,food_img) VALUES ('$foodname', '$fooddesc', '$foodinst','$image')";
$exe = mysqli_query($con, $query);


for ($n = 0; $n < count($selectedIngredients); $n++) {
    $ingredient_id = $selectedIngredients[$n];
    $query2 = "INSERT INTO recipe (recipe_id, ingredient_id) VALUES ((SELECT food_id FROM food WHERE food_name = ?), ?)";


    $stmt = mysqli_prepare($con, $query2);
    mysqli_stmt_bind_param($stmt, "si", $foodname, $ingredient_id);
    $exe2 = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if ($exe) {
    $arr = array("message" => "Data inserted successfully");
} else {
    $arr = array("message" => "Failed to insert data");
}
echo json_encode($arr);
?>