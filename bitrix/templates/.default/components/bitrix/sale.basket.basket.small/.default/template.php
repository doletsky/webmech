<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult)?></pre>
<?
if (count($arResult["ITEMS"])>0)
{
    ?>
    <a class="cart-link" href="/cart">
        <img src="/bitrix/templates/new-indigos/img/basket.png" class="inner-image"/>
        <span class="quantity-item" incart="<?foreach($arResult["ITEMS"] as $item) echo $item['PRODUCT_ID'].",";?>"><?=count($arResult["ITEMS"])?></span>
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