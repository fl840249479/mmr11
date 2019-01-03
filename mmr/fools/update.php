<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
$id = $_POST['id'];
$sql = "update fools set name = :name,amount = :amount where id = :id;" ;	
$query = $db->prepare($sql);
$query->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
$query->bindValue(':amount',$_POST['amount'],PDO::PARAM_INT);
echo $query->bindValue(':id',$id,PDO::PARAM_INT);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../cards/edit.php?fool_id={$id}");
};


?>