<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    $arParams['HIT_XMLID']['RECOMENDED'] ='cb8bbe26bd4211c75cc2579d5236cd1a';
    $arParams['HIT_XMLID']['HIT'] = '05129e781d9fab67837d76c5ace9f42a';

    $notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
    $arNotify = unserialize($notifyOption);
    ?>


    <div class="catalog" style="padding-top:90px;">

        <div class="wrapper">
            <div class="search-result" style="padding: 0 0 20px 15px;">
                <h1 class="search-title" style="font-size: 20px;line-height: 25px;">Результаты поиска: <?=$arResult["REQUEST"]["QUERY"]?></h1>
                <p class="search-text"style="font-size: 14px;">Найдено <?=$arResult["NAV_RESULT"]->NavRecordCount?> товаров.</p>
            </div>
            <ul class="products-list">
                <?foreach($arResult ['SEARCH'] as $arElement):?>
                    <?
                    //class-year min
                    if(is_array($arElement['PROPERTIES']['YEAR']['PROP_TITLE'])){
                        sort($arElement['PROPERTIES']['YEAR']['PROP_TITLE'], SORT_NUMERIC);
                        $min=$arElement['PROPERTIES']['YEAR']['PROP_TITLE'][0];

                    }
                    elseif(strlen($arElement['PROPERTIES']['YEAR']['PROP_TITLE'])>0) {
                        $min=$arElement['PROPERTIES']['YEAR']['PROP_TITLE'];
                    }
                    elseif(is_array($arElement['PROPERTIES']['CLASS']['PROP_TITLE'])&&count($arElement['PROPERTIES']['CLASS']['PROP_TITLE'])>1) {
                        sort($arElement['PROPERTIES']['CLASS']['PROP_TITLE'], SORT_NUMERIC);
                        $min=$arElement['PROPERTIES']['CLASS']['PROP_TITLE'][0];
                    }
                    elseif(strlen($arElement['PROPERTIES']['CLASS']['PROP_TITLE'])>0) {
                        $min=$max=$arElement['PROPERTIES']['CLASS']['PROP_TITLE'];
                    }
                    else{
                        $min=$max=$arElement['PROPERTIES']['CLASS']['PROP_TITLE'][0];
                    }

                    //class-year max
                    if(is_array($arElement['PROPERTIES']['CLASS']['PROP_TITLE'])) {
                        rsort($arElement['PROPERTIES']['CLASS']['PROP_TITLE'], SORT_NUMERIC);
                        $max=$arElement['PROPERTIES']['CLASS']['PROP_TITLE'][0];
                    }
                    elseif(strlen($arElement['PROPERTIES']['CLASS']['PROP_TITLE'])>0) {
                        $max=$arElement['PROPERTIES']['CLASS']['PROP_TITLE'];
                    }elseif(is_array($arElement['PROPERTIES']['YEAR']['PROP_TITLE'])&&count($arElement['PROPERTIES']['YEAR']['PROP_TITLE'])>1){
                        rsort($arElement['PROPERTIES']['YEAR']['PROP_TITLE'], SORT_NUMERIC);
                        $max=$arElement['PROPERTIES']['YEAR']['PROP_TITLE'][0];
                    }elseif(strlen($arElement['PROPERTIES']['YEAR']['PROP_TITLE'])>0) {
                        $min=$max=$arElement['PROPERTIES']['YEAR']['PROP_TITLE'];
                    }
                    else{
                        $min=$max=$arElement['PROPERTIES']['YEAR']['PROP_TITLE'][0];
                    }
                    if($min!=$max){
                        $subStr=explode(" ",$max);end($subStr);
                        if(substr_count($min,current($subStr))){
                            $min=str_replace(" ".current($subStr),"",$min);
                        }
                    }
                    ?>
                <?if($arElement['IBLOCK_CODE']=='items'):?>
                <li class="product-item product-item-set">
                    <a href="<?=$arElement['URL_WO_PARAMS']?>" class="product-link-wrap">
                        <div class="product-item-front">
                            <div class="cart-class">
                                <?=strip_tags($min)?><?if($min!=$max):?> - <?=strip_tags($max)?><?endif?>
                            </div>
                            <div class="cart-img-wrap">
                                <img src="<?=CFile::GetPath($arElement["PREVIEW_PICTURE"])?>" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" class="cart-img">
                                <div class="cart-img-overlay"></div>
                            </div>
                            <div class="cart-subject"><?if(count($arElement['PROPERTIES']["SUBJECT"]["VALUE"])>0) echo $arElement['DISPLAY_PROPERTIES']["SUBJECT"]['PROP_TITLE'][0];?></div>
                            <div class="product-item-type product-item-type-footer "><?=$arElement['TITLE']?></div>
                            <?if($arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                <div class="cart-price"><?=$arElement["PRICES"]["BASE"]["VALUE"]?> <span>руб.</span></div>
                            <?endif?>
                        </div>
                        <div class="product-item-backside">
                            <div class="product-item-type"><?=$arElement['TITLE']?></div>
                            <div class="cart-text"><?=$arElement['PREVIEW_TEXT']?></div>
                            <?if($arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arElement['URL_WO_PARAMS']?>');">
                                    <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'List'});">Товар уже в корзине</button>
                                    <form enctype="multipart/form-data" method="post" action="/equipment/basket.php" class="button-submit" id="item_btn_submit_<?=$arElement["ID"]?>">
                                        <input type="hidden" value="Артикул: <?=$arElement["PROPERTIES"]["ARTICLE"]["VALUE"]?>" name="ITEM_PROPERTY[]">
                                        <input type="hidden" value="<?=$arElement['TITLE']?>" name="ITEM_NAME">
                                        <input type="hidden" value="<?=$arElement['URL_WO_PARAMS']?>" name="ITEM_LINK">
                                        <input type="hidden" value="BUY" name="action">
                                        <input type="hidden" value="<?=$arElement["ID"]?>" name="id">
                                        <input type="hidden" value="КУПИТЬ" name="actionBUY" class="button btn-buy">
                                        <?if((int)$arElement['PRICES']['BASE']['VALUE']<VIS_PRICE_LIMIT):?>
                                            <button class="button btn-buy" onclick="javascript:$('#item_btn_submit_<?=$arElement["ID"]?>').submit();">
                                                <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arElement['PRICES']['BASE']['VALUE']?> <span>руб.</span></span>
                                            </button>
                                        <?else:?>
                                            <button class="button btn-buy" onclick="javascript:formGetPrice('<?=$arElement["ID"]?>','<?=$arElement["NAME"]?>','<?=(int)$arElement['PRICES']['BASE']['VALUE']?>');return false;">
                                                <span class="btn-text">Запросить&nbsp;цену</span>
                                            </button>
                                        <?endif?>
                                    </form>
                                </div>
                            <?endif?>
                        </div>
                    </a>
                </li>
                    <?elseif($arElement['IBLOCK_CODE']!='books'):?>
                        <li class="product-item product-item-set">
                            <a href="<?=$arElement['URL_WO_PARAMS']?>" class="product-link-wrap">
                                <div class="product-item-front">
                                    <div class="cart-class">
                                        <?=strip_tags($min)?><?if($min!=$max):?> - <?=strip_tags($max)?><?endif?>
                                    </div>
                                    <div class="cart-img-wrap">
                                        <img src="<?=CFile::GetPath($arElement["PREVIEW_PICTURE"])?>" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" class="cart-img">
                                        <div class="cart-img-overlay"></div>
                                        <div class="marker cart-set-number"><?=count($arElement['PROPERTIES']['BOOKS']['VALUE'])?> в 1</div>
                                    </div>
                                    <div class="cart-subject"><?if(count($arElement['PROPERTIES']["SUBJECT"]["VALUE"])>0) echo $arElement['DISPLAY_PROPERTIES']["SUBJECT"]['PROP_TITLE'][0];?></div>
                                    <div class="product-item-type product-item-type-footer "><?=$arElement['TITLE']?></div>
                                    <?if($arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                        <div class="cart-price"><?=$arElement["PRICES"]["BASE"]["VALUE"]?> <span>руб.</span></div>
                                    <?endif?>
                                </div>
                                <div class="product-item-backside">
                                    <div class="product-item-type"><?=$arElement['TITLE']?></div>
                                    <div class="cart-text"><?=$arElement['PREVIEW_TEXT']?></div>
                                    <?if($arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                        <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','<?=$arElement['URL_WO_PARAMS']?>');">
                                            <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'List'});">Товар уже в корзине</button>
                                            <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'List', 'eventAdd':{'ContentId': '<?=$arElement["ID"]?>'}});add2basketPacket(<?=$arElement["ID"]?>);" id="button_add_<?=$arElement["ID"]?>" data-page="List">
                                                <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arElement['PRICES']['BASE']['VALUE']?> <span>руб.</span></span>
                                            </button>
                                        </div>
                                    <?endif?>
                                </div>
                            </a>
                        </li>
                    <?elseif($arElement['IBLOCK_CODE']!='bookshelf'):?>
                <li class="product-item">
                    <a href="/products/<?=$arElement['PROPERTIES']['CID']['VALUE']?>/" class="product-link-wrap">
                        <div class="product-item-front">
                            <div class="cart-class"><?=strip_tags($min)?><?if($min!=$max):?> - <?=strip_tags($max)?><?endif?></div>
                            <div class="cart-img-wrap">
                                <img src="<?=LINK_PREVIEW.$arElement['PROPERTIES']['CID']['VALUE']?>_logo-s.png" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" class="cart-img">
                                <div class="cart-img-overlay"></div>
                                <?if ($arElement['PROPERTIES']['HIT']['VALUE'] == 'Hit'||$arElement['PROPERTIES']['HIT']['VALUE'] == 'Хит'):?>
                                    <div class="marker hit">хит!</div>
                                <?elseif($arElement['PROPERTIES']['HIT']['VALUE'] == 'Recommended'):?>
                                    <div class="marker choice">наш выбор!</div>
                                <?endif?>
                            </div>
                            <div class="cart-subject"><?if(count($arElement['PROPERTIES']['SUBJECT']['PROP_TITLE'])>0): echo implode(", ",$arElement['PROPERTIES']['SUBJECT']['PROP_TITLE']); endif; ?></div>
                            <div class="product-item-type product-item-type-footer "><?=$arElement['TITLE']?></div>
                            <?if(1||$arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                <div class="cart-price"><?=$arElement['PRICES']['BASE']['VALUE']?> <span>руб.</span></div>
                            <?endif?>
                        </div>
                        <div class="product-item-backside">
                            <div class="product-item-type"><?=$arElement['TITLE']?></div>
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

                                <?if($arElement["PRICES"]["BASE"]["VALUE"]>0):?>
                                   <div class="button-block" onmouseover="$(this).parent('div').parent('a').attr('href','javascript:popupCart();');" onmouseout="$(this).parent('div').parent('a').attr('href','/products/<?=$arElement['PROPERTIES']['CID']['VALUE']?>/');">
                                    <button style="display:none;" class="button btn-in-cart click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartView', 'eventLabel':'List', 'eventCallback': function(){location.href='/cart/';}});">Товар уже в корзине</button>
                                    <button class="button btn-buy click-btn" onclick="javascript:dataLayer.push({'event':'gaEvent', 'eventCategory':'Cart', 'eventAction':'CartAdd', 'eventLabel':'List', 'eventAdd':{'ContentId': '<?=$arElement['PROPERTIES']['CID']['VALUE']?>'}});add2basketPacket(<?=$arElement["ID"]?>);" id="button_add_<?=$arElement["ID"]?>" data-page="List">
                                        <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arElement['PRICES']['BASE']['VALUE']?> <span>руб.</span></span>
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
                    <?endif?>
            <?endforeach?>
            </ul>
        </div>
    </div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <div class="clear"></div>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>
