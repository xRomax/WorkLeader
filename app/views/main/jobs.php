<div class="section">
  <div class="row">
    <div class="col l3 m3 s12 offset-s1 offset-l1 offset-m1">
      <h4>Фильтр вакансий</h4>
      <form action="#!" method="GET">
        <h6>Старана:</h6>
        <p><label><input type="checkbox" name="country" value="cze"><span>Чехия</span></label></p>
        <p><label><input type="checkbox" name="country" value="pol"><span>Польша</span></label></p>
        <p><label><input type="checkbox" name="country" value="ger"><span>Германия</span></label></p>
        <p><label><input type="checkbox" name="country" value="nor"><span>Норвегия</span></label></p>
        <p><label><input type="checkbox" name="country" value="lit"><span>Литва</span></label></p>
        <p><label><input type="checkbox" name="country" value="lat"><span>Латвия</span></label></p>
        <h6>Проживание:</h6>
        <div class="switch">
          <label>Без<input type="checkbox" name="house" value="true"><span class="lever"></span>Включено</label>
        </div><br>
        <h6>Зарплата:</h6>
        <div id="salary-slider"></div>
        <button class="btn waves-effect waves-light" type="submit">Фильтровать</button>
      </form>
    </div>

    <div class="col l7 m7 s12">
      <h4>Список вакансий</h4>
      <div class="row jobs-form">
        <div class="col s12">
          <p><b>В пансионат по уходу за пожилыми людьми требуеться медсестра</b></p>
          <div class="col l4 m6 s12">
            <img class="z-depth-2" src="/public/images/flag/pol.png" alt="Польша" style="width:20px;"> Польшa
            <div class="row">
              <div class="col s6">
                <p>Пол:</p>
                <p>Возраст:</p>
                <p>Опыт работы:</p>
              </div>
              <div class="col s6">
                <p><b>Женщина</b></p>
                <p><b>18-40 лет</b></p>
                <p><b>От 1 года</b></p>
              </div>
            </div>
          </div>
          <div class="col l4 m6 s6">
            <span class="red-text"><b>Зарплата:</b></span>
            <p>UAH≈ 20000</p>
            <p>USD≈ 900</p>
            <p>EUR≈ 1100</p>
          </div>
          <div class="col l4 m12 s12 hide-on-med-and-down show-on-large">
            <img style="width:230px;" src="/public/images/jobs/med.jpg" alt="">
          </div>
          <div class="col l12 m12 s12">
            <a href="jobs/med_sestra" class="btn waves-effect waves-light light-blue lighten-1d">Подробнее</a>
          </div>
        </div>
      </div>

      <div class="row jobs-form">
        <div class="col s12">
          <p><b>Сварщик на предприятие</b></p>
          <div class="col l4 m6 s12">
            <img class="z-depth-2" src="/public/images/flag/lith.png" alt="Литва" style="width:20px;"> Литва
            <div class="row">
              <div class="col s6">
                <p>Пол:</p>
                <p>Возраст:</p>
                <p>Опыт работы:</p>
              </div>
              <div class="col s6">
                <p><b>Мужской</b></p>
                <p><b>18-50 лет</b></p>
                <p><b>От 2 лет</b></p>
              </div>
            </div>
          </div>
          <div class="col l4 m6 s6">
            <span class="red-text"><b>Зарплата:</b></span>
            <p>UAH≈ 15000</p>
            <p>USD≈ 750</p>
            <p>EUR≈ 800</p>
          </div>
          <div class="col l4 m12 s12 hide-on-med-and-down show-on-large">
            <img style="width:230px;" src="/public/images/jobs/swar.jpeg" alt="">
          </div>
          <div class="col l12 m12 s12">
            <a href="jobs/swarshik" class="btn waves-effect waves-light light-blue lighten-1d">Подробнее</a>
          </div>
        </div>
      </div>

      <div class="row jobs-form">
        <div class="col s12">
          <p><b>Упаковщик покупок в магазине</b></p>
          <div class="col l4 m6 s12">
            <img class="z-depth-2" src="/public/images/flag/ger.png" alt="Германия" style="width:20px;"> Германия
            <div class="row">
              <div class="col s6">
                <p>Пол:</p>
                <p>Возраст:</p>
                <p>Опыт работы:</p>
              </div>
              <div class="col s6">
                <p><b>Любой</b></p>
                <p><b>18-60 лет</b></p>
                <p><b>Не требуется</b></p>
              </div>
            </div>
          </div>
          <div class="col l4 m6 s6">
            <span class="red-text"><b>Зарплата:</b></span>
            <p>UAH≈ 12000</p>
            <p>USD≈ 600</p>
            <p>EUR≈ 700</p>
          </div>
          <div class="col l4 m12 s12 hide-on-med-and-down show-on-large">
            <img style="width:230px;" src="/public/images/jobs/upak.jpeg" alt="">
          </div>
          <div class="col l12 m12 s12">
            <a href="jobs/upak" class="btn waves-effect waves-light light-blue lighten-1d">Подробнее</a>
          </div>
        </div>
      </div>
      
      <ul class="pagination center">
        <li><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect waves-teal active"><a href="#!">1</a></li>
        <li class="waves-effect waves-teal"><a href="#!">2</a></li>
        <li class="waves-effect waves-teal"><a href="#!">3</a></li>
        <li class="waves-effect waves-teal"><a href="#!">4</a></li>
        <li class="waves-effect waves-teal"><a href="#!">5</a></li>
        <li class="waves-effect waves-teal"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
      </ul>
    </div>
  </div>
</div>