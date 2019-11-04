<title>Список статьей | Панель Администратора</title>
<div class="jobs_form">
  <div class="head">Список статьей</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Название</th>
          <th>Просмотр</th>
          <th>Редактировать</th>
          <th>Удалить</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Список статьей пуст</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td class="tdname"><?= $val["name"] ?></td>
              <td><a href="/admin/articlesView/<?= $val["id"] ?>" class="waves-effect waves-light btn green">Просмотр</a></td>
              <td><a href="/admin/articlesEdit/<?= $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a></td>
              <td><a href="/admin/articlesDelete/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="body hide-on-large-only show-on-medium-and-down">
    <table>
      <?php if (empty($list)): ?>
        <p>Список статьей пуст</p>
      <?php else: ?>
        <?php foreach ($list as $val): ?>
          <tr>
            <td>
              <p class="tdname"><?= $val["name"]; ?></p>
              <p>
                <a href="/admin/articlesView/<?= $val["id"] ?>" class="waves-effect waves-light btn green">Просмотр</a>
              </p>
              <p>
                <a href="/admin/articlesEdit/<?= $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a>
              </p>
              <p>
                <a href="/admin/articlesDelete/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a>
              </p>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>