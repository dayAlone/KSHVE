<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['SECTIONS'])>0):
?>
  <div class="third-nav">
    <?=svg('vensel-6')?>
      <?foreach ($arResult['SECTIONS'] as $key => &$item):?>
      	 <a href="/about/news/<?=$item['NAME']?>/" <?=((isset($_REQUEST['ELEMENT_CODE'])&&$_REQUEST['ELEMENT_CODE']==$item['NAME'])||(!isset($_REQUEST['ELEMENT_CODE'])&&date('Y')==$item['NAME'])?'class="active"':'')?>>
          <?=$item['NAME']?>
         </a>
      <?endforeach;?>
    <?=svg('vensel-7')?>
  </div>
<?endif;?>