<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['FILE'] = CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']);
	endforeach;
?>

