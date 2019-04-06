<div class="kubik_forma">
	<ul class="collapsible" data-collapsible="accordion">
		<li class="active">
			<div class="collapsible-header active"><i class="material-icons">lock_open</i>Авторизация</div>
			<div class="collapsible-body">
				<form action="index.php" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input required name="elogin" type="text" class="validate">
							<label for="elogin">Логін</label>
					</div>
						</div>
					<div class="row">
						<div class="input-field col s12">
							<input required name="epass" type="password" class="validate">
							<label for="epass">Пароль</label>
						</div>
					</div>
					<input class="waves-light btn" name="logined" type="submit" value="Вхід">
				</form>
			</div>
		</li>
	</ul>
</div>