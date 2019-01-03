<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
$sql = 	"delete from cards where fool_id = :id" ;	
$query = $db->prepare($sql);
$query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
		$query = $db->prepare('select * from fools where id = :id' );
		$query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
		$query->execute();
        $fool = $query->fetchObject();
        $id = $_GET['fool_id']
          ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>修改 </title>
</head>
<body>	
         <form action="save.php" method="post">
         <input type="hidden" name="id" value = "<?php echo $id; ?>"/>
         <input type="hidden" name="amount" value = "<?php echo $fool->amount; ?>"/>
         <label for="name1">卡名</label>
  	     <?php
         for($i=1;$i<=$fool->amount;$i++){?>
         <input type="text" name="name<?php echo $i ?>" value="" />
         <?php } ?>
         <br/>
         <label for="pro1">概率</label>
          <?php
         for($i=1;$i<=$fool->amount;$i++){?>
         <input type="text" name="pro<?php echo $i ?>" value="" />
         <?php } ?>
         <br/>
         <input type="submit" value="提交" />
  		</form>
         <br/>
          <br/>
         <b> 按稀有度从小到大输入</b>
         <br/>
         <b> 概率总和请=1</b>
 </body>
</html>