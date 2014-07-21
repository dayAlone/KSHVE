<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$item = &$arResult;
?>
<div class="third-nav">
<?=svg('vensel-6')?><span class="date"><?=russian_date($item['DATE'])?></span><?=svg('vensel-7')?>
</div>
<div class="content no-bottom-padding small-top-padding small-bottom-margin">
	<h1 class="center small-bottom-margin small-bottom-padding"><?=$item['NAME']?></h1>
	<?=$item['~DETAIL_TEXT']?>
	<h1 class="center">Предыдущие новости</h1>
</div>