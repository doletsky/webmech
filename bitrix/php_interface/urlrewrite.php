<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/articles/([0-9a-z_]+)/#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "forque:news.detail",
		"PATH" => "/articles/index.php",
	),
	array(
		"CONDITION" => "#^/products/([0-9]+)/.*#",
		"RULE" => "ELEMENT_ID=\$1",
		"ID" => "",
		"PATH" => "/products/index.php",
	),
	array(
		"CONDITION" => "#^/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^/about/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/about/idea/index.php",
	),
	array(
		"CONDITION" => "#^/catalog(.*)#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/index.php",
	),
	array(
		"CONDITION" => "#^/equipment/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/equipment/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/books/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/books/index.php",
	),
	array(
		"CONDITION" => "#^/store/#",
		"RULE" => "",
		"ID" => "bitrix:catalog.store",
		"PATH" => "/store/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
	array(
		"CONDITION" => "#^/blog/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/blog/index.php",
	),
);

?>