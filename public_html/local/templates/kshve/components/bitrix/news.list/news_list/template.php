<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news">
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	  <div class="item">
        <div class="frame">
        <? if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
          <a style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="image" href="<?=$item['DETAIL_PAGE_URL']?>"></a>
        <? endif ?>
          <div class="date"><?=svg('vensel-4')?><?=svg('vensel-5')?>
            <div class="line"></div>
            <span class="text"><?=russian_date($item['DATE'])?></span>
          </div>
          <a href="<?=$item['DETAIL_PAGE_URL']?>" class="title"><?=$item['NAME']?></a>
          <p><?=$item['PREVIEW_TEXT']?></p>
        </div>
      </div>
<?endforeach;?>
</div>
<?
if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?>
<?endif;?>