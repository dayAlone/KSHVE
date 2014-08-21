<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Советы всадникам");
$APPLICATION->SetPageProperty('line', "false");
?>
</div>
<?
	
	if($_REQUEST['ELEMENT_CODE']):
		$APPLICATION->IncludeComponent("bitrix:news.detail","list",Array(
			"IBLOCK_ID"     => "13",
			"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
			"CHECK_DATES"   => "N",
			"IBLOCK_TYPE"   => "content",
			"SET_TITLE"     => "N",
			"PROPERTY_CODE" => Array("IMAGES"),
			"CACHE_TYPE"    => "A",
			"CACHE_TIME"    => "3600",
		));
	else:
		$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
			array(
				"IBLOCK_ID"            => 13,
				"NEWS_COUNT"           => 10,
				"SORT_BY1"             => "SORT",
				"SORT_ORDER1"          => "ASC",
				"DETAIL_URL"           => "/faq/#ELEMENT_CODE#/",
				"CACHE_TYPE"           => "A",
				"PROPERTY_CODE"        => Array("IMAGES"),
				"DISPLAY_PANEL"        => "N",
				"DISPLAY_TOP_PAGER"    => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"SET_TITLE"            => "N",
				"SHOW_MORE"            => "Y"
			),
			false
		);
	endif;
?>
<div>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>