<title>Вакансия "<?php echo $data["name"]; ?>" | WorkLeader | Работа в Европейских странах</title>
<?php 
$country_key = $data["country"];
$sex_key = $data["sex"];
require_once('app/config/mas.php'); 
?>
<nav>
  <div class="nav-wrapper" id="news1">
    <div class="container">
      <div class="col s12">
        <a href="/" class="breadcrumb">Главная</a>
        <a href="/jobs" class="breadcrumb">Вакансии</a>
        <a href="/jobs/<?php echo $data["url"]; ?>#!" class="breadcrumb hide-on-med-and-down"><?php echo $data["name"]; ?></a>
      </div>
    </div>
  </div>
</nav>
<br>
<div class="container">
  <div class="row">
    <?php require_once('FormTop.php') ?>

    <div style="margin-top:15px;" class="col m7 offset-m1 s12 jobs-form hide-on-med-and-down show-on-large">
    <h6><?php echo $data["name"]; ?></h6>
      <table>
        <tr>
          <td>Страна:</td>
          <td><img class="z-depth-2" src="/public/images/flag/<?php echo $data["country"]; ?>.png" alt="Польша" style="width:20px;"> <?php echo $country_mas[$country_key]; ?></td>
        </tr>
        <tr>
          <td>Пол:</td>
          <td><?php echo $sex_mas[$sex_key]; ?></td>
        </tr>
        <tr>
          <td>Возраст:</td>
          <td><?php echo $data["age"]; ?></td>
        </tr>
        <tr>
          <td>Опыт работы:</td>
          <td><?php echo $data["experience"]; ?></td>
        </tr>
        <tr>
          <td>Обязаности:</td>
          <td><?php echo $data["responsibility"]; ?></td>
        </tr>
        <tr>
          <td>Условия трудоустройства:</td>
          <td><?php echo $data["employment_conditions"]; ?></td>
        </tr>
        <tr>
          <td>Условия проживания:</td>
          <td><?php echo $data["accommodations"]; ?></td>
        </tr>
        <tr>
          <td>Зарплата:</td>
          <td><?php echo $data["salary_desc"]; ?></td>
        </tr>
      </table>
    </div>


    <div style="margin-top:15px;" class="col s12 jobs-form hide-on-large-only show-on-medium-and-down">
      <p>Страна: <img class="z-depth-2" src="/public/images/flag/<?php echo $data["country"]; ?>.png" alt="Польша" style="width:20px;"> <?php echo $country_mas[$country_key]; ?></p>
      <p>Пол: <?php echo $sex_mas[$sex_key]; ?></p>
      <p>Возраст: <?php echo $data["age"]; ?></p>
      <p>Опыт работы: <?php echo $data["experience"]; ?></p>
      <p>Обязаности:<br> <?php echo $data["responsibility"]; ?></p>
      <p>Условия трудоустройства:<br> <?php echo $data["employment_conditions"]; ?></p>
      <p>Условия проживания:<br> <?php echo $data["accommodations"]; ?></p>
      <p>Зарплата: <?php echo $data["salary_desc"]; ?>
      </p>
    </div>
  </div>
  
  <br><br>

  <?php require_once('FormBottom.php') ?>
</div>
<br><br><br>