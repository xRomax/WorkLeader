<?php 
// debug($data[0]);
$country_key = $data[0]["country"];
$sex_key = $data[0]["sex"];
?>
<?php 
require_once('app/config/mas.php'); 
?>
<br>
<div class="container">
  <div class="row">
    <?php require_once('FormTop.php') ?>

    <div style="margin-top:15px;" class="col m7  offset-m1 s12 jobs-form hide-on-med-and-down show-on-large">
    <h6>В пансионат по уходу за пожилыми людьми требуеться медсестра</h6>
      <table>
        <tr>
          <td>Страна:</td>
          <td><img class="z-depth-2" src="/public/images/flag/<?php echo $data[0]["country"]; ?>.png" alt="Польша" style="width:20px;"> <?php echo $country_mas[$country_key]; ?></td>
        </tr>
        <tr>
          <td>Пол:</td>
          <td><?php echo $sex_mas[$sex_key]; ?></td>
        </tr>
        <tr>
          <td>Возраст:</td>
          <td><?php echo $data[0]["age"]; ?></td>
        </tr>
        <tr>
          <td>Опыт работы:</td>
          <td><?php echo $data[0]["experience"]; ?></td>
        </tr>
        <tr>
          <td>Обязаности:</td>
          <td><?php echo $data[0]["responsibility"]; ?></td>
        </tr>
        <tr>
          <td>Условия трудоустройства:</td>
          <td><?php echo $data[0]["employment_conditions"]; ?></td>
        </tr>
        <tr>
          <td>Условия проживания:</td>
          <td><?php echo $data[0]["accommodations"]; ?></td>
        </tr>
        <tr>
          <td>Зарплата:</td>
          <td><?php echo $data[0]["salary"]; ?> PLN</td>
        </tr>
      </table>
    </div>


    <div style="margin-top:15px;" class="col s12 jobs-form hide-on-large-only show-on-medium-and-down">
      <p>Страна: <img class="z-depth-2" src="/public/images/flag/<?php echo $data[0]["country"]; ?>.png" alt="Польша" style="width:20px;"> <?php echo $country_mas[$country_key]; ?></p>
      <p>Пол: <?php echo $sex_mas[$sex_key]; ?></p>
      <p>Возраст: <?php echo $data[0]["age"]; ?></p>
      <p>Опыт работы: <?php echo $data[0]["experience"]; ?></p>
      <p>Обязаности:<br> <?php echo $data[0]["responsibility"]; ?></p>
      <p>Условия трудоустройства:<br> <?php echo $data[0]["employment_conditions"]; ?></p>
      <p>Условия проживания:<br> <?php echo $data[0]["accommodations"]; ?></p>
      <p>Зарплата: PLN = <?php echo $data[0]["salary"]; ?>
        <!-- <br>PLN= 2400-2600 <br> UAH=15000-25000 <br> USD = 750 - 1200 <br> EUR = 950 - 1800 -->
      </p>
    </div>
  </div>
  
  <br><br>

  <?php require_once('FormBottom.php') ?>
</div>
<br><br><br>