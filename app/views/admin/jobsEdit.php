<div class="jobs_form">
	<div class="head">Редактировать вакансию "<?php echo $data['name']; ?>"</div>
	<div class="body">
    <form action="/admin/jobsEdit/<?php echo $data['id']; ?>" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" value="<?php echo $data['name']; ?>" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" value="<?php echo $data['url']; ?>" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field">
        <select name="country">
          <option value="" disabled>Выберите страницу</option>
          <option value="pol" <?php if($data["country"] == 'pol') echo 'selected' ?>>Польша</option>
          <option value="cze" <?php if($data["country"] == 'cze') echo 'selected' ?>>Чехия</option>
          <option value="ger" <?php if($data["country"] == 'ger') echo 'selected' ?>>Германия</option>
          <option value="lith" <?php if($data["country"] == 'lith') echo 'selected' ?>>Литва</option>
          <option value="est" <?php if($data["country"] == 'est') echo 'selected' ?>>Эстония</option>
          <option value="nor" <?php if($data["country"] == 'nor') echo 'selected' ?>>Норвегия</option>
          <option value="ukr" <?php if($data["country"] == 'ukr') echo 'selected' ?>>Украина</option>
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
      <div class="input-field">
        <input id="age" type="text" name="age" value="<?php echo $data['age']; ?>" class="validate">
        <label for="age">Возраст</label>
      </div>
      <div class="input-field">
        <input id="experience" type="text" name="experience" value="<?php echo $data['experience']; ?>" class="validate">
        <label for="experience">Опыт работы</label>
      </div>
      <div class="input-field">
        <input id="responsibility" type="text" name="responsibility" value="<?php echo $data['responsibility']; ?>" class="validate">
        <label for="responsibility">Обязаности</label>
      </div>
      <div class="input-field">
        <input id="employment_conditions" type="text" name="employment_conditions" value="<?php echo $data['employment_conditions']; ?>" class="validate">
        <label for="employment_conditions">Условия трудоустройства</label>
      </div>
      <div class="input-field">
        <input id="accommodations" type="text" name="accommodations" value="<?php echo $data['accommodations']; ?>" class="validate">
        <label for="accommodations">Условия проживания</label>
      </div>
      <div class="input-field">
        <input id="salary" type="text" name="salary" value="<?php echo $data['salary']; ?>" class="validate">
        <label for="salary">Зарплата (PLN)</label>
      </div>
      <input type="file" name="img" class="validate">
			<button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Сохранить изминения</button>
		</form>
	</div>
</div>