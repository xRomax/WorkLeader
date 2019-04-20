
<?php require_once('app/config/mas.php');

$start_min = 2200; $start_max = 6000;
if (!empty($_GET['minsalary'])) $start_min = $_GET['minsalary'];
if (!empty($_GET['maxsalary'])) $start_max = $_GET['maxsalary'];
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
       'min': 2200,
       'max': 6000
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
    <div class="col l3 m3 s12 offset-s1 offset-l1 offset-m1">
      <h4>Фильтр вакансий</h4>
      <form action="/jobs" method="GET" class="">
        <h6>Старана:</h6>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('pol',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="pol"><span>Польша</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('cze',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="cze"><span>Чехия</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('ger',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="ger"><span>Германия</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('nor',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="nor"><span>Норвегия</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('lith',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="lith"><span>Литва</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('est',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="est"><span>Эстония</span></label></p>
        <p><label><input <?php if (!empty($_GET['country'])) if (in_array('ukr',$_GET['country'])) echo 'checked="checked"'; ?> type="checkbox" name="country[]" value="ukr"><span>Украина</span></label></p>
        <h6>Зарплата (EUR):</h6>
        <div id="salary-slider" style="max-width:250px;"></div><br>
        <input style="position:fixed; top:-100000px;" type="text" id="min-salary" name="minsalary">
        <input style="position:fixed; top:-100000px;" type="text" id="max-salary" name="maxsalary">
        <button class="btn waves-effect waves-light" type="submit">Фильтровать</button>
      </form>
    </div>

    <div class="col l7 m7 s12">
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
                  <p>EUR≈<?php echo $val["salary"]; ?></p>
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
    </div>
  </div>
</div>