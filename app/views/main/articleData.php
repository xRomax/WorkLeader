<title><?= $data["name"]; ?> | WorkLeader | Работа в Европейских странах</title>
<nav>
  <div class="nav-wrapper" id="news1">
    <div class="container">
      <div class="col s12">
        <a href="/" class="breadcrumb">Главная</a>
        <a href="/articles" class="breadcrumb">Статьи</a>
        <a href="/articles/<?= $data["url"]; ?>#!" class="breadcrumb disabled"><?= substr($data['name'], 0, 25).'...' ?></a>
      </div>
    </div>
  </div>
</nav>
<section class="articles">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5><?= $data["name"]; ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col s10">
        <?= $data["text"]; ?>
      </div>
      <div class="col s2">
        <?php foreach ($list as $key => $values): ?>
          <?php if ($recommend && in_array($values['id'], $recommend)):?>
            <div class="row">
              <div class="reccomend">
                <p class="title"><a href="/articles/<?= $values['url'] ?>"><?= $values['name'] ?></a></p>
                <p class="desc"><?= $values['description'] ?></p>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>