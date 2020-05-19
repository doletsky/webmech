<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult["ITEMS"])?></pre>

<!-- Начало блока с карточками -->
<div class="catalog">
    <div class="wrapper">
<ul class="products-list">
    <?foreach($arResult["ITEMS"] as $arItem):?>
<li class="product-item product-item-set">
    <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="product-link-wrap">
        <div class="product-item-front">
            <div class="cart-class"><?=$arItem["CLASS"]?></div>
            <div class="cart-img-wrap">
                <img src="<?echo $arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>" title="<?echo $arItem["NAME"]?>" class="cart-img">
                <div class="cart-img-overlay"></div>
            </div>
            <div class="cart-subject"></div>
            <div class="product-item-type product-item-type-footer "><?echo $arItem["NAME"]?></div>
            <div class="cart-price"><?echo $arItem["CATALOG_PRICE_1"]?> <span>руб.</span></div>
        </div>
        <div class="product-item-backside">
            <div class="product-item-type"><?echo $arItem["NAME"]?></div>
            <div class="cart-text"><?echo $arItem["DETAIL_TEXT"]?></div>
            <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?echo $arItem["DETAIL_PAGE_URL"]?>');">
                <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'PacketList'});">Товар уже в корзине</button>
                <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'PacketList', 'eventAdd':{'ContentId': 'P26615'}});add2basketPacket(<?echo $arItem["ID"]?>);" id="button_add_26615" data-page="CIPage">
                    <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?echo $arItem["CATALOG_PRICE_1"]?> <span>руб.</span></span>
                </button>

            </div>
        </div>
    </a>
</li>
    <?endforeach?>
</ul>
<div class="clear"></div>
</div>
<script>
    $('#pager a').click(function(){
        var page=new Array();
        var p=$(this).html();
        if(p=='&lt;'){
            page[1]=-1;
        }else{
            if(p=='1'){
                page[1]=1;
            }else{
                var param=$(this).attr('href').split('PAGEN_');
                var num=param[1].slice(0,1);
                page=$(this).attr('href').split('PAGEN_'+num+'=');
            }
        }
        $('.catalog').load('/new-indigos/catalog.php', { target: 'section-we-have', sort_one: '', order_one: '', arrfilterval: 'Y|0|', arrfilterkey: 'ACTIVE&>CATALOG_PRICE_1&', PAGEN_1: page[1] } );
        return false;
    });
</script>


</div>
<!-- Конец блока с карточками -->

