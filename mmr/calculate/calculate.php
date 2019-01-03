<?php 
error_reporting( E_ALL&~E_NOTICE );
require_once '../inc/db.php';
require_once '../inc/common.php';

       $query = $db->prepare('select * from fools where id = :id');
       $query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
       $query->execute();
       $fool=$query->fetchObject();  

       $query = $db->prepare('select * from cards where fool_id = :id');
       $query->bindValue(':id',$_POST['id'],PDO::PARAM_INT);
       $query->execute();
       $k=0;
       $i=1;
       $score=0;
       $add=array();
       while ($card=$query->fetchObject()){
       	if(($k<0.5)&&($card->stars<$fool->amount)) {$i++;}
       	elseif(($k>=0.5)&&($card->stars<$fool->amount)){
       		$score+=$_POST["card$i"]*$i/$card->pro;
       		$i++;
       	}
       	else{
       		$score+=$_POST["card$i"]*$i/$card->pro;
       		$full=1/$card->pro*$i/92;
        }
        $k+=$card->pro;
        $add[$i]=$card->add;
   	   }
   	   for($i=1;$i<=$fool->amount;$i++){
   	   	$addd=$_POST["card$i"]+$add[$i];
   	   	$id=$_POST['id'];
   	    $sql = "update cards set adc = adc + :adc  where stars = :i and fool_id =:id;" ;	
		$query = $db->prepare($sql);
		$query->bindValue(':adc',$addd,PDO::PARAM_INT);
		$query->bindValue(':i',$i,PDO::PARAM_INT);
		$query->bindValue(':id',$id,PDO::PARAM_INT);
		if (!$query->execute()) {	
			print_r($query->errorInfo());}
		}
    $sc=$score/$full;
    $sql = "insert into eleven(score,pick_at,pic) values(:score,:pick_at,:pic);" ;  
    $query = $db->prepare($sql);
    var_export($_FILES,true);    
    $dest_path = "/pic/mmr-" . rand() . ".jpg";
    $dest= $_SERVER["DOCUMENT_ROOT"] . $dest_path; printf("<h2>");
    var_export($dest,true);    printf("</h2>");
    move_uploaded_file($_FILES["pic"]["tmp_name"], $dest);


    $query->bindParam(':pic',$dest_path,PDO::PARAM_STR);
    $query->bindParam(':score',$sc,PDO::PARAM_STR);
    $query->bindParam(':pick_at',$pick_at,PDO::PARAM_STR);
    $pick_at = date('Y-m-d H:i:s');
    $query->execute()
   	   ?>
   	   <!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>得分</title>
</head>
<body>
  <br/>
  <br/>
<h2><?php printf('您的得分是%.2f',$score/$full);  ?></h2>
<?php 
if ($score/$full==0) {print('这游戏连保底都没有的吗');}
elseif($score/$full>0&&$score/$full<=92)  printf('超越了全国%.2f%%的抽卡玩家',$score/$full/6+23);
else printf('超越了全国%.2f%%的抽卡玩家',$score/$full/97+97);
  ?>
<br/>
<a href="../">回到首页</a>
<a href="../cards/index.php?fool_id=<?php echo $_POST['id'] ?>; ">上一页</a>
</body>
</html>