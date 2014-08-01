<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
$APPLICATION->SetPageProperty('line', "false");
?>
</div>
<?
	CModule::IncludeModule("iblock");
	$display_pages = "Y";
	$news_count    = 8;
	$section       = false;
	$detail        = true;
	$arSort = array("SORT" => "ASC");
	$arFilter = array("IBLOCK_ID" => 1, "NAME"=> array($_REQUEST['ELEMENT_CODE'],date('Y')));
	$rsSections = CIBlockSection::GetList($arSort, $arFilter);
	while($arSection = $rsSections->GetNext()) {
		if(date('Y')==$arSection['NAME']) {
			$section = $arSection['ID'];
			$detail = false;
		}
		if(isset($_REQUEST['ELEMENT_CODE'])) {
			if($_REQUEST['ELEMENT_CODE']==$arSection['NAME']) {
				$section = $arSection['ID'];
				$detail = false;
			}
			else
				$detail = true;	
		}
	}

	if($detail):
		$APPLICATION->SetPageProperty('line', "true");
		$APPLICATION->IncludeComponent("bitrix:news.detail","news",Array(
			"IBLOCK_ID"     => "1",
			"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
			"CHECK_DATES"   => "N",
			"IBLOCK_TYPE"   => "content",
			"SET_TITLE"     => "N",
			"PROPERTY_CODE" => Array("IMAGES", "DATE"),
			"CACHE_TYPE"    => "A",
			"CACHE_TIME"    => "3600",
		));
		$display_pages = "N";
		$news_count    = 4;
	else:
		$APPLICATION->IncludeComponent("bitrix:catalog.section.list","years",
		Array(
			"IBLOCK_ID"           => 1,
			"TOP_DEPTH"           => "1",
			"CACHE_TYPE"          => "N",
			"CACHE_GROUPS"        => "Y"
		)	
		);
	endif;
	global $news_filter;
	$news_filter = array(
	"<=PROPERTY_DATE" => date('Y-m-d')." 23:59:59"
	);
	$APPLICATION->IncludeComponent("bitrix:news.list", "news_list", 
		array(
			"IBLOCK_ID"            => 1,
			"NEWS_COUNT"           => $news_count,
			"SORT_BY1"             => "PROPERTY_DATE",
			"PARENT_SECTION"       => $section,
			"SORT_ORDER1"          => "DESC",
			"FILTER_NAME"          => "news_filter",
			"PROPERTY_CODE"        => Array("DATE"),
			"DETAIL_URL"           => "/about/news/#CODE#/",
			"CACHE_TYPE"           => "A",
			"DISPLAY_PANEL"        => "N",
			"DISPLAY_TOP_PAGER"    => "N",
			"DISPLAY_BOTTOM_PAGER" => $display_pages,
			"SET_TITLE"            => "N"
		),
		false
	);
	?><div><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>