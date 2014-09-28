    <?if(!$isIndex):
        if($APPLICATION->GetPageProperty('line')!="false"):?>
        <div class="vensel-final">
          <?=svg('end-vensel-left')?><div class="center"></div><?=svg('end-vensel-right')?>
        </div>
        <?
        $APPLICATION->IncludeComponent(
        	"bitrix:asd.share.buttons", 
        	"", 
        	array(
            "ASD_ID"         => $_REQUEST["id"],
            "ASD_TITLE"      => $APPLICATION->GetTitle().(!$isIndex?" :: Кремлевская школа верховой езды":""),
            "ASD_URL"        => 'http://'.$_SERVER['HTTP_HOST'].$APPLICATION->GetCurUri(),
            "ASD_PICTURE"    => $_REQUEST["picture"],
            "ASD_TEXT"       => $_REQUEST["text"],
            "ASD_LINK_TITLE" => "Расшарить в #SERVICE#",
            "ASD_SITE_NAME"  => "",
        		"ASD_INCLUDE_SCRIPTS" => array(
        			0 => "FB_LIKE",
        			1 => "VK_LIKE",
        			2 => "TWITTER",
        		)
        	),
        	false
        );?>
        <?endif;?>
        </div>
      </div>
    <?endif;?>
  </div>
  <div id="Call" tabindex="-1" role="dialog" aria-labelledby="Call" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="success">
        <h1 class="center">Ваше сообщение успешно отправлено. </h1>
        <p class="center">В ближайшее время представители нашей школы свяжутся с вами. Благодарим за обращение.</p>
      </div>
      <form action=""  data-parsley-validate id="send">
        <input type="hidden" name="group_id" value="5">
        <h1>Заявка на обратный звонок</h1>
        <div class="row">
          <div class="col-xs-4">
            <label>Ваше имя *</label>
          </div>
          <div class="col-xs-8">
            <input type="text" name="name" required>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <label>Номер телефона *</label>
          </div>
          <div class="col-xs-8">
            <input type="text" name="phone" data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" required data-parsley-trigger="change">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <label><span>Какой вид услуги<br>Вас заинтересовал?</span></label>
          </div>
          <div class="col-xs-8">
            <textarea name="service"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4"><small class="info">Поля, отмеченные * <br>- обязательны для заполнения.</small></div>
          <div class="col-xs-8">
            <p>Введите код с картинки</p>
            <div class="row">
              <?
                include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
                $cpt = new CCaptcha();
                $cpt->SetCodeLength(5);
                $cpt->SetCode();
                $code=$cpt->GetSID();
              ?>
              <input type="hidden" name="captcha_code" value="<?=$code?>">
              <div class="col-xs-5"><img class="captcha_img" src="/include/captcha.php?captcha_sid=<?=$code?>"></div>
              <div class="col-xs-2"><a class="refresh"><img src="/layout/images/refresh.png"></a></div>
              <div class="col-xs-1"><span class="here">сюда</span></div>
              <div class="col-xs-4">
                <input name="captcha_word" type="text" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-offset-4 col-xs-8">
            <input type="submit" value="отправить">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</body>
</html>