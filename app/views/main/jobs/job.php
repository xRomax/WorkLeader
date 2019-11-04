<?php
if ($data["status"] == 'deactive')
  $this->errorCode(404);
$country_key = $data["country"];
$sex_key = $data["sex"];
require_once('app/config/mas.php'); 
?>
<title>Вакансия "<?= $data["name"]; ?>" | WorkLeader | Работа в Европейских странах</title>
<nav>
  <div class="nav-wrapper" id="news1">
    <div class="container">
      <div class="col s12">
        <a href="/" class="breadcrumb">Главная</a>
        <a href="/jobs" class="breadcrumb">Вакансии</a>
        <a href="/jobs/<?= $data["url"]; ?>#!" class="breadcrumb hide-on-med-and-down"><?= $data["name"]; ?></a>
      </div>
    </div>
  </div>
</nav>
<br>
<div class="container">
  <div class="row">
    <?php require_once('FormTop.php') ?>

    <div style="margin-top:15px;" class="col m7 offset-m1 s12 jobs-form hide-on-med-and-down show-on-large">
    <h6><?= $data["name"]; ?></h6>
      <table>
        <tr>
          <td>Страна:</td>
          <td><img class="z-depth-2" src="/public/images/flag/<?= $data["country"]; ?>.png" alt="Польша" style="width:20px;"> <?= $country_mas[$country_key]; ?></td>
        </tr>
        <tr>
          <td>Пол:</td>
          <td><?= $sex_mas[$sex_key]; ?></td>
        </tr>
        <tr>
          <td>Возраст:</td>
          <td><?= "От ".$data["age_min"]." до ".$data["age_max"]; ?></td>
        </tr>
        <tr>
          <td>Опыт работы:</td>
          <td><?= $data["experience"]; ?></td>
        </tr>
        <tr>
          <td>Обязаности:</td>
          <td><?= $data["responsibility"]; ?></td>
        </tr>
        <tr>
          <td>Условия трудоустройства:</td>
          <td><?= $data["employment_conditions"]; ?></td>
        </tr>
        <tr>
          <td>Условия проживания:</td>
          <td><?= $data["accommodations"]; ?></td>
        </tr>
        <tr>
          <td>Зарплата:</td>
          <td><?= $data["salary_desc"]; ?></td>
        </tr>
      </table>
    </div>

    <div style="margin-top:15px;" class="col s12 jobs-form hide-on-large-only show-on-medium-and-down">
      <p>Страна: <img class="z-depth-2" src="/public/images/flag/<?= $data["country"]; ?>.png" alt="Польша" style="width:20px;"> <?= $country_mas[$country_key]; ?></p>
      <p>Пол: <?= $sex_mas[$sex_key]; ?></p>
      <p>Возраст: <?= "От ".$data["age_min"]." до ".$data["age_max"]; ?></p>
      <p>Опыт работы: <?= $data["experience"]; ?></p>
      <p>Обязаности:<br> <?= $data["responsibility"]; ?></p>
      <p>Условия трудоустройства:<br> <?= $data["employment_conditions"]; ?></p>
      <p>Условия проживания:<br> <?= $data["accommodations"]; ?></p>
      <p>Зарплата: <?= $data["salary_desc"]; ?>
      </p>
    </div>
  </div>
  
  <br><br>

  <?php require_once('FormBottom.php') ?>
</div>
<br><br><br>