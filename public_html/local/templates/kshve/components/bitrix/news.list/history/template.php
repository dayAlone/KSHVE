<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="history">
  <div class="triggers"><?=svg('vensel-6')?><?foreach ($arResult['ITEMS'] as $key => &$item):?><a href="#" <?=($key==0?"class='active'":"")?>><?=$item['NAME']?></a><?endforeach;?><?=svg('vensel-7')?>
  </div>
  <div class="content">
    <?foreach ($arResult['ITEMS'] as $key => &$item):?>
      <div data-year="<?=$item['NAME']?>" class="item <?=($key==0?"active":"")?>">
        <p><?=$item['PREVIEW_TEXT']?></p>
      </div>
    <?endforeach;?>
  </div>
</div>
<div class="divider"></div>
<style>
  #content > .text .history .triggers::after {
    width: <?=100-(100/count($arResult['ITEMS']))?>%;
    left: <?=(100/count($arResult['ITEMS']))/2?>%;
  }
  #content > .text .history .triggers a {
    width: <?=(100/count($arResult['ITEMS']))?>%;
  }
</style>