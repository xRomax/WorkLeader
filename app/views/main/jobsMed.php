<br>
<div class="container">
  <div class="row">
    <div style="margin-top:15px;" class="col l3 m12 s12 jobs-form"><br>
      <b>Спроси нас о вакансии</b>
      <form action="/jobs/med_sestra" method="post" class="modalForm ajax">
        <input style="position:fixed; top:-100000px;" type="reset">
        <input type="hidden" name="type" value="modalForm">
        <div class="col l12 m6 s6">
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="name" name="name">
            <label for="name">Имя</label>
          </div>
        </div>
          
        <div class="col l12 m6 s6">
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="text" id="icon_telephone" name="phone">
            <label for="icon_telephone">Телефон</label>
          </div>
        </div>
        <div class="col s12">
          <div class="input-field">
            <i class="material-icons prefix">textsms</i>
            <input type="text" id="text" name="text">
            <label for="text">Ваш вопрос</label>
          </div>
        </div>
        <div class="col s12 center">
          <button class="btn waves-effect waves-light" type="submit">Отправать
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>

    <div style="margin-top:15px;" class="col m7  offset-m1 s12 jobs-form hide-on-med-and-down show-on-large">
      <div class="col m3 s4">
        <p>Страна:</p>
        <p>Пол:</p>
        <p>Возраст:</p>
        <p>Опыт работы:</p>
        <p>Обязаности:</p>
        <p>Условия трудоустройства:</p>
        <p>Условия проживания:</p>
        <p>Зарплата:</p>
      </div>

      <div class="col m9 s8">
        <p><img class="z-depth-2" src="/public/images/flag/pol.png" alt="Польша" style="width:20px;"> Польшa</p>
        <p>Женский</p>
        <p>18-50 лет</p>
        <p>от 1 года</p>
        <p>уход за больными, контроль приёма лекерств пациентов, капельницы по необходимости, навыки ставить уколы</p>
        <p>наличие диплома медсестры</p>
        <p>Предоставляется бесплатно в пансионате</p>
        <p>PLN= 2400-2600 <br> UAH=15000-25000 <br> USD = 750 - 1200 <br> EUR = 950 - 1800</p>
      </div>
    </div>

    <div style="margin-top:15px;" class="col s12 jobs-form hide-on-large-only show-on-medium-and-down">
      <p>Страна: <img class="z-depth-2" src="/public/images/flag/pol.png" alt="Польша" style="width:20px;"> Польшa</p>
      <p>Пол: Женский</p>
      <p>Возраст: 18-50 лет</p>
      <p>Опыт работы: от 1 года</p>
      <p>Обязаности:<br> уход за больными, контроль приёма лекерств пациентов, капельницы по необходимости, навыки ставить уколы</p>
      <p>Условия трудоустройства:<br> наличие диплома медсестры</p>
      <p>Условия проживания:<br> Предоставляется бесплатно в пансионате</p>
      <p>Зарплата: <br>PLN= 2400-2600 <br> UAH=15000-25000 <br> USD = 750 - 1200 <br> EUR = 950 - 1800</p>
    </div>
  </div>
    <br><br>

  <div class="feedback-block white-text">
    <h6 style="padding-top:20px;" class="center">Введите Ваши данные и наш менеджер свяжется с вами!</h6>
    <form action="/services/job_in_poland" method="post" class="bottomForm ajax">
    <input style="position:fixed; top:-100000px;" type="reset">
    <input type="hidden" name="type" value="bottomForm">
      <div class="row">
        <div class="input-field col l2 offset-l3 m4 offset-m2 s6">
          <input id="bottomName" name="name" type="text" class="validate white-text">
          <label class="white-text" for="bottomName">Имя</label>
        </div>
        <div class="input-field col l2 m4 s6">
          <input id="phone" name="phone" type="tel" class="validate white-text">
          <label class="white-text" for="phone">Телефон</label>
        </div>
        <div class="col l2 m6 offset-m4 s6 offset-s3">
          <a class="btn waves-effect waves-light btn-large blue lighten-2 sendBottomForm" style="border-radius:10px;">Отправить</a>
        </div>
      </div>
    </form>
  </div>
</div><br><br><br>