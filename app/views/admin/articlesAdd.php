<title>Добавить новую статью | Панель Администратора</title>
<div class="jobs_form">
	<div class="head">Добавить статью</div>
	<div class="body">
        <form action="/admin/articlesAdd" enctype="multipart/form-data" method="post" class="ajax">
            <div class="input-field">
                <input id="name" type="text" name="name" class="validate">
                <label for="name">Название</label>
            </div>
            <div class="input-field">
                <input id="url" type="text" name="url" class="validate">
                <label for="url">URL адресс</label>
            </div>
            <div class="input-field">
                <textarea id="editor" class="materialize-textarea" name="text"></textarea>
                <!-- <label for="text">Текст</label> -->
            </div>
            <button style="width:100%;" class="btn waves-effect light-blue darken-4" type="submit">Добавить</button>
        </form>
	</div>
</div>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>