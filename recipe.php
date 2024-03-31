<?php
header('Content-Type: application/json');

require "connect.php";
if (!$con) {
    echo "connection error";
}

$selectedIngredients = explode(',', $_POST['selectedIngredients']);
$listLength = count($selectedIngredients);
$selectedIngredients = array_filter($selectedIngredients);


if (count($selectedIngredients) < 6) {
    $query = "SELECT DISTINCT * FROM `food` INNER JOIN `recipe` ON `food_id` = `recipe_id` WHERE `ingredient_id` IN ('" . implode("','", $selectedIngredients) . "') GROUP BY `food_name` HAVING COUNT(*) = $listLength";
    $exe = mysqli_query($con, $query);

    $arr = [];
    while ($row = mysqli_fetch_array($exe)) {
        $arr[] = $row;
    }

    $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
    echo $json;
} else {
    echo json_encode(['error' => 'Invalid number of selected ingredients. Please select exactly 5 ingredients.']);
}
?>