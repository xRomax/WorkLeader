<style>
	body {
		background-color: #343a40;
	}
</style>
<title>Вход в Панель Администратора</title>
<div class="auth_form center-el">
	<div class="head">Вход в панель администратора</div>
	<div class="body">
		<form action="/admin/login" method="post" class="ajax">
			<label>Логин</label>
			<input type="text" name="login">
			<label>Пароль</label>
			<input type="password" name="password">
			<button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Вход</button>
		</form>
	</div>
</div>