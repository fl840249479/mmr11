<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
$amount=$_POST['amount'];
$id=$_POST['id'];
for($i=1;$i<=$amount;$i++)
{
$sql = "insert into cards(name,pro,stars,fool_id) values(:name,:pro,:stars,:fool_id);" ;	
$query = $db->prepare($sql);
$query->bindParam(':name',$_POST["name$i"],PDO::PARAM_STR);
$query->bindParam(':pro',$_POST["pro$i"],PDO::PARAM_STR);
$query->bindParam(':stars',$i,PDO::PARAM_STR);
$query->bindParam(':fool_id',$id,PDO::PARAM_STR);
$query->execute();
}
redirect_to("index.php?fool_id={$id}");
?>