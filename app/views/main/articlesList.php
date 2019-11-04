<title>Список статьей | WorkLeader | Работа в Европейских странах</title>
<div class="container">
  <?php if(empty($list)): ?>
    <h4 class="center teal-text">Статьи отсутствуют</h4>
  <?php else: ?>
    <h4 class="center teal-text">Статьи</h4>
    <?php $i = 0; ?>
      <?php foreach($list as $value): ?>
        <?php $n = $i % 2; ?>
        <?php if ($n == 0): ?> <div class="row"> <?php endif; ?>
        <div class="col l6 m6 s12">
          <div class="news-form">
            <a href="/articles/<?= $value["url"]; ?>"><h5 class="truncate"><?= $value["name"]; ?></h5></a>
            <div class="row">
              <div class="col s4">
                <img src="/public/images/articles/<?= $value["id"]; ?>.jpg">
              </div>
              <div class="col s8"><?= $value["description"]; ?></div>
            </div>
            <p><a class="right" href="/articles/<?= $value["url"]; ?>">Читать больше...</a><span style="opacity:0;">.</span></p>
          </div>
        </div>
        <?php 
            if ($n != 0 || count($list) == $i): ?> </div> <?php endif; 
            $i++; 
            if (count($list) == $i): ?> </div> <?php endif; 
        ?>
      <?php endforeach; ?>
  <?php endif; ?>
</div>
<div class="contrainer">
    <div class="row">
        <?php if ($pagination) echo $pagination ?>
    </div>
</div>