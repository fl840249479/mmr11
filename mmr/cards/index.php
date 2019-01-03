<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>池子</title>
</head>
<body>
       <?php        
       require_once '../inc/db.php';    
          
       $query = $db->prepare('select * from fools where id = :id');
       $query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
       $query->execute();
       $fool=$query->fetchObject();    
       $query = $db->prepare('select * from cards where fool_id = :id');
       $query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
       $query->execute();
       $i=1;  
       ?>
       <form action="../calculate/calculate.php" method="post" enctype="multipart/form-data">
       	   <input type="hidden" name="id" value = "<?php echo $_GET['fool_id']; ?>"/>
	       <?php 
	       while ( $card = $query->fetchObject() ) {
	       ?>
	       <label for="card<?php echo $i ?>"><?php echo $card->name ?></label>
	       <input type="text" name="card<?php echo $i ?>" value="" />
	       <?php 
	   	   $i++;
	   	   echo "<br/>";
	   		} ?>
	   	    <input type="submit" value="提交" />
          <br/>
            <br/>
  <label for="pic">上传图片</label>
  <input type="file" name="pic">
  <br/>
      <h1>累积抽出</h1>
        <?php  $query = $db->prepare('select * from cards where fool_id = :id');
              $query->bindValue(':id',$_GET['fool_id'],PDO::PARAM_INT);
              $query->execute();
         while($cards = $query->fetchObject() ){
        ?>
            <a><?php echo $cards->name; ?>:<?php echo $cards->adc; ?>张</a>


			 <br/>
          <?php  } ?> 

	   	    <a href="../fools/index.php?id=<?php print $fool->game_id; ?>">返回游戏页</a>
	   	    <a href="../ ">返回首页</a>
	   	    </form>
</body>
</html>