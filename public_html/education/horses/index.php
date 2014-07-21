<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Конный состав");
$APPLICATION->SetPageProperty('line', "false");
?>
</div>
<?
	$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
	array(
		"IBLOCK_ID"            => 11,
		"NEWS_COUNT"           => 10,
		"SORT_BY1"             => "SORT",
		"SORT_ORDER1"          => "ASC",
		"DETAIL_URL"           => "#",
		"CACHE_TYPE"           => "A",
		"PROPERTY_CODE"        => Array(),
		"DISPLAY_PANEL"        => "N",
		"DISPLAY_TOP_PAGER"    => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"SET_TITLE"            => "N"
	),
	false
);
?>
<div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>