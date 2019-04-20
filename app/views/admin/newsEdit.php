<div class="jobs_form">
	<div class="head">Редактировать новость "<?php echo $data['name']; ?>"</div>
	<div class="body">
    <form action="/admin/newsEdit/<?php echo $data['id']; ?>" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" value="<?php echo $data['name']; ?>" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" value="<?php echo $data['url']; ?>" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field">
        <textarea id="textarea" class="materialize-textarea" name="text"><?php echo $data['text']; ?></textarea>
        <label for="textarea">Новость</label>
      </div>
      <div class="input-field">
        <textarea id="textarea1" class="materialize-textarea" name="description"><?php echo $data['description']; ?></textarea>
        <label for="textarea1">Краткое описание</label>
      </div>
      <div class="input-field">
        <input id="source" type="text" name="source" value="<?php echo $data['source']; ?>" class="validate">
        <label for="source">Источник</label>
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