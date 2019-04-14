<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="/public/styles/materialize.css">
	<link rel="stylesheet" href="/public/styles/style.css">
	<link rel="shortcut icon" href="public/images/favicon.png" type="image/x-icon">

	<script src="/public/scripts/jquery.js"></script>
  <script src="/public/scripts/materialize.js"></script>
	<script src="/public/scripts/nicescroll.js"></script>
  <script src="/public/scripts/script.js"></script>

	<title>Авторизация в панель администратора</title>
	<style>
		body {
			background-color: #343a40;
		}
	</style>
</head>
<body>
		<div class="kubik_forma center-el">
			<div class="head">
				Вход в панель администратора
			</div>
			<div class="body">
				<form action="/admin/login" method="post" class="ajax">
					<label>Логин</label>
					<input type="text" name="login">
					<label>Пароль</label>
					<input type="password" name="password">
					<button class="btn waves-effect light-blue darken-4" type="submit">Вход</button>
				</form>
			</div>
		</div>
</body>
</html>