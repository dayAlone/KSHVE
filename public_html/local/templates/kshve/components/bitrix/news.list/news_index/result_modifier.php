<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['DATE'] = strtotime($item['PROPERTIES']['DATE']['VALUE']);
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 240, "height" => 180), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
	endforeach;
?>

