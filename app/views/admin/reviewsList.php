<title>Список отзывов | Панель Администратора</title>
<div class="jobs_form">
  <div class="head">Список отзывов</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Имя пользователя</th>
          <th>Комментарий</th>
          <th>Оценка</th>
          <th>Статус</th>
          <th>Удалить</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Новых отзывов нет</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?= $val["name"] ?></td>
              <td><p class="truncate" style="max-width:300px;"><?= $val["text"] ?></p></td>
              <th><?= $val["rating"] ?></th>
              <td>
                <?php if ($val["display"] == 'show'):?>
                  <a style="width:130px;" href="/admin/reviewsDisplay/<?= $val["id"] ?>" class="waves-effect waves-light btn green">SHOW</a>
                <?php else: ?>
                  <a style="width:130px;" href="/admin/reviewsDisplay/<?= $val["id"] ?>" class="waves-effect waves-light btn red <? if ($amount >= 3 ) echo 'disabled'; ?>">HIDE</a>
                <?php endif; ?>
              </td>
              <td><a href="/admin/reviewsDel/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="body hide-on-large-only show-on-medium-and-down">
    <table>
      <?php if (empty($list)): ?>
        <p>Новых отзывов нет</p>
      <?php else: ?>
        <?php foreach ($list as $val): ?>
          <tr>
            <td>
              <p><?= $val["name"]; ?></p>
              <?php if ($val["display"] == 'show'):?>
                  <a style="width:130px;" href="/admin/reviewsDisplay/<?= $val["id"] ?>" class="waves-effect waves-light btn green">SHOW</a>
                <?php else: ?>
                  <a style="width:130px;" href="/admin/reviewsDisplay/<?= $val["id"] ?>" class="waves-effect waves-light btn red <? if ($amount >= 3 ) echo 'disabled'; ?>">HIDE</a>
              <?php endif; ?>
              <p><a href="/admin/reviewsDel/<?= $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></p>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>