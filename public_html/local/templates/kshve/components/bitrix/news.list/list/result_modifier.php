<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$small = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 360, "height" => 360), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
		$item['PREVIEW_PICTURE']['SMALL'] = $small['src'];
		$item['VIDEO'] = $item['PROPERTIES']['VIDEO']['VALUE'];
	endforeach;
?>