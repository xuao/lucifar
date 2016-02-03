<?php 

	// 1、 ask for input
	fwrite(STDOUT, "Enter your name: ");

	$name = trim(fgets(STDIN));
	fwrite(STDOUT, "Enter your lastname: ");

	$lastname = trim(fgets(STDIN));
	// get input
	

	// write input back
	fwrite(STDOUT, "Hello, $name.$lastname!");

	// 2、$argv的用法
	// print_r($argv);//$argv记录你输入的php命令后的参数，以空格为区分拆成数组。

	// 3、$argv 和 $argc 的用法
	// first argument is always name of script!
	// if ($argc != 4) {
	// die("Usage: book.php <check-in-date> <num-nights> <room-type> ");
	// }

	// // remove first argument
	// array_shift($argv);

	// // get and use remaining arguments
	// $checkin = $argv[0];
	// $nights = $argv[1];
	// $type = $argv[2];
	// echo "You have requested a $type room for $nights nights, checking in on $checkin. Thank you for your order! ";
?>