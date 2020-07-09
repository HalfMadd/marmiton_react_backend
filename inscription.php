<?php

include 'config.php';

$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$pseudo = $obj['pseudo'];
$role_id = $obj['role_id'];

$query = "INSERT INTO users(pseudo, role_id) values(".$pseudo.", ".$role_id.")";

$query_result = $connect->query($query);

if ($query_result === true){
    $message = 'Success';
}else{
    $message = 'Error';
}

echo json_encode($message);

$connect->close();