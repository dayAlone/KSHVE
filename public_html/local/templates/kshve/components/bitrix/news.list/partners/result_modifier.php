<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['LINK'] = (strlen($item['PROPERTIES']['LINK']['VALUE'])>0?$item['PROPERTIES']['LINK']['VALUE']:"#");
	endforeach;
?>

