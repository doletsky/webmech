<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();  ?>
<!--<pre>--><?//print_r($arResult['DISPLAY_PROPERTIES']['SCRINS'])?><!--</pre>-->
<?
if($_REQUEST['inorder']=="Y")
 $APPLICATION->AddHeadString('<script type="text/javascript">$(document).ready(function(){$("#item_btn_submit_'.$_REQUEST["ID"].'").submit();});</script>');
?>
<div class="product-top">
    <div class="w1000">
        <div class="top-nav">
            <?$APPLICATION->IncludeComponent('indigos:catalog.filter.breadcrumbs', '', array('ITEM' => $arResult['ID']));?>
        </div>
        <div class="product-wrap">
            <div class="product-image">
              <?if(is_array($arResult['DETAIL_PICTURE']))$imgSrc=$arResult['DETAIL_PICTURE']['SRC'];
                else $imgSrc=$arResult['PREVIEW_PICTURE']['SRC'];?>
                <img src="<?=$imgSrc?>"  alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" class="product-img">
                <div class="product-image-overlay"></div>
            </div>
            <div class="product-desc" bxid="<?=$arResult['ID']?>" tmp="ek_ab" contid="<?=$arResult['PROPERTIES']['CID']['VALUE']?>" page="CIPage">
                <h1><?=$arResult["NAME"]?></h1>
                <?
                if(is_array($arResult['DISPLAY_PROPERTIES']['SUBJECT']['DISPLAY_VALUE']))$subject=ToUpper(trim(implode(", ",$arResult['DISPLAY_PROPERTIES']['SUBJECT']['DISPLAY_VALUE']),", "));
                else $subject=ToUpper($arResult['DISPLAY_PROPERTIES']['SUBJECT']['DISPLAY_VALUE']);
                ?>

                <h3><?=trim($subject.' - '.$arResult["CLASS"]["DISPLAY_VALUE"],' -')?> </h3>
                <!-- в .product-subject вывести название предмета, в .product-class номер класса -->
                <ul class="product-type-list">
                        <li class="product-type-list-item">
                        <span class="list-item-text first">
                            <span class="list-item-wrap">
                                <span class="angle-wrap">
                                    Учебное оборудование
                                </span>
                            </span>
							<span class="list-item-balloon"><?=$arDescripUglub[ToLower($arResult['PROPERTIES']['PROP_16']['VALUE'])]?></span>
                        </span>
                        </li>
                </ul>
                    <p class="product-par">
                        <?
                        $product_par = strip_tags($arResult["PREVIEW_TEXT"]);
//                        echo $product_par_rdy = mb_substr($product_par, 0, 150, 'UTF-8') . '...';
                        echo $product_par;

                        ?>
                    </p>
            </div>
            <div class="product-actions">
                <?if($arResult['ACTIVE']=='Y'):?>

                    <div class="button-block">
                        <button class="button btn-in-cart click-btn" style="display:none;">Товар уже в корзине</button>
                        <button data-page="CIPage" id="button_add_<?=$arResult["ID"]?>" onclick="add2basketPacket(<?=$arResult["ID"]?>);" class="button btn-buy click-btn">
                            <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arResult['CATALOG_PRICE_1']?> <span>руб.</span></span>
                        </button>

                    </div>

                <?endif?>
                <?if(strlen($arResult['PROPERTIES']['DEMO_LINK']['VALUE'])>1):?><button class="button btn-free" onclick="dataLayer.push({'event':'gaEvent', 'eventCategory':'Navigation', 'eventAction':'ViewDemo', 'eventLabel': 'CIList', 'eventAdd':{'ContentId': '<?=$arResult['PROPERTIES']['CID']['VALUE']?>'}, 'eventCallback': function(){location.href='/lk/Player/Demo/<?=$arResult['PROPERTIES']['CID']['VALUE']?>';}})">Попробовать бесплатно</button><?endif?>
            </div>

        </div>
    </div>
</div>
<? if (is_array($arResult['DISPLAY_PROPERTIES']['SCRINS'])) { // Если нет скриншотов то не выводим блок (wasinev)?>

    <div class="product-gallery">
        <div class="w1000">
            <div class="products-scrolling slider-wrapper">
                <span class="nav nav-prev"></span>
                <div class="gallery-wrap">
                    <div class="gallery">
                        <?if(count($arResult['DISPLAY_PROPERTIES']['SCRINS']["VALUE"])==1):
                            $img=$arResult['DISPLAY_PROPERTIES']['SCRINS']['FILE_VALUE'];?>
                            <a class="fancybox gallery-item slider-item" data-fancybox-group="gallery" href="<?=$img['SRC']?>" title="<?=$arResult["NAME"]?>">
                                <img style="max-width:239px; min-width:239px; height:auto; width:auto;" src="<?=$img['SRC']?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/>
                                <span class="gallery-item-overlay">
                                    <div class="alt-title"><?=$img['DESCRIPTION']?></div>
                                </span>
                                <span class="gallery-loupe"></span>
                            </a>

                        <?else:
                            $i = 0;
                            foreach($arResult['DISPLAY_PROPERTIES']['SCRINS']['FILE_VALUE'] as $img)
                            {
                                ?>
                                <a class="fancybox gallery-item slider-item" data-fancybox-group="gallery" href="<?=$img['SRC']?>" title="<?=$arResult["NAME"]?>">
                                    <img style="max-width:239px; min-width:239px; height:auto; width:auto;" src="<?=$img['SRC']?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/>
                                    <span class="gallery-item-overlay">
                                        <div class="alt-title"><?=$img['DESCRIPTION']?></div>
                                    </span>
                                    <span class="gallery-loupe"></span>
                                </a>

                                <?
                                $i++;
                                if($i == 3) break;
                            }
                        endif?>
                    </div>
                </div>
                <span class="nav nav-next"></span>
            </div>
        </div>
    </div>
<? } ?>


