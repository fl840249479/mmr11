<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>修改</title>
</head>
<body>
	<b>选择要修改的游戏</b>
	 
    <?php

        require_once '../inc/db.php';
		$query = $db->query('select * from games');
		while($game = $query->fetchObject()){
?>

       <h1><a href="../games/edit.php?id=<?php print $game->id; ?>"><?php echo $game->name; ?></h1>
       <?php  } ?>


</body>
</html>
