<?php
$login = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина емайла";
    exit();
} elseif (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
	echo "Недопустимая длина имени";
    exit();
} elseif (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo "Недопустимая длина пароля (от 2 до 6 символов)";
    exit();
}

//$pass = md5($pass . 'qweeqwweqweqweewq1123');

$mysql = new mysqli('localhost', 'root', 'root', 'cursa4');
$mysql->query("INSERT INTO `table1` (`email` , `password` , `name`)
VALUES('$login','$pass','$name') ");
$mysql->close();

header('Location:/2.html');
?>