<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php_OOP</title>
</head>
<body>
<?php 
// 防止乱码
header("Content-Type:text/html;charset=utf-8");
// oop面向对象编程

// 正常访问 没有私有界限
class Student{
	public $name;
	public $age;
	public function intro()
	{
		echo "hello,大家好,我的名字叫做".$this->name."我今年".$this->age."岁了。<br>";
	}
}
$lihua = new Student();
$lihua->name = "huahua";
$lihua->age = 18;
$lihua->intro();	

// 类的封装（将属性私有化，不让外界轻易访问）
// 访问私有属性第一种方法
class Student1{
	private $name;
	private $age;
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getAge()
	{
		return $this->age;
	}
	public function setAge($age)
	{
		$this->age = $age;
	}
}
$kevin = new Student1();
$kevin->setAge(18);
$kevin->setName('kevin');
echo "这人的姓名是".$kevin->getName()."<br>";
echo "这人的年龄是".$kevin->getAge()."<br>";

// 第二种方法，直接自动调用__get 和 __set 方法
// 可以看到，上面这种方法很麻烦，要是属性多一点的话就十分啰嗦，所以php内置了自动调用的获取私有属性和给私有属性赋值的函数

class Student2{
	private $name;
	private $age;
	// 注意__set方法一定有两个参数，一个是属性，一个是属性值
	public function __set($property_name,$value){
		echo "<br>这是自动调用set方法给属性赋值<br>";
		$this->$property_name = $value;
	}
	public function __get($property_name){
		echo "<br>这是自动调用了get方法获取属性的值<br>";
		if(isset($this->$property_name)){
			return $this->$property_name;
		}
		else return null;
	}
	public function intro(){
		echo "大家好，我叫".$this->name."我今年".$this->age."岁了。";
	}
}
$wu = new Student2();
$wu->name = 'potty';
$wu->age = 10;
$wu->intro();
echo "$wu->name";


// 类的构造函数,构造函数只能是__construct() # 低版本的php也将类名作为构造函数名
class Student3{
	public $name;
	public $age;
	public function __construct($name,$age){
		$this->name = $name;
		$this->age = $age;
	}
}
$lit = new Student3("kevin",18);
echo "$lit->name = $lit->age";

// 类的析构函数，在程序结束前，销毁创建的对象，释放内存，自动调用对象的析构函数
// 析构函数不带任何参数,一定是__destruct()
class Person{
	public function show(){
		echo "<br>hello，everybody！";
	}
	public function __destruct(){
		echo "<br>自动调用析构函数，对象已被销毁";
	}
}

$Jack = new Person();
$Jack->show();

// 类常量,声明时就要赋值
class Person1{
	const PI = 3.1415926;
	// 在类的内部可以用self::访问
	public function show()
	{
		echo self::PI."<br>";
	}
	// 可以用类名::访问
	public function display()
	{
		echo Person1::PI."<br>";
	}
}
// 可以在类外面直接访问
echo "<br>".Person1::PI."<br>";
// 实例化对象再访问
$obj = new Person1();
$obj->show();
$obj->display();

// 静态成员
// 静态属性-和类常量一样的意义，让类的所有对象都共享一份数据
class School{
	public static $school = "ShenZhen University";
	public function show()
	{
		echo "<br>my school is ".self::$school;
	}
}

$kevin = new School();
// $school是静态属性，所以只能用::访问
// 虽然属性值公开，但是不能直接赋值
// $kevin->school = "yucai";
echo "<br>my school: ".$kevin::$school;
// 因为function不是静态的，所以仍然用->来访问该方法
$kevin->show();

// 静态方法
// 静态方法一般是用来操作静态属性的
class School2{
	public static $school = "ShenZhen University";
	public static function show(){
		echo "<br>my school is: ".self::$school;
	}
}
// 静态方法不用声明对象即可使用
echo "<br>没有声明对象".School2::show();
// 重新定义一个类
$kevin = new School2();
echo "<br>声明了对象也是一样的".$kevin::show();


// 继承 extends关键词
class Animal{
	private $name;
	public function shout()
	{
		echo "<br>animal shouts..";
	}
	public function __set($property_name,$value){
			
			$this->property_name = $value;
	}
	public function __get($property_name)
	{
		if (isset($this->property_name)) {
			return $this->property_name;
		}
		else return null;
	}
}

class Cat extends Animal{
	// 虽然cat里面没有name属性，但是从animal里继承了属性
	public function getName(){
		echo "<br>Dog's name is $this->name";
	}
}

$Spotty = new Cat();
$Spotty->name = "Spotty";
$Spotty->getName();

// 重写父类方法
class Dog{
	// 方法名一定要和父类一样
	public function shout()
	{
		echo "<br>狗在汪汪叫。。";
	}
}
$Will = new Dog();
$Will->shout();

// 重写父类方法时也可以在父类的基础上添加功能
class Wolf extends Animal{
	public function shout()
	{
		// 直接将父类中的方法给调用进来 
		parent::shout();
		echo "<br>嗷呜~";
	}
}

$hui = new Wolf();
$hui->shout();

// 抽象类-当一个类的功能还没有想好时
abstract class People{
	// 函数体是空的，不能添加
	abstract public function eat();
}

// 子类继承抽象类，必须实现抽象类的方法
class Man extends People{
	public function eat(){
		echo "<br>men are eating";
	}
}
class Woman extends People{
	public function eat(){
		echo "<br>women are eating";
	}
}

$ming = new Man();
$hong = new Woman();
$ming->eat();
$hong->eat();


// 当抽象类中的方法全是抽象方法时，这个类可以定义为一个接口
interface Animals{
	// 已经是接口了，就不需要再用abstract关键字了
	public function shout();
	public function eat();
}

// 继承接口时用implements
class Monkey implements Animals{
	public function shout(){
		echo "<br>猴子在叫hhh";
	}
	public function eat(){
		echo "<br> this monkey is eating ";
	}
}

$xie = new Monkey();
$xie->shout();
$xie->eat();

// 一个类可以同时实现多个接口
interface Kids{
	public function play();
}
interface Parents{
	public function beAlong();
}
class Baby implements Kids,Parents{
	public function play()
	{
		echo "<br>I am playing";
	}
	public function beAlong()
	{
		echo "<br>duang duang duang";
	}
}
$lily = new Baby();
$lily->play();
$lily->beAlong();




// 多态

// 定义一个接口
abstract class Stu{
	public abstract function dtm();
}
// 定义两个子类继承父类
class Ming extends Stu{
	public function dtm()
	{
		echo "<br>This is xiaoming";
	}
}
class Hong extends Stu{
	public function dtm()
	{
		echo "<br>This is xiaohong";
	}
}

function getPerson($obj){
	if ($obj instanceof Stu) {
		$obj->dtm();
	}
	else echo "<br> Your obj is wrong";
}

$stu1 = new Ming();
$stu2 = new Hong();

getPerson($stu1);
getPerson($stu2);
getPerson($lily);

 ?>
</body>
</html>
