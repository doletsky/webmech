<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "PRODUCT_ID" => $_POST['id'],
        "ORDER_ID" => "NULL",
        "FUSER_ID" => CSaleBasket::GetBasketUserID()
    ),
    false,
    false,
    array("ID", "CALLBACK_FUNC", "MODULE",
        "PRODUCT_ID", "QUANTITY", "DELAY",
        "CAN_BUY", "PRICE", "WEIGHT", "PRODUCT_PROVIDER_CLASS", "NAME")
);
if ($arItems = $dbBasketItems->Fetch())
{
    $arFields = array(
        "QUANTITY" => $_POST['quan']
    );
    CSaleBasket::Update($arItems['ID'], $arFields);
}


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>