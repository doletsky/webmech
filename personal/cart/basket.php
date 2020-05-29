<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"",
	Array(
		"PATH_TO_ORDER" => "/personal/cart/order.php",
		"HIDE_COUPON" => "N",
		"COLUMNS_LIST" => array("NAME", "DISCOUNT", "DELETE", "PRICE", "SUM", "PROPERTY_COURSE_ID"),
		"PRICE_VAT_SHOW_VALUE" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"ACTION_VARIABLE" => "action",
        "PACKET" => $_SESSION["lid"]["packet"]
	),
false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


