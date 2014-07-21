<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$item = &$arResult;
?>
<div class="content no-bottom-padding small-top-padding small-bottom-margin">
	<h1 class="center small-bottom-margin small-bottom-padding"><?=$item['NAME']?></h1>
	<?=$item['~DETAIL_TEXT']?>
	<?
		if(count($item['IMAGES'])>0):?>
		<div class="divider"></div>
		<div class="gallery">
		    <div class="slider">
		        <? foreach ($item['IMAGES'] as $img):?>
		            <div class="item">
		                <a href="<?=$img['value']?>" rel="prettyPhoto[]" style="background-image: url(<?=$img['small']?>)" class="image">
		                </a>
		            </div>
		        <? endforeach;?>
		    </div>
		</div>

	<?
		endif;
	?>
</div>