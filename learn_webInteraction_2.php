<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>web_2</title>
</head>
<body>
<?php 

// 防止乱码
header("Content-Type:text/html;charset=utf-8");

// 先判断有没有发生请求
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$cfpwd = $_POST['cfpwd'];
	$gender = $_POST['gender'];
	$sub = $_POST['sub'];
	// 注意在表单中的name是数组
	$hobby = $_POST['hobby'];
	
		echo "The name is: " . $name . "<br>";
	// 验证密码相同
	if ($pwd != $cfpwd) {
		echo "You inputed different password<br>";
	}
	else echo "The pwd is: " . $pwd . "<br>";

	if (isset($gender)) {
		echo "The gender is: " . $gender . "<br>";
	}
	else echo "Error: haven't select gender!<br>";

	echo "The subject is: " . $sub . "<br>";
	// 看看是不是传来了一个数组
	if (is_array($hobby)) {
		print_r($hobby);
		
	}

	// 退出程序，不运行后面的表单
	exit;
}





 ?>


 <form action="learn_webInteraction_2.php" method="post">
 	<fieldset>
 		<legend>form test</legend>
 		<p>
	 		<label for="">name:</label>
	 		<input type="text" name="name" id="" required>
		</p>
		<p>
			<label for="">password:</label>
			<input type="password" name="pwd" required>
		</p>
		<p>
			<label for="">confirm password:</label>
			<input type="password" name="cfpwd" required>
		</p>
		<p>
			<label for="">gender:</label>
			<input type="radio" name="gender" value="male">male
			<input type="radio" name="gender" value="female">female
		</p>
		<p>
			<label for="">subject:</label>
			<select name="sub" id="" >
				<option value="Math">Math</option>
				<option selected="selected" value="Chinese">Chinese</option>
				<option value="English">English</option>
			</select>
		</p>
		<p>
			<label for="">hobby:</label>
			<input type="checkbox" name="hobby[]" value="sing">sing
			<input type="checkbox" name="hobby[]" value="dance">dance
			<input type="checkbox" name="hobby[]" value="swim">swim
			<input type="checkbox" name="hobby[]" value="paint">paint
		</p>
		<input type="submit"value="submit">
 	</fieldset>
 </form>




</body>
</html>