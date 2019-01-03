<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>游戏</title>
</head>
<body>
       <?php        
       require_once '../inc/db.php';    
          
       $query = $db->prepare('select * from fools where game_id = :id');
       $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
       $query->execute();
       while($fool = $query->fetchObject()) {
       ?>
       <h1><a href="../cards/index.php?fool_id=<?php print $fool->id; ?>"><?php echo $fool->name; ?>  </h1>
       <?php  } ?>
       <br/>
       <a href="new.php?id=<?php print $_GET['id']; ?>">添加新池</a>
       <a href="../">返回首页</a>

</body>
</html>