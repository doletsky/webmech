<?$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "sidebar", array(
	"IBLOCK_TYPE" => "books",
	"IBLOCK_ID" => "9",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"FILTER_NAME" => "arrFilter",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"SAVE_IN_SESSION" => "N",
	"INSTANT_RELOAD" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	)
	),
	false
);?>