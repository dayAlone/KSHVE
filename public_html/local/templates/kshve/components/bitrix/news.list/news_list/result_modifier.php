<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['DATE'] = strtotime($item['PROPERTIES']['DATE']['VALUE']);
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 360, "height" => 360), BX_RESIZE_IMAGE_EXACT, false, false, false, 100);
		$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
	endforeach;
?>
