<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult["ITEMS"])?></pre>
<!-- Старт блока со слоганом и телефоном поддержки -->
<div class="wrapper"  style="width: 1072px;">
<section class="slogan-section" style="height: 36px; margin-top: 0; border-bottom: 0px">

        <?if(strlen($arParams["LP_LINK"])):?>
            <div class="slogan-text fmin" onclick="location.href='<?=$arParams["LP_LINK"]?>';" style="cursor: pointer"><?echo $arParams["BLOCK_TITLE"]?></div>
        <?else:?>
            <div class="slogan-text fmin"><?echo $arParams["BLOCK_TITLE"]?></div>
        <?endif?>

</section>
</div>
<!-- Конец блока со слоганом и телефоном поддержки -->

<!-- Начало блока с карточками -->
<div class="catalog pol">
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
            <div class="cart-subject"><?=$arItem["PROPERTY_SUBJECT_VALUE"]?></div>
            <div class="product-item-type product-item-type-footer "><?echo $arItem["NAME"]?></div>
            <?if((int)$arItem['CATALOG_PRICE_1']<VIS_PRICE_LIMIT):?><div class="cart-price"><?echo $arItem["CATALOG_PRICE_1"]?> <span>руб.</span></div><?else:?><div class="cart-subject">Запросить&nbsp;цену</div><?endif?>
        </div>
        <div class="product-item-backside">

            <div class="product-item-type"><?=$arItem['NAME']?></div>
            <div class="cart-text"><?=$arItem['DETAIL_TEXT']?></div>
                <div class="button-block"  onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arItem['DETAIL_PAGE_URL']?>');">
                    <button style="display:none;" class="button btn-in-cart click-btn">Товар уже в корзине</button>
                    <button class="button btn-buy click-btn" onclick="javascript:add2basketPacket(<?=$arItem["ID"]?>);" id="button_add_<?=$arItem["ID"]?>" data-page="CIPage">
                        <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arItem["CATALOG_PRICE_1"]?> <span>руб.</span></span>
                    </button>
                </div>

            <?if(0):?>
            <div class="product-item-type"><?echo $arItem["NAME"]?></div>
            <div class="cart-text"><?echo $arItem["DETAIL_TEXT"]?></div>
            <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?echo $arItem["DETAIL_PAGE_URL"]?>');">
                <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'PacketList'});">Товар уже в корзине</button>
                <?if($arItem["IBLOCK_CODE"]=="items"):?>
                    <form enctype="multipart/form-data" method="post" action="/equipment/basket.php" class="button-submit" id="item_btn_submit_<?=$arItem["ID"]?>">
                        <input type="hidden" value="Артикул: <?=$arItem["PROPERTY_ARTICLE_VALUE"]?>" name="ITEM_PROPERTY[]">
                        <input type="hidden" value="<?=$arItem["NAME"]?>" name="ITEM_NAME">
                        <input type="hidden" value="<?=$arItem["DETAIL_PAGE_URL"]?>" name="ITEM_LINK">
                        <input type="hidden" value="BUY" name="action">
                        <input type="hidden" value="<?=$arItem["ID"]?>" name="id">
                        <input type="hidden" value="КУПИТЬ" name="actionBUY" class="button btn-buy">
                        <?if((int)$arItem['CATALOG_PRICE_1']<VIS_PRICE_LIMIT):?>
                        <button class="button btn-buy" onclick="javascript:$('#item_btn_submit_<?=$arItem["ID"]?>').submit();">
                            <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arItem['CATALOG_PRICE_1']?> <span>руб.</span></span>
                        </button>
                        <?else:?>
                        <button class="button btn-buy" onclick="javascript:formGetPrice('<?=$arItem["ID"]?>','<?=$arItem["NAME"]?>','<?=(int)$arItem['CATALOG_PRICE_1']?>');return false;">
                            <span class="btn-text">Запросить&nbsp;цену</span>
                        </button>
                        <?endif?>
                    </form>
                <?else:?>
                <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'PacketList', 'eventAdd':{'ContentId': 'P26615'}});add2basketPacket(<?echo $arItem["ID"]?>);" id="button_add_26615" data-page="CIPage">
                    <?if((int)$arItem['CATALOG_PRICE_1']<VIS_PRICE_LIMIT):?><span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arItem['CATALOG_PRICE_1']?> <span>руб.</span></span><?else:?><span class="btn-text">Запросить&nbsp;цену</span><?endif?>
                </button>
                <?endif?>

            </div>
            <?endif?>
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

