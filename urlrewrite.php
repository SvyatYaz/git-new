<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/products/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/products/index.php",
	),
	array(
		"CONDITION" => "#^/services/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/services/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/brands/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/brands/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/shop/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/shop/index.php",
	),
	array(
		"CONDITION" => "#^/articles/([a-zA-Z_0-9-]+)/(\$|\\?.*)#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/Articles/detail.php",
	),
);

?>
