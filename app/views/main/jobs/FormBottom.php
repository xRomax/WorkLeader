<div class="feedback-block white-text">
  <h6 style="padding-top:20px;" class="center">Введите Ваши данные и наш менеджер свяжется с вами!</h6>
  <form action="<?= $_SERVER["REQUEST_URI"]; ?>" method="post" class="bottomForm ajax">
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