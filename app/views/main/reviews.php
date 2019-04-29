<?php
if (!empty($test)) debug($test)
?>
<title>Отзывы о компании WorkLeader | Работа в Европейских странах</title>
<div class="container">
  <h3 class="teal-text">Отзывы о нас</h3>
  <ul class="collection feedback-main" style="padding:10px 0;">
    <?php if (empty($list)): ?>
      <p>Список отзывов пуст</p>
    <?php else: ?>
      <?php foreach ($list as $val): ?>
        <?php
          if (!empty($val['social'])) {
            $parse_http = parse_url($val['social']);
            if (!array_key_exists('scheme',$parse_http)) 
              $url = 'http://'.$val['social']; 
            else 
              $url = $val['social'];
          } else $url= '#!';
        ?> 
        <li class="collection-item">
          <span class="title">
            <a href="<?php echo $url; ?>"><?php echo $val['name']; ?></a>
            <span class="right teal-text"><i class="fas fa-map-pin"></i> <?php echo $val['country']; ?></span>
          </span>
          <a href="<?php echo $url; ?>"><img src="/public/images/reviews/<?php echo $val['id']; ?>.jpg" class="circle"></a>
          <p><?php echo $val['text']; ?></p>
          <div class="secondary-content center">
            <span class="right"><?php echo $val['date']; ?></span>
            <?php for ($i=1;$i<=$val['rating'];$i++) 
              echo '<a href="#!"><i class="material-icons">grade</i></a>'; 
            ?>
          </div>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</div>

<div class="container">
  <div class="jobs-form">
    <h5>Добавить отзыв</h5>
    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="multipart/form-data" method="post" class="ajax">
      <input style="position:fixed; top:-100000px;" type="reset">
      <div class="row">
        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">account_circle</i>
          <input type="text" id="name" name="name">
          <label for="name">Ваше имя*</label>
        </div>

        <div class="col m4 s6 input-field">
          <i class="material-icons prefix">map</i>
          <input type="text" id="country" name="country">
          <label for="country">Город*</label>
        </div>

        <div class="col m2 s6 input-field">
          <i class="material-icons prefix">star_half</i>
          <select name="rating">
            <option value="" disabled selected>Оценка*</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <div class="col m12 s12 input-field">
          <i class="material-icons prefix">textsms</i>
          <textarea id="text" name="text" class="materialize-textarea"></textarea>
          <label for="text">Комментарий*</label>
        </div>

        <div class="col m6 s12 input-field">
          <i class="material-icons prefix">share</i>
          <input type="text" id="social" name="social">
          <label for="social">Профиль в соц сети</label>
        </div>
   
        <div class="col m6 s12 file-field input-field">
          <div class="btn">
            <span>Аватарка*</span>
            <input type="file" name="image">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>

        <div class="col s12 center-align">
          <button class="btn waves-effect waves-light" type="submit">Отправать
            <i class="material-icons right">send</i>
          </button>
        </div>

      </div>
    </form>
  </div>
</div>
<br><br>