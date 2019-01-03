<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>首页 - 抽抽乐</title>
</head>
<body>
	<b>游戏名:</b>
	  <?php

        require_once '../inc/db.php';
		$query = $db->query('select * from games');
		while($game = $query->fetchObject()){
?>

       <h1><a href="../fools/index.php?id=<?php print $game->id; ?>"><?php echo $game->name; ?></h1>
       <?php  } ?>
       <br/>
       <a href="new.php">添加新游戏</a>
       <br/>
       <a href="../gfc/e.php">修改游戏</a>
<br/>
<br/>
       <br/>
       <a href="https://lovelivewiki.com/w/11%E8%BF%9E%E6%A8%A1%E6%8B%9F%E5%99%A8">mo</a>
       <a href="http://yuan.heyuan.com/cd/">ni</a>

</body>
</html>
