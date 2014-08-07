<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тренерский состав");
$APPLICATION->SetPageProperty('line', "false");
$APPLICATION->SetPageProperty('body_class', "trainers");
?>
</div>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
	array(
		"IBLOCK_ID"            => 10,
		"NEWS_COUNT"           => 10,
		"SORT_BY1"             => "SORT",
		"SORT_ORDER1"          => "ASC",
		"DETAIL_URL"           => "#",
		"CACHE_TYPE"           => "A",
		"PROPERTY_CODE"        => Array("VIDEO"),
		"DISPLAY_PANEL"        => "N",
		"DISPLAY_TOP_PAGER"    => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"SET_TITLE"            => "N",
		"DISPLAY_POPUP"        => "Y"
	),
	false
);
	
?>
<div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>