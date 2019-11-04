<title>Курс валют | Панель Администратора</title>
<?php //debug($currencyUAH); 
?>
<div class="jobs_form">
	<div class="head">Курс валют</div>
	<div class="body">
    <!-- <form action="/admin/currency" enctype="multipart/form-data" method="post" class="ajax">
      <table>
        <thead>
          <tr>
            <th>Базовая валюта</th>
            <th>Количество</th>
            <th>Код валюты</th>
            <th>Изменить</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1 EUR</td>
            <td>
              <div class="input-field">
                <input id="currency" type="text" name="currency" class="validate">
                <label for="currency">Название</label>
              </div>
            </td>
            <td>
              <div class="input-field">
                <select name="currency_code">
                  <option value="" disabled selected>Выберите валюту</option>
                  <option value="UAH">Украинская гривна</option>
                  <option value="PLN">Польский злотый</option>
                  <option value="CZK">Чешская крона</option>
                  <option value="NOK">Норвежская крона</option>
                </select>
                <label>Валюта</label>
              </div>
            </td>
            <td>
              <button class="btn waves-effect light-blue darken-4" type="submit">Изменить курс</button>
            </td>
          </tr>

        </tbody>
      </table>
    </form> -->

    <table>
      <thead>
        <tr>
          <th>Базовая валюта</th>
          <th>Количество</th>
          <th>Код валюты</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($currency as $key =>$value): ?>
          <?php if($key == 'NOK' or $key == 'PLN' or $key == 'CZK' or $key == 'USD'): ?>
            <tr>
              <td>1 EUR</td>
              <td><?= $value; ?></td>
              <td><?= $key; ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
      <tr>
        <td>1 EUR</td>
        <td><?= $currencyUAH->rate; ?></td>
        <td>UAH</td>
      </tr>
    </table>
	</div>
</div>