<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://materializecss.com/extras/noUiSlider/nouislider.css">
	<link rel="stylesheet" href="/public/styles/style-admin.css">
	<link rel="shortcut icon" href="/public/images/favicon.png" type="image/x-icon">

  <script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://materializecss.com/extras/noUiSlider/nouislider.js"></script>
  <script src="/public/scripts/script-admin.js"></script>
</head>
<body>
<?php if ($this->route["action"] != "login"): ?>
  <div class="section hide-on-large-only" style="background-color: #343a40; padding: 1px;">
    <a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons medium">menu</i></a>
  </div>
  <ul id="nav-mobile" class="sidenav sidenav-fixed">
    <li class="logo"><img style="padding: 6px;" src="/public/images/logo.png" alt="WorkLeader" height="64"></li>
    <li class="no-padding">
      <ul class="collapsible expandable">
        <li class="bold"><a class="collapsible-header waves-effect waves-light"><i class="fas fa-user fa-1x"></i>Вакансии</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="/admin/jobsAdd">Добавить</a></li>
              <li><a href="/admin/jobsList">Список</a></li>
              <li><a href="/admin/jobsHot">Горячие вакансии</a></li>
              <li><a href="/admin/currency">Курс валют</a></li>
            </ul>
          </div>
        </li>
<<<<<<< HEAD

        <li class="bold"><a class="collapsible-header waves-effect waves-light"><i class="fas fa-book fa-1x"></i>Статьи</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="/admin/articlesAdd">Добавить</a></li>
              <li><a href="/admin/articlesList">Список</a></li>
            </ul>
          </div>
        </li>
=======
>>>>>>> master
        
        <li class="bold"><a class="collapsible-header waves-effect waves-light" ><i class="fas fa-newspaper fa-1x"></i>Новости</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="/admin/newsAdd">Добавить</a></li>
              <li><a href="/admin/newsList">Список</a></li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-light" ><i class="fas fa-comments fa-1x"></i>Отзывы</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="/admin/reviewsModerationList">Модерация</a></li>
              <li><a href="/admin/reviewsList">Список</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li class="bold"><a href="/admin/logout" class="waves-effect waves-light"><i class="fas fa-sign-out-alt fa-2x"></i>Выход</a></li>
  </ul>

<?php endif; ?>

<main>
  <?= $content; ?>
</main>
  
</body>
</html>