<?

   if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

   /*$APPLICATION -> AddHeadScript("/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/js/jquery.jscrollpane.min.js");*/
   $APPLICATION -> AddHeadScript("/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/js/jquery.jscrollpane.js");
   $APPLICATION -> AddHeadScript("/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/js/jquery.mousewheel.js");
   $APPLICATION -> AddHeadScript("/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/js/mwheelIntent.js");
   $APPLICATION -> AddHeadScript("/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/js/basket.js");

?>
<?
if (count($arResult["ITEMS"])>0)
{
    ?>
    <a class="cart-link" href="/cart">
        <span class="inner-image"></span>
        <span class="quantity-item" incart="<?foreach($arResult["ITEMS"] as $item) echo $item['PRODUCT_ID'].",";?>"><?=count($arResult["ITEMS"])?></span>
    </a>
<?
}
else
{
    ?>
    <a class="cart-link">
        <span class="inner-image"></span>
        <span class="quantity-item">0</span>
    </a>
<?
}
?>