<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>修改 </title>
</head>
<body>
	<?php 
		require_once '../inc/db.php';
		$id = $_GET['id'];
	    $query = $db->prepare('select * from games where id = :id');
	    $query->bindValue(':id',$id,PDO::PARAM_INT);
	    $query->execute();
	    $game = $query->fetchObject();    		
	?>
	<h1>修改游戏名</h1>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<label for="name">游戏名</label>
		<input type="text" name="name" value="<?php echo $game->name ?>" />
		<br/>
		<input type="submit" value="提交" />
		<br/>
	<b>选择要修改的池子</b>
</br>
	<?php 
       $query = $db->prepare('select * from fools where game_id = :id');
       $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
       $query->execute();
       while($fool = $query->fetchObject()) {
       ?>
       <a><a href="../fools/edit.php?fool_id=<?php print $fool->id; ?>"><?php echo $fool->name; ?>  </a>
   </br>
       <?php  } ?>
	</form>
</body>
</html>