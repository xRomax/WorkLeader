<div class="container">
  <?php if(empty($list)): ?>
    <h4 class="center teal-text">Новости отсутствуют</h4>
  <?php else: ?>
    <h4 class="center teal-text">Новости</h4>
    <div class="row">

    <?php foreach($list as $val): ?>
      <div class="col l6 m6 s12">
        <div class="news-form">
          <a href="/news/<?php echo $val["url"]; ?>"><h5 class="truncate"><?php echo $val["name"]; ?></h5></a>
          <div class="row">
            <div class="col s4">
              <img src="/public/images/news/<?php echo $val["id"]; ?>.jpg">
            </div>
            <div class="col s8"><?php echo $val["description"]; ?></div>
          </div>
          <p><a class="right" href="/news/<?php echo $val["url"]; ?>">Читать больше...</a><span style="opacity:0;">.</span></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>