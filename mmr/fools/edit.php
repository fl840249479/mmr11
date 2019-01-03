<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>修改 </title>
</head>
<body>	
	<?php 
		require_once '../inc/db.php';
		$id = $_GET['fool_id'];
	    $query = $db->prepare('select * from fools where id = :id');
	    $query->bindValue(':id',$id,PDO::PARAM_INT);
	    $query->execute();
	    $fool = $query->fetchObject();    		
	?>
		<h1>修改卡池</h1>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value = "<?php echo $id; ?>"/>
		<label for="name">卡池</label>
		<input type="text" name="name" value="<?php echo $fool->name ?>" />
		<br/>	
		<label for="amount">池中卡的种类数</label>
		<input type="text" name="amount" value="<?php echo $fool->amount ?>" />
		<br/>
		<input type="submit" value="提交" />
		<br/>
	</form>
</body>
</html>