<?
define('NEED_FILTER', true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Индигос.ru — магазин образовательного контента");
?>

<?

//Проверяем валидность поля ELEMENT_SORT_FIELD
switch ($_GET["sort_one"]) {
    case "price":
        $sortFieldOne = 'CATALOG_PRICE_1';
        break;
    case "shows":
        $sortFieldOne = $_GET["sort_one"];
        break;
    case "timestamp_x":
        $sortFieldOne = $_GET["sort_one"];
        break;
    case "name":
        $sortFieldOne = "NAME";
        break;
    case "active_from":
        $sortFieldOne = $_GET["sort_one"];
        break;
    case "active_to":
        $sortFieldOne = $_GET["sort_one"];
        break;
    case "CATALOG_AVAILABLE":
        $sortFieldOne = $_GET["sort_one"];
        break;
    default://Если не валидный, выводим стандарное значение
    	$sortFieldOne = 'PROPERTY_RAND';
}

//Проверяем валидность поля ELEMENT_SORT_ORDER
switch ($_GET["order_one"]) {
    case "asc":
        $sortOrderOne = $_GET["order_one"];
        break;
    case "desc":
        $sortOrderOne = $_GET["order_one"];
        break;
    default://Если не валидный, выводим стандарное значение
    	$sortOrderOne = 'desc';
}

//Проверяем валидность поля ELEMENT_SORT_FIELD2
switch ($_GET["sort_two"]) {
    case "shows":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "sort":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "timestamp_x":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "name":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "active_from":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "active_to":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    case "CATALOG_AVAILABLE":
        $sortFieldTwo = $_GET["sort_two"];
        break;
    default://Если не валидный, выводим стандарное значение
    	$sortFieldTwo = 'CATALOG_PRICE_1';
}

//Проверяем валидность поля ELEMENT_SORT_ORDER2
switch ($_GET["order_two"]) {
    case "asc":
        $sortOrderTwo = $_GET["order_two"];
        break;
    case "desc":
        $sortOrderTwo = $_GET["order_two"];
        break;
    default://Если не валидный, выводим стандарное значение
		$sortOrderTwo = 'desc';
}

if ($_GET["sort"] == "default") {
	$sortFieldOne = "RAND";
}

?><?$APPLICATION->IncludeComponent("bitrix:catalog.section", "bar", array(
	"IBLOCK_TYPE" => "books",
	"IBLOCK_ID" => "9",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => $sortFieldOne,
	"ELEMENT_SORT_ORDER" => $sortOrderOne,
	"ELEMENT_SORT_FIELD2" => $sortOrderTwo,
	"ELEMENT_SORT_ORDER2" => $sortOrderTwo,
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"HIDE_NOT_AVAILABLE" => "N",
	"PAGE_ELEMENT_COUNT" => "12",
	"LINE_ELEMENT_COUNT" => "4",
	"PROPERTY_CODE" => array(
		0 => "CID",
		1 => "ED_TYPE",
		2 => "CLASS",
		3 => "SUBJECT",
		4 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TIME" => "60",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "Y",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Учебники",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "arrows",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>