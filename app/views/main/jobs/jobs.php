<?php require_once('app/config/mas.php') ?>
<div class="section">
  <div class="row">
    <!-- <div class="col l3 m3 s12 offset-s1 offset-l1 offset-m1">
      <h4>Фильтр вакансий</h4>
      <form action="/jobs" method="GET" class="ajax">
        <h6>Старана:</h6>
        <p><label><input type="checkbox" name="country[]" value="pol"><span>Польша: Север</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="pol"><span>Польша: Юг</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="pol"><span>Польша: Запад</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="pol"><span>Польша: Восток</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="cze"><span>Чехия</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="ger"><span>Германия</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="nor"><span>Норвегия</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="lit"><span>Литва</span></label></p>
        <p><label><input type="checkbox" name="country[]" value="lat"><span>Латвия</span></label></p>
        <h6>Зарплата (PLN):</h6>
        <div id="salary-slider" style="max-width:250px;"></div><br>
        <input style="position:fixed; top:-100000px;" type="text" id="min-salary" name="minSalary">
        <input style="position:fixed; top:-100000px;" type="text" id="max-salary" name="maxsalary">
        <button class="btn waves-effect waves-light" type="submit">Фильтровать</button>
      </form>
    </div> -->

    <div class="col l7 m7 s12 offset-l3 offset-m2">
      <?php if (empty($list)): ?>
        <h4>Доступный вакансий нет</h4>
        <?php else: ?>
          <h4>Список вакансий</h4>
          <?php foreach ($list as $val): ?>
            <div class="row jobs-form" style="margin: 13px 1px;">
              <div class="col s12">
                <p><b><?php echo $val["name"]; ?></b></p>
                <div class="col l4 m6 s12">
                  <?php
                  $country_key = $val["country"];
                  $sex_key = $val["sex"];
                  ?>
                  <img class="z-depth-2" src="/public/images/flag/<?php echo $val["country"]; ?>.png" alt="Польша" style="width:20px;"> <?php echo $country_mas[$country_key]; ?>
                  <div class="row">
                    <div class="col s6">
                      <p>Пол:</p>
                      <p>Возраст:</p>
                      <p>Опыт работы:</p>
                    </div>
                    <div class="col s6">
                      <p><b><?php echo $sex_mas[$sex_key]; ?></b></p>
                      <p><b><?php echo $val["age"]; ?></b></p>
                      <p><b><?php echo $val["experience"]; ?></b></p>
                    </div>
                  </div>
                </div>
                <div class="col l4 m6 s6">
                  <span class="red-text"><b>Зарплата:</b></span>
                  <p>PLN≈<?php echo $val["salary"]; ?></p>
                </div>
                <div class="col l4 m12 s12 hide-on-med-and-down show-on-large">
                  <img style="width:230px;" src="/public/images/jobs/<?php echo $val["id"]; ?>.jpg" alt="">
                </div>
                <div class="col l12 m12 s12">
                  <a href="/jobs/<?php echo $val["url"]; ?>" class="btn waves-effect waves-light light-blue lighten-1d">Подробнее</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php if ($pagination) echo $pagination; ?>
      <!-- <ul class="pagination center">
        <li class="waves-effect waves-teal"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="waves-effect waves-teal active"><a href="/jobs/1">1</a></li>
        <li class="waves-effect waves-teal"><a href="/jobs/2">2</a></li>
        <li class="waves-effect waves-teal"><a href="/jobs/3">3</a></li>
        <li class="waves-effect waves-teal"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
      </ul> -->
    </div>
  </div>
</div>