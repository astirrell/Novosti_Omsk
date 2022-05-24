<?php
session_start();
if(isset($_SESSION['Login']))
{
    header("Location: /index/index.php");
}
session_write_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация/Авторизация</title>
    <link type="text/css" href="style.css" rel="stylesheet">
	<link type="text/css" href="login.css" rel="stylesheet">
</head>
<body>

<style>
input{
	border: solid 2px black;
}
</style>

<div class="form">
	<form action="/index/login/signin.php" method="post">
		<p>
		<input  type='email' name="Email" placeholder="Введите свой Email">
		</p>
		<p>
		<input  type="Password" name="Password" placeholder="Введите свой пароль">
		</p>
		<button type="submit">Войти</button>
		<p>
			<div><a href="/index/register.php" class="text">Зарегистрируйтесь!</a></div>
		</p>
		<p>
			<div><a href="/index/index.php" class="text">На главную!</a></div>
		</p>
	</form>
</div>





















</body>
</html>