<div class="product-about ">
    <div class="w1000">

        <?

            $listCount = count($arResult['DISPLAY_PROPERTIES']['CONTENT']['VALUE']);

            if($listCount > 7){
                $littleBoxClass = "littlebox";
            } else {
                $littleBoxClass = "";
            }

            if($listCount > 1){
                $rightboxClass = "rightbox";
            } else {
                $rightboxClass = "";
            }

        ?>

        <div class="product-about-wrap <? echo $littleBoxClass;?> <? echo $rightboxClass; ?>">
            <div class="product-char">
                <h2><?=GetMessage("DESC_FEATURES")?></h2>
                <?

                ?><pre><?//print_r($arResult['PROPERTIES'])?></pre>
                <div class="char-list">
                    <?
                    foreach($arResult['DISPLAY_PROPERTIES'] as $pid=>$arProperty)
                    {
                        unset($val);
                        $val = isset($arProperty["DISPLAY_VALUE"] ) ? $arProperty["DISPLAY_VALUE"] : $arProperty["VALUE"];
                        if (isset($val) && $val && $pid!="SCRINS" && $pid!="CONTENT")
                        {
                            ?>
                            <div class="char-item">
                                <div class="char-title"><?=$arProperty["NAME"]?></div>
                                <div class="char-content">
                                    <?
                                    if(is_array($val))
                                    {


                                        echo preg_replace('~<a\b[^>]*+>|</a\b[^>]*+>~', '', str_replace("html / ","" ,implode(" / ", $val)));
                                    }
                                    elseif($pid=="MANUAL")
                                    {
                                        echo GetMessage("CATALOG_DOWNLOAD");
                                    }
                                    else
                                    {
                                        echo preg_replace('~<a\b[^>]*+>|</a\b[^>]*+>~', '', $val);
                                    }
                                    ?>
                                </div>
                            </div>
                        <?
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="product-desc-wrap">

                <?
                if (strlen(strip_tags($arResult["DETAIL_TEXT"]))>0)
                {
                    ?>
                    <div class="provider-desc">
                        <h2>Описание</h2>
                        <p class="provider-desc-text"><?=strip_tags($arResult["DETAIL_TEXT"]);?></p>

                    </div>
                <?
                }
                ?>
            </div>
            <?

                    if($listCount > 1):?>

                        <div class="product-detailed-content" style="line-height: normal">

                            <h2><?=$arResult['DISPLAY_PROPERTIES']['CONTENT']['NAME']?></h2>
                            <ul>
                                <?foreach($arResult['DISPLAY_PROPERTIES']['CONTENT']['VALUE'] as $content){
                                    echo "<li>".$content."</li>";
                                }?>
                            </ul>
                            <?if($listCount > 5 ):?>

                                <div class="product-detail-content-show"><a href="#">Развернуть</a></div>

                            <?endif;?>

                        </div>
                    <?endif;
                ?>
        </div>
    </div>
</div>

<?if(0):?>
<div class="other-products">
    <div class="w1000">
        <h5 class="other-products-title">С ЭТИМ ТОВАРОМ ПОКУПАЮТ</h5>
        <?
        $arRecomParams['CLASS'] = implode(',',$arResult['PROPERTIES']['CLASS']['VALUE']);
        $arRecomParams['SUBJECT'] = implode(',',$arResult['PROPERTIES']['SUBJECT']['VALUE']);
        $arRecomParams['ID'] = (int) $arResult['ID'];

        $os='';
        if(substr_count($_SERVER["HTTP_USER_AGENT"], "Windows")) $os="win";
        $APPLICATION->IncludeComponent(
            'indigos:catalog.element.detail.recommended',
            'new_detail-ab',
            array(
                'CLASS' => $arRecomParams['CLASS'],
                'SUBJECT' => $arRecomParams['SUBJECT'],
                'TARGET' => $arRecomParams['ID'],
                'CID' => $arResult['PROPERTIES']['CID']['VALUE'],
                'PRICE' => str_replace(".00", "", $arResult['CATALOG_PRICE_1']),
                'PLATFORM' => $os,
                'CNT' => 4
            )
        ); ?>
    </div>
</div>
<?endif?>

<div class="product-bottom">
    <div class="w1000">
        <div class="aside-elem aside-elem-hand"></div>
        <div class="product-bottom-wrap">
            <p class="par-quest">Вам это подходит?</p>
            <?if($arResult['ACTIVE']=='Y'):?>
                <div class="button-block">
                    <button class="button btn-in-cart click-btn" style="display:none;">Товар уже в корзине</button>
                    <button data-page="CIPage" id="button_add_<?=$arResult["ID"]?>" onclick="add2basketPacket(<?=$arResult["ID"]?>);" class="button btn-buy click-btn">
                        <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=(int)$arResult['CATALOG_PRICE_1']?> <span>руб.</span></span>
                    </button>

                </div>
            <?endif?>

        </div>
    </div>
</div>