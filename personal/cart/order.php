<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>Text here....
<?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.full",
	"",
	Array(
		"PATH_TO_BASKET" => "basket.php",
		"PATH_TO_PERSONAL" => "index.php",
		"PATH_TO_AUTH" => "/auth.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"ALLOW_PAY_FROM_ACCOUNT" => "N",
		"SHOW_MENU" => "Y",
		"USE_AJAX_LOCATIONS" => "N",
		"SHOW_AJAX_DELIVERY_LINK" => "S",
		"CITY_OUT_LOCATION" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"SET_TITLE" => "N",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"DELIVERY_NO_SESSION" => "N",
		"PAY_SYSTEM_ID" => 6,
		"PROP_1" => array("4", "5", "6", "7")
	),
false
);?>
<br>========<br>
<?//$APPLICATION->IncludeComponent("bitrix:sale.order.payment","",Array(),false);?>
<pre><?print_r($_REQUEST)?></pre>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>