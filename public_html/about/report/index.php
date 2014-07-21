<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отчет о деятельности");
$APPLICATION->SetPageProperty('line', "false");
	$APPLICATION->IncludeComponent("bitrix:news.list", "reports", 
		array(
			"IBLOCK_ID"            => 8,
			"NEWS_COUNT"           => 0,
			"SORT_BY1"             => "SORT",
			"SORT_ORDER1"          => "ASC",
			"DETAIL_URL"           => "#",
			"CACHE_TYPE"           => "A",
			"PROPERTY_CODE"        => Array("FILE"),
			"DISPLAY_PANEL"        => "N",
			"DISPLAY_TOP_PAGER"    => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"SET_TITLE"            => "N"
		),
		false
	);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>