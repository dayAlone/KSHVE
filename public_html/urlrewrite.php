<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/about/news/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/about/news/index.php",
	),
);

?>