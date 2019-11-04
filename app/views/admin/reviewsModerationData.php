<title>Модерация отзывы | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Модерировать отзыв от "<?= $data['name']; ?>"</div>
	<div class="body">
    <img width="10%;" src="/public/images/reviews/<?= $data['id']; ?>.jpg">
    <form action="/admin/reviewsModerationData/<?= $data['id']; ?>" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" value="<?= $data['name']; ?>" class="validate">
        <label for="name">Имя</label>
      </div>

      <div class="input-field">
        <input id="country" type="text" name="country" value="<?= $data['country']; ?>" class="validate">
        <label for="country">Город</label>
      </div>

      <div class="input-field">
        <select name="rating">
          <option value="" disabled>Выберите страницу</option>
          <option value="1" <?php if($data["rating"] == 1) echo 'selected' ?>>1</option>
          <option value="2" <?php if($data["rating"] == 2) echo 'selected' ?>>2</option>
          <option value="3" <?php if($data["rating"] == 3) echo 'selected' ?>>3</option>
          <option value="4" <?php if($data["rating"] == 4) echo 'selected' ?>>4</option>
          <option value="5" <?php if($data["rating"] == 5) echo 'selected' ?>>5</option>
        </select>
        <label>Оценка</label>
      </div>

      <div class="input-field">
        <textarea id="text" class="materialize-textarea" name="text"><?= $data['text']; ?></textarea>
        <label for="text">Комментарий</label>
      </div>

      <div class="input-field">
        <input id="social" type="text" name="social" value="<?= $data['social']; ?>" class="validate">
        <label for="social">Соц. сеть</label>
      </div>

      <div class="file-field input-field">
        <div class="btn">
          <span>Аватарка</span>
          <input type="file" name="img">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
      <button style="width:100%;" class="btn waves-effect green" type="submit">Подтвердить</button>
      <p><a style="width:100%;" href="/admin/reviewsDelete/<?= $data["id"] ?>" class="waves-effect waves-light btn red">Отменить</a></p>
		</form>
	</div>
</div>