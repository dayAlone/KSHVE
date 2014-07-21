<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if($arResult["nStartPage"]!=$arResult["nEndPage"]):
?>
<div class="pages">
	<?
	$i = $arResult["nStartPage"];
	while($i <= $arResult["nEndPage"]):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>" <?=($i==$arResult["NavPageNomer"]?'class="active"':"")?>><?=$i?></a>
	<?
	$i++;
	endwhile;?>
</div>
<?endif;?>