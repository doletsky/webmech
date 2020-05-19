<? if ( ! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();
$strProp="";
foreach($_POST["ITEM_PROPERTY"] as $prop){
    $strProp=$prop.PHP_EOL;
}
$item_order=$_POST["ITEM_NAME"].PHP_EOL.$strProp;
unset($arResult["QUESTIONS"]["order_num"]);
$arResult["QUESTIONS"]["order_item"]["HTML_CODE"] = str_replace("#ITEM_ORDER#",$item_order,$arResult["QUESTIONS"]["order_item"]["HTML_CODE"]);
$arResult["QUESTIONS"]["order_item"]["HTML_CODE"] = str_replace("name"," disabled='disabled' name",$arResult["QUESTIONS"]["order_item"]["HTML_CODE"]);
?>