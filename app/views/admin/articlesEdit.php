<title>Редактировать статью | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Редактировать статью</div>
	<div class="body">
        <form action="/admin/articlesEdit/<?= $data['id'] ?>" enctype="multipart/form-data" method="post" class="ajax">
            <input type="hidden" id="text-input" name="text">
            <div class="input-field">
                <input id="name" type="text" name="name" class="validate" value="<?= $data['name'] ?>">
                <label for="name">Название</label>
            </div>
            <div class="input-field">
                <input id="url" type="text" name="url" class="validate" value="<?= $data['url'] ?>">
                <label for="url">URL адресс</label>
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
            <select name="recommend[]" multiple size="3">
                <option value="" disabled>Рекомендуемые статьи</option>
                <?php if($recommend): ?>
                    <?php foreach($list as $key => $values): ?>
                        <option value="<?= $values['id'] ?>" <?php if (in_array($values['id'], $recommend)) echo 'selected'; ?> ><?= $values['name'] ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php foreach($list as $key => $values): ?>
                        <option value="<?= $values['id'] ?>"><?= $values['name'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="input-field">
                <input id="description" type="text" name="description" class="validate" value="<?= $values['description'] ?>">
                <label for="description">Краткое описание</label>
            </div>
            <div class="input-field">
            <div id="toolbar-container"></div>
                <div id="editor">
                    <?= $data['text'] ?>
                </div>
            </div>
            <button id='editor-button' style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Сохранить изминения</button>
        </form>
	</div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/decoupled-document/ckeditor.js"></script>
<script>
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
    
</script>