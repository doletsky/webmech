<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (IntVal($arResult["NUM_PRODUCTS"])>0)
{
?>
    <a class="cart-link" href="/cart/">
        <img src="/bitrix/templates/new-indigos/img/basket.png" class="inner-image"/>
        <span class="quantity-item"><?=$arResult["NUM_PRODUCTS"]?></span>
    </a>
<?
}
else
{
?>
    <a class="cart-link">
        <img src="/bitrix/templates/new-indigos/img/basket.png" class="inner-image"/>
        <span class="quantity-item">0</span>
    </a>
<?
}
?>