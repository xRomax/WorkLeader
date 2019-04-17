<div class="jobs_form">
	<div class="head">Добавить новую вакансию</div>
	<div class="body">
    <form action="/admin/jobsAdd" enctype="multipart/form-data" method="post" class="">
      <div class="input-field">
        <input id="name" type="text" name="name" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field">
        <input id="country" type="text" name="country" class="validate">
        <label for="country">Страна</label>
      </div>
      <p>
        <label>
          <input class="with-gap" name="sex" value="male" type="radio"  />
          <span>Мужской</span>
        </label>
        <label>
          <input class="with-gap" name="sex" value="female" type="radio"  />
          <span>Женский</span>
        </label>
      </p>
      <!-- <div class="input-field">
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
      </div> -->
      <div class="input-field">
        <input id="sallary" type="text" name="sallary" class="validate">
        <label for="sallary">Зарплата (PLN)</label>
      </div>
      <!-- <input type="file" name="img" class="validate"> -->
			<button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Добавить</button>
		</form>
	</div>
</div>