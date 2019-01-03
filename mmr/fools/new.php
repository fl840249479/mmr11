<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新增| 池子</title>
</head>
<body>
<h1>添加新池</h1>
<form action="save.php?id=<?php print $_GET['id']; ?>" method="post">
	<label for="name">卡池名</label>
	<input type="text" name="name" value="" />
	<br/>
	<label for="amount">池中卡的种类数</label>
	<input type="text" name="amount" value="" />
	<br/>
	         <label for="savebutton">有无保底</label>
	       <select name="savebutton">
            <option value=1>有</option>
            <option value=0>无</option>
          </select>    
          <br/>    
	<input type="submit" value="提交" />
</form>
<a href="index.php?id=<?php print $_GET['id']; ?>">不添加了</a>
</body>
</html>