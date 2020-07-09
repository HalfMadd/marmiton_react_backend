<?php 
include 'config.php';
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

// $user_id = $obj['user_id'];
$nom_recette = $obj['nom_recette'];
$description_recette = $obj['description_recette'];
$user_id = $obj['id_recette'];
$id_recette = $obj['id_recette'];

$query = "UPDATE recettes SET 
    nom_recette = ".$nom_recette.", 
    description_recette = ".$description_recette.", 
    user_id = ".$user_id." WHERE id_recette = ".$id_recette;

$query_result = $connect->query($query);

if ($query_result === true){
    $message = 'Success';
}else{
    $message = 'Error';
}

echo json_encode($message);

$connect->close();

