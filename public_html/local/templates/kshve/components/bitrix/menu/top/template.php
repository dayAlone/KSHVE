<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if (!empty($arResult)):?>
<div class="second-nav">
    <div class="frame">
        <div class="shadow-top"></div>
        <div class="shadow-bottom"></div>
		<?
		foreach($arResult as $arItem):

			?><a href="<?=$arItem['LINK']?>" class="<?=($arItem['SELECTED']?'active':'')?>"><?=(isset($arItem['PARAMS']['STRONG'])?'<strong>':'')?><?=$arItem['TEXT']?><?=(isset($arItem['PARAMS']['STRONG'])?'</strong>':'')?></a><?
		endforeach;?>
	</div>
</div>
<?else:?>
<div class="content no-bottom-padding no-top-padding">
	<div class="divider"></div>	
</div>
<?endif;?>
