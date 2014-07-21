<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
</div>
<div class="reviews">
	<?foreach ($arResult['ITEMS'] as $key => &$item):?>
		<a href="<?=$item['PREVIEW_PICTURE']['SRC']?>" rel="prettyPhoto[]" class="item">
	    	<div style="background-image: url(<?=$item['SMALL']?>)" class="image"></div>
	    	<span class="text"><?=$item['NAME']?></span>
	    </a>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	  <?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
<div>