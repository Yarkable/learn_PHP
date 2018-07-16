<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php_test</title>
</head>
<body>
<?php 
// 防止乱码
header("Content-Type:text/html;charset=utf-8");

// 多用isset函数，可以判断当前变量是否定义过
if (isset($_POST['StudentId']) && isset($_POST["pwd"])) {

	echo "<br>name = " . $_POST['StudentId'];
	
	if (is_numeric($_POST['pwd'])) {
		
		echo "<br>password = " . $_POST["pwd"];

	}
	else echo "<br>pwd must be numeric";
	
	// exit在执行完PHP后直接退出，不运行后面的代码，加了以后就不会再出现input框
	exit;
}
// 不能用else，否则直接执行else了
// else die("data transfer error!");


 ?>

 <form action="learn_webInteraction_1.php" method="post">
 	name: 	<input type="text" name="StudentId" id="name" required> <br>
 	password: <input type="password" name="pwd" id="pwd" required> <br>
 	<input type="submit" value="submit">
 </form>
</body>
</html>