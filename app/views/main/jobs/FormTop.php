<div style="margin-top:15px;" class="col l3 m12 s12 jobs-form"><br>
  <b>Спроси нас о вакансии</b>
  <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" class="modalForm ajax">
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