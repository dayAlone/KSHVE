<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
	$APPLICATION->IncludeComponent("bitrix:news.list", "reviews", 
		array(
			"IBLOCK_ID"            => 7,
			"NEWS_COUNT"           => 15,
			"SORT_BY1"             => "SORT",
			"SORT_ORDER1"          => "ASC",
			"DETAIL_URL"           => "#",
			"CACHE_TYPE"           => "A",
			"DISPLAY_PANEL"        => "N",
			"DISPLAY_TOP_PAGER"    => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"SET_TITLE"            => "N"
		),
		false
	);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>