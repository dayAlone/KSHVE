<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$item = &$arResult;
?>
<div class="content no-bottom-padding small-top-padding small-bottom-margin">
	<h1 class="center small-bottom-margin small-bottom-padding"><?=$item['NAME']?></h1>
	<?=$item['~DETAIL_TEXT']?>
</div>