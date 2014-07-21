<?
	$isIndex = $APPLICATION->GetCurPage(false) == SITE_DIR;
	
	AddEventHandler("main", "OnEndBufferContent", "OnEndBufferContentHandler");
	function OnEndBufferContentHandler(&$content)
	{
	   $pattern = '/{GALLERY:(\d*|\s\d*)}/i';
	   if(preg_match($pattern, $content, $matches, false, false)):
	   	ob_start();
	   		global $APPLICATION;
			$APPLICATION->IncludeComponent("bitrix:news.detail","gallery",Array(
				"IBLOCK_ID"     => "4",
				"ELEMENT_ID"    => $matches[1],
				"CHECK_DATES"   => "N",
				"IBLOCK_TYPE"   => "content",
				"SET_TITLE"     => "N",
				"PROPERTY_CODE" => Array("IMAGES"),
				"CACHE_TYPE"    => "A",
				"CACHE_TIME"    => "3600",
			));
	   		$gallery = ob_get_contents();
		ob_end_clean();
	   	$content = str_replace($matches[0], $gallery, $content);
	   endif;

	   $pattern = '/{IMAGE:(\d*|\s\d*)}/i';
	   if(preg_match($pattern, $content, $matches, false, false)):
	   	ob_start();
	   		global $APPLICATION;
			$APPLICATION->IncludeComponent("bitrix:news.detail","image",Array(
				"IBLOCK_ID"     => "5",
				"ELEMENT_ID"    => $matches[1],
				"CHECK_DATES"   => "N",
				"IBLOCK_TYPE"   => "content",
				"SET_TITLE"     => "N",
				"CACHE_TYPE"    => "A",
				"CACHE_TIME"    => "3600",
			));
	   		$gallery = ob_get_contents();
		ob_end_clean();
	   	$content = str_replace($matches[0], $gallery, $content);
	   endif;

	   $pattern = '/(<div class=\"content\">(\s+)<\/div>|<div>(\s+)<\/div>)/i';
	   $content = preg_replace($pattern, "", $content);
	}

	function svg($value='')
	{
		$path = $_SERVER["DOCUMENT_ROOT"]."/layout/images/svg/".$value.".svg";
		return file_get_contents($path);
	}
	function body_class() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('body_class')) {
			return $APPLICATION->GetPageProperty('body_class');
		}
	}
	function russian_date($date)
	{
		switch (date('n', $date)){
			case 1: $m  ='января';   break;
			case 2: $m  ='февраля';  break;
			case 3: $m  ='марта';    break;
			case 4: $m  ='апреля';   break;
			case 5: $m  ='мая';      break;
			case 6: $m  ='июня';     break;
			case 7: $m  ='июля';     break;
			case 8: $m  ='августа';  break;
			case 9: $m  ='сентября'; break;
			case 10: $m ='октября';  break;
			case 11: $m ='ноября';   break;
			case 12: $m ='декабря';  break;
		}
		return date('d ', $date).$m.date(' Y', $date);
	}
?>