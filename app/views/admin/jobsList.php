<title>Список вакансий | Панель Администратора</title>
<div class="jobs_form">
  <div class="head">Список вакансий</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Название</th>
          <th>Редактировать</th>
          <th>Статус</th>
          <th>Удалить</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Список вакансий пуст</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?php echo $val["name"] ?></td>
              <td><a href="/admin/jobsEdit/<?php echo $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a></td>
              <td>
                <?php if ($val["status"] == 'active'): ?>
                  <a style="width:130px;" href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn green">Включено</a>
                <?php else: ?>
                  <a style="width:130px;" href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn deep-orange darken-4">Выключено</a>
                <?php endif; ?>
              </td>
              <td><a href="/admin/jobsDelete/<?php echo $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <div class="body hide-on-large-only show-on-medium-and-down">
    <table>
      <?php if (empty($list)): ?>
        <p>Список вакансий пуст</p>
      <?php else: ?>
        <?php foreach ($list as $val): ?>
          <tr>
            <td>
              <p><?php echo $val["name"]; ?></p>
              <a href="/admin/jobsEdit/<?php echo $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a>
              <?php if ($val["status"] == 'active'):?>
                <a style="width:130px;" href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn green">Включено</a>
              <?php else: ?>
                <a style="width:130px;" href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn deep-orange darken-4">Выключено</a>
              <?php endif; ?>
              <p>
                <a href="/admin/jobsDelete/<?php echo $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a>
              </p>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>