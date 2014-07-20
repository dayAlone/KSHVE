    <?if(!$isIndex):?>
        <div class="vensel-final">
          <?=svg('end-vensel-left')?><div class="center"></div><?=svg('end-vensel-right')?>
        </div>
        
        </div>
      </div>
    <?endif;?>
  </div>
  <div id="Call" tabindex="-1" role="dialog" aria-labelledby="Call" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <h1>Заявка на обратный звонок</h1>
        <div class="row">
          <div class="col-md-4">
            <label>Ваше имя *</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label>Номер телефона *</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="phone">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label><span>Какой вид услуги<br>Вас заинтересовал?</span></label>
          </div>
          <div class="col-md-8">
            <textarea name="service"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"><small>Поля, отмеченные * <br>- обязательны<br> для заполнения.</small></div>
          <div class="col-md-8">
            <p>Введите код с картинки</p>
            <div class="row">
              <div class="col-md-5"><img src="/layout/images/captcha.png"></div>
              <div class="col-md-2"><a class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-md-1"><span class="here">сюда</span></div>
              <div class="col-md-4">
                <input name="captcha" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-4 col-md-8">
            <input type="submit" value="отправить">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>