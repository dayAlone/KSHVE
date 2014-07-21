<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/education/directions/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/education/directions/index.php",
	),
	array(
		"CONDITION" => "#^/about/news/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/about/news/index.php",
	),
);

?>