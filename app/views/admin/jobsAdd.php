<title>Добавить новую вакансию | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Добавить новую вакансию</div>
	<div class="body">
    <form action="/admin/jobsAdd" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field">
        <select name="country">
          <option value="" disabled selected>Выберите страницу</option>
          <!-- <optgroup label="Регионы Польши">
            <option value="pol_north">Польша Север</option>
            <option value="pol_south">Польша Юг</option>
            <option value="pol_west">Польша Запад</option>
            <option value="pol_east">Польша Восток</option>
          </optgroup> -->
          <option value="pol">Польша</option>
          <option value="cze">Чехия</option>
          <option value="ger">Германия</option>
          <option value="lit">Литва</option>
          <option value="est">Эстония</option>
          <option value="nor">Норвегия</option>
        </select>
        <label>Страна</label>
      </div>
      <div class="input-field">
        <p><label>Пол</label></p>
        <p>
          <label>
            <input class="with-gap" name="sex" value="male" type="radio"  />
            <span>Мужской</span>
          </label>
          <label>
            <input class="with-gap" name="sex" value="female" type="radio"  />
            <span>Женский</span>
          </label>
          <label>
            <input class="with-gap" name="sex" value="all" type="radio"  />
            <span>Любой</span>
          </label>
        </p>
      </div>
      <div class="input-field">
        <input id="age" type="text" name="age" class="validate">
        <label for="age">Возраст</label>
      </div>
      <div class="input-field">
        <input id="experience" type="text" name="experience" class="validate">
        <label for="experience">Опыт работы</label>
      </div>
      <div class="input-field">
        <input id="responsibility" type="text" name="responsibility" class="validate">
        <label for="responsibility">Обязаности</label>
      </div>
      <div class="input-field">
        <input id="employment_conditions" type="text" name="employment_conditions" class="validate">
        <label for="employment_conditions">Условия трудоустройства</label>
      </div>
      <div class="input-field">
        <input id="accommodations" type="text" name="accommodations" class="validate">
        <label for="accommodations">Условия проживания</label>
      </div>
      <div class="input-field">
        <input id="salary" type="text" name="salary" class="validate">
        <label for="salary">Зарплата (примерное число)</label>
      </div>
      <div class="input-field">
        <input id="salary_desc" type="text" name="salary_desc" class="validate">
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
			<button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Добавить</button>
		</form>
	</div>
</div>