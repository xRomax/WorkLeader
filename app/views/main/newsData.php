<title><?php echo $data["name"]; ?> | WorkLeader | Работа в Европейских странах</title>
<nav>
  <div class="nav-wrapper" id="news1">
    <div class="container">
      <div class="col s12">
        <a href="/" class="breadcrumb">Главная</a>
        <a href="/news" class="breadcrumb">Новости</a>
        <a href="/news/<?php echo $data["url"]; ?>#!" class="breadcrumb disabled"><?php echo $data["name"]; ?></a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col s12">
      <h3><?php echo $data["name"]; ?></h3>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <img class="leftfoto" style="width:50%;" src="/public/images/news/<?php echo $data["id"]; ?>.jpg">
      <?php echo $data["text"]; ?>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <p class="right">Читать подробнее:<a target="_blank" class="source" href="<?php echo $data["source"]; ?>"> оригинал</a></p>
    </div>
  </div>
</div>