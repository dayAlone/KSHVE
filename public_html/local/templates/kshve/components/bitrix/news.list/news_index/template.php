<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<div class="item">
        <div class="date">
        	<span class="before"><?=svg('vensel-4')?></span>
        	<span class="text"><?=russian_date($item['DATE'])?></span>
        	<span class="after"><?=svg('vensel-5')?></span>
        </div>
        <div class="row">
        <? if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
          <div class="col-md-4 col-xs-4">
          	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="image">
          		<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>">
          	</a>
          </div>
          <div class="col-md-8 col-xs-8">
        <? else:?>
		  <div class="col-md-12 col-xs-12">
        <?endif;?>
          	<a href="<?=$item['DETAIL_PAGE_URL']?>">
              <p><?=$item['PREVIEW_TEXT']?></p>
            </a>
          </div>
        </div>
     </div>
<?endforeach;?>

