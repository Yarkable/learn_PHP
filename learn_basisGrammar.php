<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PhpGrammer</title>
</head>
<body>

<?php 
// 防止乱码
header("Content-Type:text/html;charset=utf-8");
// var_dump输出变量的类型和值
$array = array('name' => 'kevin', 'school' => 'shenzhen', "age" => 18, "favor" =>"spicy");
echo "<br>";
var_dump($array);
// for循环可以用冒号加endfor的结构实现
for($t = 0; $t < 10; $t ++):
	print("<br>"."hello");
endfor;
// 函数定义法
$ridus = 3;
define('PI', 3.14);
$vari = 100;
function getCircleArea($r){
	$area = PI * $r * $r;
	return $area;
}

$AREA = getCircleArea($ridus);
echo '<br>'.$AREA;

// 在函数中调用全局变量
function foo(){
	echo "<br>".$GLOBALS["vari"];
}
foo();

// 用{$var}解析变量
$name = 'kevin';
echo "Hello {$name} I love you";
// 函数嵌套调用
function sum($a,$b){
	return $a + $b;
}
function aver($a,$b){
	return sum($a,$b) / 2.0;
}
echo aver(2,5);
// 函数递归调用
function revert($num)
{
	if($num == 1){
		return 1;
	}
	return $num + revert($num - 1);

}
echo revert(4);
// 字符串函数
echo "<br>";
$str = "one,two,three,four";
$split = explode(',', $str);
var_dump($split);
echo "<br>";
print_r($split);
// count表示被替换的次数
$str1 = "I have to study hard due to interest";
$str2 = str_replace("due to", "because of", $str1,$count);
echo "<br>".$str2."<br>";
echo $count;

// substr参数意义：要截取的字符串，从第几位开始截取，截取到第几位
echo "<br>".substr($str1, 4, -10);
echo "<br>".strlen($str1);
$str3 = "  you are not alone ";
echo "<br>$str3";
echo "<br>".trim($str3);
// UNIX时间戳 UNIX timestamp
echo "<br>".time();
date_default_timezone_set("PRC");
echo "<pre>";
echo "<br>".date("y-m-d   h-m-s", time());
echo "<br>".date("y-m-d   h-m-s");
echo "</pre>";

// 数组函数 unset删除数组元素
// 其实unset本来的意思是释放给定的变量，所以被unset的变量之后会变成null
// 可以结合isset函数来更好地理解这个函数
$arr[0] = 'w';
$arr[1] = 'ww';
$arr[2] = 'www';
print_r($arr);
unset($arr[1]);
echo "<br>";
var_dump($arr);
// 数组指针 current key
while (current($array)) {
	echo key($array);
	echo "=>";
	echo current($array);
	next($array);
}
// 数组指针 each 有点意思
$ar = array("os" => "linux", "server" => "apache", "language" => "php", "databsse" => "mysql");
echo "<br>";
echo "<pre>";
print_r(each($ar));
print_r(each($ar));
echo "</pre>";
// foreach遍历数组
foreach ($array as $key => $value) {
	echo "$key";
	echo "=>";
	echo "$value";
	echo "<br>";
}
// 用list() each() while遍历数组
while (list($key,$value) = each($ar)) {
	echo "$key=>$value";
	echo "<br>";
}

// php的冒泡排序操作
// count计算的是数组的长度，不是用strlen函数
function getSortedValue($array){
	for($i = 0;$i < count($array) - 1; $i ++){
		for($j = 0; $j < count($array) - 1 - $i; $j ++)
			{
				if ($array[$j] > $array[$j + 1]) {	
					
					$temp = $array[$j];
					$array[$j] = $array[$j + 1];
					$array[$j + 1] = $temp;
				}				
		}
			}
		print_r($array);
	}
	
$sort_test = array(1,4,6,7,4,3,7,9,3,8);
echo "<pre>";
getSortedValue($sort_test);
sort($sort_test, SORT_NUMERIC);
print_r($sort_test);
echo "</pre>";

// 函数还有好多呢 不一一列举了



?>

</body>
</html>