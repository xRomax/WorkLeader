<?php 
  // debug($list); 
?>
<title>Список вакансий от компании WorkLeader | Работа в Европейских странах</title>
<?php require_once('app/config/mas.php');
$start_min = $salary['min']; $start_max = $salary["max"];
if (!empty($_GET['min'])) $start_min = $_GET['min'];
if (!empty($_GET['max'])) $start_max = $_GET['max'];
?>

<script>
$(document).ready(function(){
  var slider = document.getElementById('salary-slider');
  noUiSlider.create(slider, {
    start: [<?php echo $start_min; ?>, <?php echo $start_max; ?>],
    connect: true,
    step: 100,
    orientation: 'horizontal',
    range: {
      'min': <?php echo $salary['min']; ?>,
      'max': <?php echo $salary['max']; ?>
    },
    format: wNumb({
      decimals: 0,
    })
  });

  setInterval(function() {
    let salary = slider.noUiSlider.get();
    let Salary = Array.from(salary);
    $("#min-salary").val(Salary[0]);
    $("#max-salary").val(Salary[1]);
  }, 100);


});
</script>
<div class="section">
  <div class="row">
    <div class="col l3 m3 s12 offset-l1 offset-m1">
      <h4>Фильтр вакансий</h4>
      <form action="/jobs" method="GET" class="">
        <ul class="collapsible expandable">
          <li class="active" id="scroll-country-head">
            <div class="collapsible-header"><i class="fas fa-globe-europe"></i>Страна:</div>
            <div id="scroll-country-body" style="padding: 0 20px;border-bottom: 1px solid #ddd; height:250px;">
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('pol',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="pol"><span>Польша</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('cze',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="cze"><span>Чехия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('ger',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="ger"><span>Германия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('eng',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="eng"><span>Англия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('nor',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="nor"><span>Норвегия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('fin',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="fin"><span>Финляндия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('lit',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="lit"><span>Литва</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('lat',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="lat"><span>Латвия</span></label></p>
              <p><label><input <?php if (!empty($_GET['country'])) if (in_array('est',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="est"><span>Эстония</span></label></p>
            </div>
          </li>
          <li <?php if (isset($_GET['sex'])) echo "class='active'" ?>>
            <div class="collapsible-header"><i class="fas fa-venus-mars"></i>Пол:</div>
            <div class="collapsible-body">
              <label>
                <input class="with-gap" name="sex" value="male" type="radio" <?php if (!empty($_GET['sex'])) if ($_GET["sex"] == 'male') echo 'checked' ?> />
                <span>Мужской</span>
              </label>
              <label>
                <input class="with-gap" name="sex" value="female" type="radio" <?php if (!empty($_GET['sex'])) if ($_GET["sex"] == 'female') echo 'checked' ?> />
                <span>Женский</span>
              </label>
              <label>
                <input class="with-gap" name="sex" value="all" type="radio" <?php if (!empty($_GET['sex'])) if ($_GET["sex"] == 'all') echo 'checked' ?> />
                <span>Любой</span>
              </label>
            </div>
          </li>
          <li <?php if (isset($_GET['min']) or isset($_GET['max'])) echo "class='active'" ?>>
            <div class="collapsible-header"><i class="fas fa-euro-sign"></i>Зарплата (EUR):</div>
            <div class="collapsible-body">
              <div id="salary-slider" style="margin-top:12px;"></div>
              <input style="position:fixed; top:-100000px;" type="text" id="min-salary" name="min">
              <input style="position:fixed; top:-100000px;" type="text" id="max-salary" name="max">
            </div>
          </li>
        </ul>
        <div class="row">
          <div class="col l6 m6 s12">
            <button class="btn waves-effect waves-light" type="submit">Фильтровать</button>
          </div>
          <div class="col l6 m6 s12">
            <a class="btn waves-effect waves-light" href="/jobs/">Сбросить фильтр</a>
          </div>

        </div>
      </form>
    </div>

    <div class="col l7 m7 s12 result">
      <?php if (empty($list)): ?>
        <h4>Доступный вакансий нет</h4>
        <?php else: ?>
          <h4>Список вакансий</h4>
          <?php foreach ($list as $val): ?>
            <?php $country_key = $val["country"]; $sex_key = $val["sex"]; ?>
            <div class="row jobs-form" style="margin: 13px 1px;">
              <p style="margin-left:10px;"><b><?php echo $val["name"]; ?></b></p>
              <div class="col l4 m6 s12">
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
              <div class="col l3 m6 s6">
                <span class="red-text"><b>Зарплата:</b></span>
                <p>EUR≈<?php echo $val["salary"]; ?></p>
                <?php
                $currency_key = $val['country'];
                $currency_code = $country_to_currency[$currency_key];
                  if ($currency_code != 'EUR') {
                    $result = ceil($val['salary'] * $currency->$currency_code);
                    echo "<p>$currency_code"."≈$result</p>";
                  }
                $result1 = ceil($val['salary'] * $currencyUAH->rate);
                echo "<p>UAH≈$result1</p>";
                ?>
              </div>
              <div class="col l4 hide-on-med-and-down show-on-large">
                <img style="width:120%; " src="/public/images/jobs/<?php echo $val["id"]; ?>.jpg" alt="">
              </div>
              <div class="col l12 m6 s6">
                <a target="_blank" href="/jobs/<?php echo $val["url"]; ?>" class="btn waves-effect waves-light light-blue lighten-1d">Подробнее</a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php if ($pagination) echo $pagination; ?>
    </div>
  </div>
</div>