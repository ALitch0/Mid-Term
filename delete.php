<?php
//capture values from url link
$showId = $_GET['showId'];

//validation
$ok = true;

if(empty($showId)){
    $ok = false;
}

if($ok==true){
//connect to database
$db = new PDO('mysql:host=172.31.22.43;dbname=Alish200535161','Alish200535161','wXXqdNueNA');

//use delete command in sql insert
$sql ="DELETE FROM shows WHERE showId = :showId;";

//preparing and binding sql
$cmd = $db->prepare($sql);
$cmd->bindParam(':showId', $showId, PDO::PARAM_INT);
$cmd->execute();

//disconnecting from database
$db=null;

//redirecting to select-service.php
header('location:select-service.php');
}

?>