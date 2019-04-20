<div class="jobs_form">
  <div class="head">Список вакансий</div>
  <div class="body hide-on-med-and-down show-on-large">
    <table>
      <thead>
        <tr>
          <th>Название</th>
          <th>Отображать на главное странице</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($list)): ?>
          <p>Список постов пуст</p>
        <?php else: ?>
          <?php foreach ($list as $val): ?>
            <tr>
              <td><?php echo $val["name"] ?></td>
              <td>
                <?php if ($val["hot"] == 'show'):?>
                  <a style="width:130px;" href="/admin/jobsHot/<?php echo $val["id"] ?>" class="waves-effect waves-light btn green">SHOW</a>
                <?php else: ?>
                  <a style="width:130px;" href="/admin/jobsHot/<?php echo $val["id"] ?>" class="waves-effect waves-light btn red <? if ($amount >= 3 ) echo 'disabled'; ?>">HIDE</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="body hide-on-large-only show-on-medium-and-down">
    <table>
      <?php if (empty($list)): ?>
        <p>Список постов пуст</p>
      <?php else: ?>
        <?php foreach ($list as $val): ?>
          <tr>
            <td>
              <p> <?php echo $val["name"] ?></p>
              <?php if ($val["hot"] == 'show'):?>
                  <a style="width:130px;" href="/admin/jobsHot/<?php echo $val["id"] ?>" class="waves-effect waves-light btn green">SHOW</a>
                <?php else: ?>
                  <a style="width:130px;" href="/admin/jobsHot/<?php echo $val["id"] ?>" class="waves-effect waves-light btn red <? if ($amount >= 3 ) echo 'disabled'; ?>">HIDE</a>
                <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </table>
  </div>
</div>