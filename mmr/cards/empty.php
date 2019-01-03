<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';

$query = $db->prepare('select * from fools where id = :id');
$query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
$query->execute();
$fool=$query->fetchObject();
$fool_id=$_GET['fool_id'];

for($i=1;$i<=$fool->amount;$i++){
$sql = "update cards set adc=:adc where fool_id=:fool_id and stars=:i ;" ;	
$query = $db->prepare($sql);
$query->bindValue(':adc',$i,PDO::PARAM_INT);
$query->bindValue(':foo_id',$fool_id,PDO::PARAM_INT);
$query->bindValue(':i',$i,PDO::PARAM_INT);
echo $i;
echo $fool->amount;
echo $fool_id;
if (!$query->execute()) {	
print_r($query->errorInfo());}
}
?>