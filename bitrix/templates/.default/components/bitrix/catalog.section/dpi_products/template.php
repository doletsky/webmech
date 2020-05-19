<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?><pre><?//print_r($arResult)?></pre><?
$arParams['HIT_XMLID']['RECOMENDED'] ='cb8bbe26bd4211c75cc2579d5236cd1a';
$arParams['HIT_XMLID']['HIT'] = '05129e781d9fab67837d76c5ace9f42a';
$arFilterKey='';
$arFilterVal='';
if(count($GLOBALS["arrFilter"])>0){
    foreach($GLOBALS["arrFilter"] as $key=>$val){
        $arFilterKey.=$key."&";
        $arFilterVal.=implode('&',$val)."|";
    }
}
$class['price']="";
$class['name']="";
$class['shows']="";
$order['price']="asc";
$order['name']="asc";
$order['shows']="asc";
$arSort=array(
    array(
    "asc"=>"desc",
    "desc"=>"asc"),
    array(
    "asc"=>"up",
    "desc"=>"down")
);
$arTuneSort=array(
    "price"=>$arSort,
    "name"=>$arSort,
    "shows"=>$arSort
);
$order[$_POST['sort_one']]=$arTuneSort[$_POST['sort_one']][0][$_POST['order_one']];
$class[$_POST['sort_one']]=$arTuneSort[$_POST['sort_one']][1][$_POST['order_one']];

?>
    <div class="wrapper">
        <ul class="products-list">
            <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
                <li class="product-item product-item-set">
                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>" class="product-link-wrap">
                        <div class="product-item-front">
                            <div class="cart-class"><pre><?print_r($arElement['PROPERTIES']['AGE'][0])?></pre>
                               <?=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"];?>
                            </div>
                            <div class="cart-img-wrap">
                                <img src="<?=$arElement['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arElement['NAME']?>" title="<?=$arElement['NAME']?>" class="cart-img">
                                <div class="cart-img-overlay"></div>
                                <?if ($arElement['PROPERTIES']['HIT']['VALUE'] == 'Hit'||$arElement['PROPERTIES']['HIT']['VALUE'] == 'Хит'):?>
                                    <div class="marker hit">хит!</div> <!-- маркер ХИТ-->
                                <?endif?>
                            </div>
                            <div class="cart-subject"><?if(!is_array($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"])) echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"]); else echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"][0]);?></div>
                            <div class="product-item-type product-item-type-footer "><?=$arElement['NAME']?></div>
                            <?if((int)$arElement['CATALOG_PRICE_1']>VIS_PRICE_LIMIT):?>
                            <div class="cart-subject">Запросить цену</div>
                            <?else:?><div class="cart-price"><?=$arElement["CATALOG_PRICE_1"]?> <span>руб.</span></div><?endif?>
                        </div>
                        <div class="product-item-backside">

                            <div class="product-item-type"><?=$arElement['NAME']?></div>
                            <div class="cart-text"><?=$arElement['PREVIEW_TEXT']?></div>
                            <?if((int)$arElement['CATALOG_PRICE_1']>VIS_PRICE_LIMIT):?>
                            <div class="cart-subject">Запросить цену</div>
                            <?else:?>
                                <?if($arElement["CATALOG_PRICE_1"]>0):?>
                                    <div class="button-block"  onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arElement['DETAIL_PAGE_URL']?>');">
                                        <button style="display:none;" class="button btn-in-cart">Товар уже в корзине</button>
                                        <button class="button btn-buy click-btn" onclick="javascript:add2basketPacket(<?=$arElement["ID"]?>);" id="button_add_<?=$arElement["ID"]?>" data-page="CIPage">
                                            <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arElement["CATALOG_PRICE_1"]?> <span>руб.</span></span>
                                        </button>
                                    </div>
                                <?else:?>
                                    <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:getItemNullPrice(<?=$arElement['PROPERTIES']['CID']['VALUE']?>,<?=$arElement['ID']?>,\'<?=$arElement['NAME']?>\');');" onmouseout="$(this).parent('div').parent('a').attr('href','/products/<?=$arElement['PROPERTIES']['CID']['VALUE']?>/');">
                                        <button class="button btn-buy click-btn" onclick="" id="button_add_<?=$arElement["ID"]?>" data-page="CIPage" style="text-align: center;">
                                            <span class="btn-text" style="width: 85px;">ПОЛУЧИТЬ</span>
                                        </button>
                                    </div>
                                <?endif?>
                            <?endif?>

                            <?if(0):?>

                            <div class="product-item-type"><?=$arElement['NAME']?></div>
                            <div class="cart-text"><?=$arElement['PREVIEW_TEXT']?></div>
                            <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arElement['DETAIL_PAGE_URL']?>');">
                                <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'PacketList'});">Товар уже в корзине</button>

                                <form enctype="multipart/form-data" method="post" action="/equipment/basket.php" class="button-submit" id="item_btn_submit_<?=$arElement["ID"]?>">
                                    <input type="hidden" value="Артикул: <?=$arElement["PROPERTIES"]["ARTICLE"]["VALUE"]?>" name="ITEM_PROPERTY[]">
                                    <input type="hidden" value="<?=$arElement["NAME"]?>" name="ITEM_NAME">
                                    <input type="hidden" value="<?=$arElement["PAGE_URL"]?>" name="ITEM_LINK">
                                    <input type="hidden" value="BUY" name="action">
                                    <input type="hidden" value="<?=$arElement["ID"]?>" name="id">
                                    <input type="hidden" value="КУПИТЬ" name="actionBUY" class="button btn-buy">
                                    <?if((int)$arElement['CATALOG_PRICE_1']<VIS_PRICE_LIMIT):?>
                                        <button class="button btn-buy" onclick="javascript:$('#item_btn_submit_<?=$arElement["ID"]?>').submit();">
                                            <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arElement['CATALOG_PRICE_1']?> <span>руб.</span></span>
                                        </button>
                                    <?else:?>
                                        <button class="button btn-buy" onclick="javascript:formGetPrice('<?=$arElement["ID"]?>','<?=$arElement["NAME"]?>', '<?=(int)$arElement['CATALOG_PRICE_1']?>');return false;">
                                            <span class="btn-text">Запросить&nbsp;цену</span>
                                        </button>
                                    <?endif?>
                                </form>

                            </div>
                            <?endif?>

                        </div>
                    </a>
                </li>
            <?endforeach?>
        </ul>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <div class="clear"></div>
            <?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
<script>
    $('#pager a').click(function(){
        var page=new Array();
        var p=$(this).html();
        if(p=='&lt;'){
            page[1]=<?=$_POST['PAGEN_1']-1?>;
        }else{
            if(p=='1'){
                page[1]=1;
            }else{
                var param=$(this).attr('href').split('PAGEN_');
                var num=param[1].slice(0,1);
                page=$(this).attr('href').split('PAGEN_'+num+'=');
            }
        }
        <?if(array_key_exists('QSTR', $_POST)):?>
        console.log(page);
        $('.catalog_equipment').load('/new-indigos/catalog_offcont.php', { QSTR: '<?=$_POST['QSTR']?>', PAGEN_1: page[1] } );
        <?else:?>
        location.href=$(this).attr('href');
        <?endif?>
        return false;
    });
</script>


