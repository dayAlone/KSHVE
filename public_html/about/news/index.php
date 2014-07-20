<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
	<?php
	  $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
	  array(
	  "IBLOCK_ID"            => 1,
	  "NEWS_COUNT"           => "8",
	  "SORT_BY1"             => "SORT",
	  "SORT_ORDER1"          => "ASC",
	  "PROPERTY_CODE"        => "",
	  "DETAIL_URL"           => "#",
	  "CACHE_TYPE"           => "A",
	  "DISPLAY_PANEL"        => "N",
	  "DISPLAY_TOP_PAGER"    => "N",
	  "DISPLAY_BOTTOM_PAGER" => "N",
	  "SET_TITLE"            => "N"
	     ),
	     false
	  );
	?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>