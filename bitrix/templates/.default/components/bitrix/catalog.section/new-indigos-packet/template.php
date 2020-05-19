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
                            <div class="cart-class">
                                <?if(is_array($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])) echo strip_tags($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"][0]);
                                else
                                    if(strlen(strip_tags($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"]))>0) echo  strip_tags($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"]);
                                    else
                                        if(is_array($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])) echo strip_tags($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"][0]);
                                        else echo  strip_tags($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"]);?>
                            </div>
                            <div class="cart-img-wrap">
                                <img src="<?=$arElement['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arElement['NAME']?>" title="<?=$arElement['NAME']?>" class="cart-img">
                                <div class="cart-img-overlay"></div>
                                <?if ($arElement['PROPERTIES']['HIT']['VALUE'] == 'Hit'||$arElement['PROPERTIES']['HIT']['VALUE'] == 'Хит'):?>
                                    <div class="marker hit">хит!</div> <!-- маркер ХИТ-->
                                <?endif?>
                                <div class="marker cart-set-number"><?=count($arElement['PROPERTIES']['BOOKS']['VALUE'])?> в 1</div>
                            </div>
                            <div class="cart-subject"><?if(!is_array($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"])) echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"]); else echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"][0]);?></div>
                            <div class="product-item-type product-item-type-footer "><?=$arElement['NAME']?></div>
                            <div class="cart-price"><?=$arElement["CATALOG_PRICE_1"]?> <span>руб.</span></div>
                        </div>
                        <div class="product-item-backside">
                            <div class="product-item-type"><?=$arElement['NAME']?></div>
                            <div class="cart-text"><?=$arElement['PREVIEW_TEXT']?></div>
                            <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arElement['DETAIL_PAGE_URL']?>');">
                                <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'PacketList'});">Товар уже в корзине</button>
                                <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'PacketList', 'eventAdd':{'ContentId': 'P<?=$arElement['ID']?>'}});add2basketPacket(<?=$arElement["ID"]?>);" id="button_add_<?=$arElement["ID"]?>" data-page="CIPage">
                                    <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arElement["CATALOG_PRICE_1"]?> <span>руб.</span></span>
                                </button>

                            </div>
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
        $('.catalog').load('/new-indigos/catalog.php', { QSTR: '<?=$_POST['QSTR']?>', PAGEN_1: page[1] } );
        <?else:?>
        $('.catalog').load('/new-indigos/catalog.php', { target: '<?=$_POST['target']?>', sort_one: '<?=$_POST['sort_one']?>', order_one: '<?=$_POST['order_one']?>', arrfilterval: '<?=$arFilterVal?>', arrfilterkey: '<?=$arFilterKey?>', PAGEN_1: page[1] } );
        <?endif?>
        return false;
    });
</script>


