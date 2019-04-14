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
</head>
<body>
<?php if ($this->route["action"] != "login"): ?>
<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  <div class="container">
    <div class="row">
      <div class="col s3">
        <ul id="nav-mobile" class="sidenav sidenav-fixed blue-grey">
          <li class="logo"><img src="/public/images/logo.png" alt="WorkLeader" style="width: 100%;"></li>
          <li class="bold"><a href="/admin" class="waves-effect waves-teal">Главная</a></li>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Вакансии</a>
                <div class="collapsible-body blue-grey darken-1">
                  <ul>
                    <li><a href="#!">Список</a></li>
                    <li><a href="#!">Добавить</a></li>
                  </ul>
                </div>
              </li>
              <li class="bold"><a class="collapsible-header waves-effect waves-teal" tabindex="0">Фильтры</a>
                <div class="collapsible-body blue-grey darken-1">
                  <ul>
                    <li><a href="#!">Список</a></li>
                    <li><a href="#!">Добавить</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li class="bold"><a href="/logout" class="waves-effect waves-teal bold">Выход</a></li>
        </ul>
      </div>
<?php endif; ?>
      <div class="col s9">
        <div class="container">
					<?php echo $content; ?>
        </div>

      </div>
    </div>
  </div>

</body>
</html>