<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';

$sql = "insert into fools(name,amount,game_id,sb) values(:name, :amount,:game_id,:sb);" ;	
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam(':amount',$_POST['amount'],PDO::PARAM_INT);
$query->bindParam(':game_id',$_GET['id'],PDO::PARAM_INT);
$query->bindParam(':sb',$_POST['savebutton'],PDO::PARAM_INT);
if (!$query->execute()) {	
	print_r($query->errorInfo()); 
}else{   
    $id = $db->lastInsertId();
	redirect_to("../cards/new.php?fool_id={$id}");
};

?>