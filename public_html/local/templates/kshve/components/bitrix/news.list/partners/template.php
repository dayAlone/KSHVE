<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<a href="<?=$item['LINK']?>">
		<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
	</a>	
<?endforeach;?>

