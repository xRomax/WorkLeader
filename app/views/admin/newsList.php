<title>Список новостей | Панель Администратора</title>
<div class="jobs_form">
  <div class="head">Список новостей</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Название</th>
          <th>Редактировать</th>
          <th>Удалить</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Список новостей пуст</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?= $val["name"] ?></td>
              <td><a href="/admin/newsEdit/<?= $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a></td>
              <td><a href="/admin/newsDelete/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div class="body hide-on-large-only show-on-medium-and-down">
    <table>
      <?php if (empty($list)): ?>
        <p>Список новостей пуст</p>
      <?php else: ?>
        <?php foreach ($list as $val): ?>
          <tr>
            <td>
              <p><?= $val["name"]; ?></p>
              <a href="/admin/newsEdit/<?= $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a>
              <p><a href="/admin/newsDelete/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></p>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>