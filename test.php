<?php

$existUsers = [
	'test1@test.com',
	'test2@test.com',
	'test3@test.com',
	'test4@test.com',
	'test5@test.com',
	'test6@test.com',
	'test7@test.com',
	'test8@test.com',
	'test10@test.com'
];


$userPass = $_POST['userPass'];
$userRepeatPass = $_POST['userRepeatPass'];

if ($userPass != $userRepeatPass) {
	echo 0;
	die();
}

$file = fopen("logs.txt","a");

date_default_timezone_set('Europe/Moscow');
$date = date('d/m/Y H:i:s');

$email = $_POST['userEmail'];

if (in_array($email, $existUsers)) {
	echo 1;
	fwrite($file, $date . ' Пользователь с email\'ом ' . $email . ' уже существует'."\n");
}
else {
	echo 2;
	fwrite($file, $date . ' Пользователь с email\'ом ' . $email . ' успешно зарегистрирован'."\n");
}

fclose($file);

?>