<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");

	global $news_filter;
	$news_filter = array(
	"<=PROPERTY_DATE" => date('Y-m-d')." 23:59:59"
	);
	$APPLICATION->IncludeComponent("bitrix:news.list", "news_list", 
	array(
	"IBLOCK_ID"            => 1,
	"NEWS_COUNT"           => "3",
	"SORT_BY1"             => "PROPERTY_DATE",
	"SORT_ORDER1"          => "DESC",
	"FILTER_NAME"          => "news_filter",
	"PROPERTY_CODE"        => Array("DATE"),
	"DETAIL_URL"           => "/about/news/#CODE#/",
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