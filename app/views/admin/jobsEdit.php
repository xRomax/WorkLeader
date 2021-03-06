<script>

$(document).ready(function(){

  var slider_age = document.getElementById('age-slider');
  noUiSlider.create(slider_age, {
    start: [<?= $data['age_min']; ?>, <?= $data['age_max']; ?>],
    connect: true,
    step: 1,
    orientation: 'horizontal',
    range: {
      'min': 18,
      'max': 65
    },
    format: wNumb({
      decimals: 1,
    }),
  });

  setInterval(function() {
    let age = slider_age.noUiSlider.get();
    let Age = Array.from(age);
    $("#min-age").val(Age[0]);
    $("#max-age").val(Age[1]);
  }, 100);

});

</script>
<title>Редактировать вакансию "<?= $data['name']; ?>" | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Редактировать вакансию "<?= $data['name']; ?>"</div>
	<div class="body">
    <form action="/admin/jobsEdit/<?= $data['id']; ?>" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" value="<?= $data['name']; ?>" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" value="<?= $data['url']; ?>" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field">
        <select name="country">
          <option value="" disabled>Выберите страницу</option>
          <option value="cze" <?php if($data["country"] == 'cze') echo 'selected' ?>>Чехия</option>
          <option value="pol" <?php if($data["country"] == 'pol') echo 'selected' ?>>Польша</option>
          <option value="ger" <?php if($data["country"] == 'ger') echo 'selected' ?>>Германия</option>
          <option value="eng" <?php if($data["country"] == 'eng') echo 'selected' ?>>Великобритания</option>
          <option value="nor" <?php if($data["country"] == 'nor') echo 'selected' ?>>Норвегия</option>
          <option value="fin" <?php if($data["country"] == 'fin') echo 'selected' ?>>Финляндия</option>
          <option value="lit" <?php if($data["country"] == 'lit') echo 'selected' ?>>Литва</option>
          <option value="lat" <?php if($data["country"] == 'lat') echo 'selected' ?>>Латвия</option>
          <option value="est" <?php if($data["country"] == 'est') echo 'selected' ?>>Эстония</option>
        </select>
        <label>Страна</label>
      </div>
      
      <div class="input-field">
        <p><label>Пол</label></p>
        <p>
          <label>
            <input class="with-gap" name="sex" value="male" type="radio" <?php if ($data["sex"] == 'male') echo 'checked' ?> />
            <span>Мужской</span>
          </label>
          <label>
            <input class="with-gap" name="sex" value="female" type="radio" <?php if ($data["sex"] == 'female') echo 'checked' ?>  />
            <span>Женский</span>
          </label>
          <label>
            <input class="with-gap" name="sex" value="all" type="radio" <?php if ($data["sex"] == 'all') echo 'checked' ?> />
            <span>Любой</span>
          </label>
        </p>
      </div>
      <div class="input-field" style="width:95%;">
        <p><label>Возраст</label></p>
        <div id="age-slider" style="margin-top:12px;"></div>
        <input style="position:fixed; top:-100000px;" type="text" id="min-age" name="age_min">
        <input style="position:fixed; top:-100000px;" type="text" id="max-age" name="age_max">
      </div>
      <div class="input-field">
        <input id="experience" type="text" name="experience" value="<?= $data['experience']; ?>" class="validate">
        <label for="experience">Опыт работы</label>
      </div>
      <div class="input-field">
        <input id="responsibility" type="text" name="responsibility" value="<?= $data['responsibility']; ?>" class="validate">
        <label for="responsibility">Обязаности</label>
      </div>
      <div class="input-field">
        <input id="employment_conditions" type="text" name="employment_conditions" value="<?= $data['employment_conditions']; ?>" class="validate">
        <label for="employment_conditions">Условия трудоустройства</label>
      </div>
      <div class="input-field">
        <p><label>Проживание:</label></p>
        <p>
          <label>
            <input class="with-gap" name="accommodation" value="free" type="radio" <?php if ($data["accommodation"] == 'free') echo 'checked' ?> />
            <span>Бесплатно</span>
          </label>
          <label>
            <input class="with-gap" name="accommodation" value="paid" type="radio" <?php if ($data["accommodation"] == 'paid') echo 'checked' ?> />
            <span>Платно</span>
          </label>
        </p>
      </div>
      <div class="input-field">
        <input id="accommodations" type="text" name="accommodations" value="<?= $data['accommodations']; ?>" class="validate">
        <label for="accommodations">Условия проживания</label>
      </div>
      <div class="input-field">
        <input id="salary" type="text" name="salary" value="<?= $data['salary']; ?>" class="validate">
        <label for="salary">Зарплата (примерное число в Евро)</label>
      </div>
      <div class="input-field">
        <input id="salary_desc" type="text" name="salary_desc" value="<?= $data['salary_desc']; ?>" class="validate">
        <label for="salary_desc">Зарплата подробное описание</label>
      </div>
      <div class="file-field input-field">
        <div class="btn">
          <span>File</span>
          <input type="file" name="img">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
			<button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Сохранить изминения</button>
		</form>
	</div>
</div>