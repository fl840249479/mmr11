<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>设置池子 </title>
</head>
<body>
	<?php
		require_once '../inc/db.php';
		$query = $db->prepare('select * from fools where id = :id' );
		$query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
		$query->execute();
        $fool = $query->fetchObject();
        $id = $_GET['fool_id']
          ?>
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
         <a href="../fools/new.php?id=<?php echo $_GET['fool_id']?>"> 返回上一页</a>
         <br/>
          <br/>
         <b> 按稀有度从小到大输入</b>
         <br/>
         <b> 概率总和请=1</b>
</body>
</html>