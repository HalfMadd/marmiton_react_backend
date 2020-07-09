<?php 
include 'config.php';
 
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$id_commentaire = $obj['id_commentaire'];

$query = "DELETE FROM commentaires WHERE id_commentaire = ".$id_commentaire;

$query_result = $connect->query($query);

if ($query_result === true){
    $message = 'Success';
}else{
    $message = 'Error';
}

echo json_encode($message);

$connect->close();

