<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (IntVal($arResult["NUM_PRODUCTS"])>0)
{
?>
    <a href="javascript:go2basketHead('/cart/');" class="cart-link">
        <span class="quantity-item"><?=$arResult["NUM_PRODUCTS"]?></span>
    </a>
    <input type="hidden" id="basket_contains" value="<?=$arResult["PRODUCT_ITEMS"]?>">
<?
}
else
{
?>
    <a class="cart-link">
        <span class="quantity-item">0</span>
    </a>
<?
}
?>
