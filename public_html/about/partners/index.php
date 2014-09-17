<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Стратегические партнеры");
$APPLICATION->SetPageProperty('line', "false");
$APPLICATION->SetPageProperty('body_class', "logos");
?>
	</div>
  		<?
  			global $partners_filter;
            $partners_filter = array("PROPERTY_LIST"=>false);
  			$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
				array(
					"IBLOCK_ID"            => 2,
					"NEWS_COUNT"           => 0,
					"SORT_BY1"             => "SORT",
					"SORT_ORDER1"          => "ASC",
					"FILTER_NAME"          => "partners",
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
		?>
  	<div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>