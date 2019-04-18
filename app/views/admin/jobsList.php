<div class="jobs_form">
  <div class="head">Список вакансий</div>
  <div class="body">
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
          <p>Список постов пуст</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?php echo $val["name"] ?></td>
              <td><a href="/admin/jobsEdit/<?php echo $val["id"] ?>" class="waves-effect waves-light btn blue">Редактировать</a></td>
                <td>
                  <?php if ($val["status"] == 'active'):?>
                    <a href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn deep-orange darken-4">Выключить</a>
                  <?php else: ?>
                    <a style="width:126px;" href="/admin/jobsStatus/<?php echo $val["id"] ?>" class="waves-effect waves-light btn green">Включить</a>
                  <?php endif; ?>
                </td>
              <td><a href="/admin/jobsDelete/<?php echo $val["id"] ?>" class="waves-effect waves-light btn red">Удалить</a></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>