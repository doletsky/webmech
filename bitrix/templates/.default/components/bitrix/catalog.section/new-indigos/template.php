<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
        <?if(0):?>
        <div class="main-filter-buttons">
            <span>Сортировать по: </span>
            <a href="#" onclick="$('.catalog').load('/new-indigos/catalog.php', { target: '<?=$_POST['target']?>', sort_one: 'price', order_one: '<?=$order['price']?>', arrfilterval: '<?=$arFilterVal?>', arrfilterkey: '<?=$arFilterKey?>' } );return false;" class="<?=$class['price']?>">цене</a>
            <a href="#" onclick="$('.catalog').load('/new-indigos/catalog.php', { target: '<?=$_POST['target']?>', sort_one: 'name', order_one: '<?=$order['name']?>', arrfilterval: '<?=$arFilterVal?>', arrfilterkey: '<?=$arFilterKey?>' } );return false;" class="<?=$class['name']?>">алфавиту</a>
            <a href="#" onclick="$('.catalog').load('/new-indigos/catalog.php', { target: '<?=$_POST['target']?>', sort_one: 'shows', order_one: '<?=$order['shows']?>', arrfilterval: '<?=$arFilterVal?>', arrfilterkey: '<?=$arFilterKey?>' } );return false;" class="<?=$class['shows']?>">популярности</a>
            <a href="#" onclick="$('.catalog').load('/new-indigos/catalog.php', { target: '<?=$_POST['target']?>', sort: 'default', arrfilterval: '<?=$arFilterVal?>', arrfilterkey: '<?=$arFilterKey?>' } );return false;">умолчанию</a>
        </div>
        <?endif?>
        <ul class="products-list">
            <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

                <?
                foreach($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"] as $k=>$classes)$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"][$k]=strip_tags($classes);
                foreach($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"] as $k=>$year)$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"][$k]=strip_tags($year);
                //class-year min
                if(is_array($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])){
                    sort($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"], SORT_NUMERIC);
                    $min=$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"][0];

                }
                elseif(strlen($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])>0) {
                    $min=$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"];
                }
                elseif(is_array($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])&&count($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])>1) {
                    sort($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"], SORT_NUMERIC);
                    $min=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"][0];
                }
                elseif(strlen($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])>0) {
                    $min=$max=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"];
                }
                else{
                    $min=$max=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"][0];
                }

                //class-year max
                if(is_array($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])) {
                    rsort($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"], SORT_NUMERIC);
                    $max=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"][0];
                }
                elseif(strlen($arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"])>0){
                    $max=$arElement['DISPLAY_PROPERTIES']["CLASS"]["DISPLAY_VALUE"];
                }
                elseif(is_array($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])&&count($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])>1){
                    rsort($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"], SORT_NUMERIC);
                    $max=$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"][0];
                }
                elseif(strlen($arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"])>0) {
                    $min=$max=$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"];
                }
                else{
                    $min=$max=$arElement['DISPLAY_PROPERTIES']["YEAR"]["DISPLAY_VALUE"][0];
                }

                if($min!=$max){
                    $subStr=explode(" ",$max);end($subStr);
                    if(substr_count($min,current($subStr))){
                        $min=str_replace(" ".current($subStr),"",$min);
                    }
                }

                ?>
                <li class="product-item">
                    <a href="/products/<?=$arElement['PROPERTIES']['CID']['VALUE']?>/" class="product-link-wrap">
                        <div class="product-item-front">
                            <div class="cart-class"><?=strip_tags($min)?><?if($min!=$max):?> - <?=strip_tags($max)?><?endif?></div>
                            <div class="cart-img-wrap">
                                <img src="<?=LINK_PREVIEW.$arElement['PROPERTIES']['CID']['VALUE']?>_logo-s.png" alt="<?=$arElement['NAME']?>" title="<?=$arElement['NAME']?>" class="cart-img">
                                <div class="cart-img-overlay"></div>
                                <?if ($arElement['PROPERTIES']['HIT']['VALUE'] == 'Hit'||$arElement['PROPERTIES']['HIT']['VALUE'] == 'Хит'):?>
                                    <div class="marker hit">хит!</div>
                                <?elseif($arElement['PROPERTIES']['HIT']['VALUE'] == 'Recommended'):?>
                                    <div class="marker choice">наш выбор!</div>
                                <?endif?>
                            </div>
                            <div class="cart-subject"><?if(!is_array($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"])) echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"]); else echo strip_tags($arElement['DISPLAY_PROPERTIES']["SUBJECT"]["DISPLAY_VALUE"][0]);?></div>
                            <div class="product-item-type product-item-type-footer "><?if(strlen($arElement['PROPERTIES']['SHORT_NAME']['VALUE'])>0) echo $arElement['PROPERTIES']['SHORT_NAME']['VALUE']; else echo TruncateText($arElement['NAME'], 35)?></div>
                            <div class="cart-price"><?=$arElement["CATALOG_PRICE_1"]?> <span>руб.</span></div>
                        </div>
                        <div class="product-item-backside">
                            <div class="product-item-type"><?if(strlen($arElement['PROPERTIES']['SHORT_NAME']['VALUE'])>0) echo $arElement['PROPERTIES']['SHORT_NAME']['VALUE']; else echo TruncateText($arElement['NAME'], 45)?></div>
                            <div class="cart-text"><?if(strlen(trim($arElement['PROPERTIES']['MARK_TEXT']['VALUE']))>0) echo $arElement['PROPERTIES']['MARK_TEXT']['VALUE']; else echo $arElement['PROPERTIES']['FEATURE']['VALUE']['TEXT'];?></div>
                                <ul class="product-download-list">
                                    <?if(in_array('MacOS',$arElement['PROPERTIES']['PLATFORM']['VALUE'])):?>
                                        <li class="product-download-item mac"><span class="product-download-name">MacOS</span></li>
                                    <?endif?>
                                    <?if(in_array('iOS',$arElement['PROPERTIES']['PLATFORM']['VALUE'])):?>
                                        <li class="product-download-item ios"><span class="product-download-name">iOS</span></li>
                                    <?endif?>
                                    <?if(in_array('Windows',$arElement['PROPERTIES']['PLATFORM']['VALUE'])||strlen($arElement['PROPERTIES']['PLATFORM']['VALUE'])==0):?>
                                        <li class="product-download-item win"><span class="product-download-name">Windows</span></li>
                                    <?endif?>
                                    <?if(in_array('Android',$arElement['PROPERTIES']['PLATFORM']['VALUE'])):?>
                                        <li class="product-download-item android"><span class="product-download-name">Android</span></li>
                                    <?endif?>
                                </ul>
                                <?if($arElement["CATALOG_PRICE_1"]>0):?>
                                <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','/products/<?=$arElement['PROPERTIES']['CID']['VALUE']?>/');">
                                    <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'CIList'});">Товар уже в корзине</button>
                                    <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'CIList', 'eventAdd':{'ContentId': '<?=$arElement['PROPERTIES']['CID']['VALUE']?>'}});add2basketPacket(<?=$arElement["ID"]?>);" id="button_add_<?=$arElement["ID"]?>" data-page="CIPage">
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


