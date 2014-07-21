<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['LINK'] = (strlen($item['PROPERTIES']['LINK']['VALUE'])>0?$item['PROPERTIES']['LINK']['VALUE']:"#");
		$small = CFile::ResizeImageGet($item['PROPERTIES']['LOGO']['VALUE'], Array("width" => 90, "height" => 42), BX_RESIZE_IMAGE_EXACT, false, false, false, 100);
		$item['LOGO'] = $small['src'];
	endforeach;
?>

