<?php
/**
 * Created by PhpStorm.
 * User: reidbrownell
 * Date: 2/20/18
 * Time: 8:59 AM
 */


Class Calculator {

	var $one;
	var $two;

	public function __construct($one, $two)
	{
		$this->one = $one;
		$this->two = $two;
	}

	public function add(){
		$total = $this->one + $this->two;
		return $total;
	}

	public function multiply(){
		$total = $this->one * $this->two;
		return $total;
	}

	public function divide(){
		$total = $this->one / $this->two;
		return $total;
	}

	public function subtract(){
		$total = $this->one - $this->two;
		return $total;
	}

}

$calc = new Calculator (100, 5);
echo $calc->add();
echo '<br>';
echo $calc->multiply();
echo '<br>';
echo $calc->divide();
echo '<br>';
echo $calc->subtract();



$var1 = 1;
$var2 = 3;

if ($var1 == $var2){
	echo 'The values are equal';
}

if ($var1 > $var2){
	echo 'The first value is larger than the second value<br>';
}

if ($var1 <= $var2){
	echo 'The first value is less than or equal to the second value<br>';
}

if ($var1 != $var2){
	echo 'The first value is not equal to the second value<br>';
}



$sql =  "CREATE TABLE mydatabase.members﻿﻿ (first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, age int NOT NULL, date_joined DATE NOT NULL);";

$insert =          "INSERT INTO members (first_name, last_name, age, date_joined) 
		  VALUES( 'Jo','Scrivener', 31 , '09/03/2006'),
		  		('Marty', 'Pareene', 19, '01/07/2007'),
		  		('Nick', 'Blakeley', 23, '08/19/2007'),
		  		('Bill', 'Swan', 20, '06/11/2007'),
		  		('Jane', 'Field', 20, '03/03/2006');";

$select = SELECT * FROM members WHERE age < 25;
foreach ($select as $member){
	print_r($member);
}