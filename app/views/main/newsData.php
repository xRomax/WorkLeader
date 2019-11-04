<title><?= $data["name"]; ?> | WorkLeader | Работа в Европейских странах</title>
<nav>
  <div class="nav-wrapper" id="news1">
    <div class="container">
      <div class="col s12">
        <a href="/" class="breadcrumb">Главная</a>
        <a href="/news" class="breadcrumb">Новости</a>
        <a href="/news/<?= $data["url"]; ?>#!" class="breadcrumb disabled"><?= substr($data['name'], 0, 20).'...' ?></a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col s12">
      <h3><?= $data["name"]; ?></h3>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <img class="leftfoto" style="width:50%;" src="/public/images/news/<?= $data["id"]; ?>.jpg">
      <?= $data["text"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <p class="right">Читать подробнее:<a target="_blank" class="source" href="<?= $data["source"]; ?>"> оригинал</a></p>
    </div>
  </div>
</div>