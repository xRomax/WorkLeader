<div class="jobs_form">
	<div class="head">Добавить новость</div>
	<div class="body">
    <form action="/admin/newsAdd" enctype="multipart/form-data" method="post" class="ajax">
      <div class="input-field">
        <input id="name" type="text" name="name" class="validate">
        <label for="name">Название</label>
      </div>
      <div class="input-field">
        <input id="url" type="text" name="url" class="validate">
        <label for="url">URL адресс</label>
      </div>
      <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Новость</label>
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