<?php 
include 'config.php';
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$user_id = $obj['user_id'];
 
$query = "SELECT * from recettes WHERE user_id = ".$user_id;
 
$find = mysqli_fetch_array(mysqli_query($connect,$query));

$result = $connect->query($find);
 
if ($result->num_rows > 0) {
    while($row[] = $result->fetch_assoc()) {
        $item = $row;   
        $json = json_encode($item);
    }
}else{
    echo "Aucune recette";
}

echo $json;
$connect->close();
?>