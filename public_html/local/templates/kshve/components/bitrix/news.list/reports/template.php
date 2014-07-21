<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="files">
	<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<a href="<?=$item['FILE']?>"><span><?=$item['NAME']?></span></a>
	<?endforeach;?>
</div>