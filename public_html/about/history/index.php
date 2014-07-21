<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История");
$APPLICATION->SetPageProperty('line', "false");
?>
	{IMAGE:16}
<?
	$APPLICATION->IncludeComponent("bitrix:news.list", "history", 
		array(
			"IBLOCK_ID"            => 6,
			"NEWS_COUNT"           => 0,
			"SORT_BY1"             => "NAME",
			"SORT_ORDER1"          => "ASC",
			"DETAIL_URL"           => "#",
			"CACHE_TYPE"           => "A",
			"DISPLAY_PANEL"        => "N",
			"DISPLAY_TOP_PAGER"    => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"SET_TITLE"            => "N"
		),
		false
	);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>