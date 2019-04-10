<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="/public/styles/materialize.css">
  <link rel="stylesheet" href="/public/styles/swiper.css">
	<link rel="stylesheet" href="/public/styles/style.css">
	<link rel="shortcut icon" href="/public/images/favicon.png" type="image/x-icon">

  <script src="/public/scripts/jquery.js"></script>
  <script src="/public/scripts/jquery.maskedinput.js"></script>
  <script src="/public/scripts/materialize.js"></script>
  <script src="/public/scripts/nicescroll.js"></script>
  <script src="/public/scripts/swiper.js"></script>
  <script src="/public/scripts/script.js"></script>
  

	<title>WorkLeader | Работа в Европейских странах</title>
</head>
<body>
  <div class="navbar-fixed">
    <ul id="services_dropdown" class="dropdown-content" style="width: 144px;">
      <li style="height:64px;"><a style="height:100%;" href="/services"><h6>Услуги</h6></a></li>
      <li class="divider"></li>
      <li><a href="/services/job_in_poland">Трудоустройство в Польше</a></li>
      <li><a href="/services/find_jobs">Подбор вакансий</a></li>
      <li><a href="/services/open_company">Открытие фирмы</a></li>
    </ul>
    <nav class="white" role="navigation">
        <div class="nav-wrapper">
          <a id="logo-container" href="/" class="brand-logo">WorkLeader</a>
          <a id="tel-number" class="brand-logo center teal-text text-lighten-2" href="tel:0985847073">+38(098)-584-70-73</a>
          <a href="tel:0685551526">+38(068)-555-15-26</a>
          <ul class="right hide-on-med-and-down">
            <li id='index'><a href="/">Главная</a></li>
            <li id='services' class="dropdown-trigger" data-target="services_dropdown"><a href="/services">Услуги<i class="material-icons right">arrow_drop_down</i></a></li>
            <li id='jobs'><a href="/jobs">Вакансии</a></li>
            <li id='about'><a href="/about">О нас</a></li>
            <li id='news'><a href="/news">Новости</a></li>
            </ul>
          
          <ul id="nav-mobile" class="sidenav">
            <li id='index'><a href="/">Главная</a></li>
            <li id='jobs'><a href="/jobs">Вакансии</a></li>
            <li id='services'><a href="/services">Услуги</a></li>
            <li id='about'><a href="/about">О нас</a></li>
            <li id='news'><a href="/news">Новости</a></li>
            </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
      </nav>
  </div>

  <?php echo $content; ?>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row section scrollspy" id="contacts">
        <div class="col l4 s12">
          <h5 class="white-text">Работа и виза - наша специализация</h5>
          <p class="grey-text text-lighten-4">Обратившись в нашу компанию вы получаете качественный сервис, наш консультант ответит вам в любое время 24/7, абсолютно полное ведение до результата, пунктуальные сроки получения документов на руки, бесплатные консультации по каждому аспекту жизни в польше, начиная от экономии финансов до покупки авто и аренды жилья.</p>
          </div>
          <div class="col l3 offset-l1 s12">
              <h5 class="white-text">Контакты</h5>
              <ul>
                <li><a class="white-text" href="tel:0985847073"><i class="fas fa-phone font-icons"></i>098 584 70 73</a></li>
                <li><a class="white-text" href="tel:0685551526"><i class="fas fa-phone font-icons"></i>068 555 15 26</a></li>
                <li><a class="white-text" href="mailto:workleaderandco@gmail.com"><i class="fas fa-envelope font-icons"></i>workleaderandco@gmail.com</a></li>
                <li><a class="white-text" href="mailto:johnsonhayes123@gmail.com"><i class="fas fa-envelope font-icons"></i>johnsonhayes123@gmail.com</a></li>
                </ul>
              <h5 class="white-text">Документы</h5>
              <ul>
                  <li><a target="_blank" class="white-text" href="public/img/sertif.png"><i class="far fa-file font-icons"></i>Сертификат №17726</a></li>
                </ul>
          </div>
          <div class="col l3 offset-l1 s12">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1065868911778!2d35.055717300566364!3d48.45773694038088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1b7637877a2bf153!2z0JrQvtGA0L_Rg9GBIOKEljMg0JTQndCjINGW0Lwg0J4u0JPQvtC90YfQsNGA0LAsINCk0LDQutGD0LvRjNGC0LXRgiDQn9GA0LjQutC70LDQtNC90L7RlyDQvNCw0YLQtdC80LDRgtC40LrQuA!5e0!3m2!1sru!2sua!4v1550962120097" width="300px;" height="300px;" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    <div class="footer-copyright">
      <div class="container right-align">
        Компания WorkLeader &COPY; 2019
        </div>
      </div>
    </footer>
    
  <div id="modal1" class="modal">
    <div class="modal-content modalForm row">
        <form action="/jobs" method="post" class="col s12 ajax">
          <input type="hidden" name="type" value="modalForm">
          <div class="row">
            <div class="input-field col f6 m6 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="name">
              <label for="icon_prefix">Имя</label>
            </div>

            <div class="input-field col f6 m6 s12">
              <i class="material-icons prefix">phone</i>
              <input id="icon_telephone" type="tel" name="phone">
              <label for="icon_telephone">Номер телефона</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">textsms</i>
                <textarea id="textarea1" class="materialize-textarea" name="text"></textarea>
                <label for="textarea1">Коментарий</label>
              </div>
            </div>

            <button type="submit" class="btn waves-effect waves-light formReset">
              Отправить<i class="material-icons right">send</i>
            </button>
            </div>
          </form>
      </div>
  </div>
  
	<div class="fixed-action-btn ">
		<a class="btn-floating btn-large red pulse tooltipped" data-position="left" data-tooltip="Связаться с нами"><i class="large material-icons">contacts</i></a>
		<ul>
		  <li><a class="btn-floating btn-large waves-effect waves-light blue accent-4"  href="https://www.facebook.com/WorkLeaderandCo/" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a></li>
		  <!-- <li><a class="btn-floating btn-large waves-effect waves-light pink darken-2"  href="#!"><i class="fab fa-instagram fa-3x"></i></a></li>
      <li><a class="btn-floating btn-large waves-effect waves-light blue darken-2"  href="#!"><i class="fab fa-vk fa-3x"></i></a></li>
      <li><a class="btn-floating btn-large waves-effect waves-light blue lighten-1" href="#!"><i class="fab fa-telegram fa-3x"></i></a></li> -->
      <li><a class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="left" data-tooltip="Позвоните нам" href="tel:380986670836"><i class="fas fa-phone fa-3x"></i></a></li>
      <li><a class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Заказать консультацию" href="#modal1"><i class="large material-icons">message</i></a></li>
		</ul>
	</div>
    
</body>
</html>