<title>Модерация отзывов | Панель Администратора</title>
<div class="jobs_form">
  <div class="head">Список отзывов</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Имя пользователя</th>
          <th>Комментарий</th>
          <th>Модерация</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Новых отзывов нет</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?php echo $val["name"] ?></td>
              <td><p class="truncate" style="max-width:300px;"><?php echo $val["text"] ?></p></td>
              <td><a href="/admin/reviewsModerationData/<?php echo $val["id"] ?>" class="waves-effect waves-light btn light-blue darken-4">Модерация</a></td>
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
              <p><?php echo $val["name"]; ?></p>
              <a href="/admin/reviewsModerationData/<?php echo $val["id"] ?>" class="waves-effect waves-light btn light-blue darken-4">Модерация</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>