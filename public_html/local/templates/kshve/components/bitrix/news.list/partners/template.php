<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<a href="<?=$item['LINK']?>" target="_blank">
		<img src="<?=$item['LOGO']?>" alt="">
	</a>	
<?endforeach;?>

