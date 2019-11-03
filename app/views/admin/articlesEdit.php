<title>Редактировать статью | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Редактировать статью</div>
	<div class="body">
        <form action="/admin/articlesEdit/<?= $data['id'] ?>" enctype="multipart/form-data" method="post" class="ajx">
            <div class="input-field">
                <input id="name" type="text" name="name" class="validate" value="<?= $data['name'] ?>">
                <label for="name">Название</label>
            </div>
            <div class="input-field">
                <input id="url" type="text" name="url" class="validate" value="<?= $data['url'] ?>">
                <label for="url">URL адресс</label>
            </div>
            <div class="input-field">
                <textarea id="editor" class="materialize-textarea" name="text"><?= $data['text'] ?></textarea>
                <!-- <label for="text">Текст</label> -->
            </div>
            <button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Сохранить изминения</button>
        </form>
	</div>
</div>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>