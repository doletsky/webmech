<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();  ?>
<?include($_SERVER['DOCUMENT_ROOT'].'/descrip_uglub.php');//подключение $arDescripUglub описания значения углубленности?>
<div class="product-top">
    <div class="w1000">
        <div class="top-nav">
            <?$APPLICATION->IncludeComponent('indigos:catalog.filter.breadcrumbs', '', array('ITEM' => $arResult['ID']));?>
        </div>
        <div class="product-wrap">
            <div class="product-image">
                <img src="<?=LINK_FULL . $arResult['PROPERTIES']['CID']['VALUE']?>_logo-o.png"  alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" class="product-img">
                <div class="product-image-overlay"></div>
            </div>
            <div class="product-desc" bxid="<?=$arResult['ID']?>" tmp="ek_ab" contid="<?=$arResult['PROPERTIES']['CID']['VALUE']?>" page="CIPage">
                <h1><?=$arResult["NAME"]?></h1>
                <!-- в .product-subject вывести название предмета, в .product-class номер класса -->
                <h3>
                    <?$strSubj="";
                    if(is_array($arResult["DISPLAY_PROPERTIES"]["SUBJECT"]["DISPLAY_VALUE"]))
                        foreach($arResult["DISPLAY_PROPERTIES"]["SUBJECT"]["DISPLAY_VALUE"] as $subj){
                            if(substr_count($strSubj, str_replace(" язык", "", strip_tags($subj)))==0)
                            $strSubj.=strip_tags($subj).", ";
                        }
                    else $strSubj=strip_tags($arResult["DISPLAY_PROPERTIES"]["SUBJECT"]["DISPLAY_VALUE"]);?>
                    <?=trim($strSubj, ", ");?> &mdash;
                    <span class="product-class">
                        <?$strClass="";
                        if(is_array($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"])) {
                            if(count($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"])>2){
                                $strClass=str_replace(" класс", "", strip_tags($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"][0]))." - ";
                                end($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"]);
                                $strClass.=strip_tags(current($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"]));
                            }
                            else
                            {
                                foreach($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"] as $class) $strClass.=strip_tags($class).", ";
                            }
                        }
                        else $strClass=strip_tags($arResult["DISPLAY_PROPERTIES"]["CLASS"]["DISPLAY_VALUE"]);?>
                        <?=trim($strClass, ", ");?>
                    </span>
                </h3>
                <ul class="product-type-list">
                    <?if(strlen($arResult['PROPERTIES']['PROP_16']['VALUE'])>0):?>
                        <li class="product-type-list-item">
                        <span class="list-item-text first">
                            <span class="list-item-wrap">
                                <span class="angle-wrap">
                                    <?=ToLower($arResult['PROPERTIES']['PROP_16']['VALUE'])?>
                                </span>
                            </span>
							<span class="list-item-balloon"><?=$arDescripUglub[ToLower($arResult['PROPERTIES']['PROP_16']['VALUE'])]?></span>
                        </span>
                        </li>
                    <?endif?>
                    <?if(strlen($arResult['ED_TYPE'])>0):?>
                        <li class="product-type-list-item">
                        <span class="list-item-text second">
                            <span class="list-item-wrap">
                                <span class="angle-wrap">
                                    <?=ToLower($arResult['ED_TYPE']);?>
                                </span>
                            </span>
							<span class="list-item-balloon"><?=$arDescripEduType[ToLower($arResult['ED_TYPE'])]?></span>
                        </span>
                        </li>
                    <?endif?>
                </ul>
                <?if (strlen(trim(strip_tags($arResult['PROPERTIES']['MARK_TEXT']['VALUE']['TEXT'])))>0):?>
                <p class="product-par">
                    <?
                    echo $product_par = strip_tags($arResult['PROPERTIES']['MARK_TEXT']['VALUE']['TEXT']);
                    //echo $product_par_rdy = mb_substr($product_par, 0, 150, 'UTF-8') . '...';

                    ?>
                </p>
                <?elseif (strlen(strip_tags($arResult['PROPERTIES']['FEATURE']['VALUE']['TEXT']))>0):?>
                    <p class="product-par">
                        <?
                        $product_par = strip_tags($arResult['PROPERTIES']['FEATURE']['VALUE']['TEXT']);
                        echo $product_par_rdy = mb_substr($product_par, 0, 150, 'UTF-8') . '...';

                        ?>
                    </p>
                <?endif?>
            </div>
            <div class="product-actions">
                <div class="product-download">
                    <h4 class="product-download-title">
                        <?if($arResult['PROPERTIES']['ONLOAD']['VALUE']=='Y'):?>
                        Доступно для скачивания:
                        <?else:?>
                            Доступно online:
                        <?endif?>
                    </h4>
                    <ul class="product-download-list">
                        <?if(in_array('MacOS',$arResult['PROPERTIES']['PLATFORM']['VALUE'])):?>
                        <li class="product-download-item mac"><span class="product-download-name">MacOS</span></li>
                        <?endif?>
                        <?if(in_array('iOS',$arResult['PROPERTIES']['PLATFORM']['VALUE'])):?>
                        <li class="product-download-item ios"><span class="product-download-name">iOS</span></li>
                        <?endif?>
                       <?if(in_array('Windows',$arResult['PROPERTIES']['PLATFORM']['VALUE'])||(!in_array('MacOS',$arResult['PROPERTIES']['PLATFORM']['VALUE'])&&!in_array('iOS',$arResult['PROPERTIES']['PLATFORM']['VALUE'])&&!in_array('Android',$arResult['PROPERTIES']['PLATFORM']['VALUE']))):?>
                        <li class="product-download-item win"><span class="product-download-name">Windows</span></li>
                       <?endif?>
                        <?if(in_array('Android',$arResult['PROPERTIES']['PLATFORM']['VALUE'])):?>
                        <li class="product-download-item android"><span class="product-download-name">Android</span></li>
                        <?endif?>
                    </ul>
                </div>
                <?if($arResult['ACTIVE']=='Y'):?>
                <div class="button-block">
                    <?//if($arResult['ACTIVE']=='Y')$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'ek_ab', array('PRODUCT_ID' => $arResult['ID'], 'Page' => 'CIPage'));?>
                </div>
                <?endif?>
                <?if(strlen($arResult['PROPERTIES']['DEMO_LINK']['VALUE'])>1):?><button class="button btn-free" onclick="dataLayer.push({'event':'gaEvent', 'eventCategory':'Navigation', 'eventAction':'ViewDemo', 'eventLabel': 'CIList', 'eventAdd':{'ContentId': '<?=$arResult['PROPERTIES']['CID']['VALUE']?>'}, 'eventCallback': function(){location.href='/lk/Player/Demo/<?=$arResult['PROPERTIES']['CID']['VALUE']?>';}})">Попробовать бесплатно</button><?endif?>
            </div>

        </div>
    </div>
</div>
<? if ($arResult['PROPERTIES']['SCREEN_IDS']['VALUE']) { // Если нет скриншотов то не выводим блок (wasinev)?>

    <div class="product-gallery">
        <div class="w1000">
            <div class="products-scrolling slider-wrapper">
                <span class="nav nav-prev"></span>
                <div class="gallery-wrap">
                    <div class="gallery">
                        <?
                        if(count($arResult['PROPERTIES']['SCREEN_IDS']['VALUE'])>0 && $arResult['PROPERTIES']['SCREEN_IDS']['VALUE'][0] != '')
                        {
                            $i = 0;
                            foreach($arResult['PROPERTIES']['SCREEN_IDS']['VALUE'] as $id)
                            {
                                ?>
                                <a class="fancybox gallery-item slider-item" data-fancybox-group="gallery" href="<?=LINK_SCREENSHOT .$arResult['PROPERTIES']['CID']['VALUE']."_" . $id?>-o.png" title="<?=$arResult["NAME"]?>">
                                    <img style="max-width:239px; min-width:239px; height:auto; width:auto;" src="<?=LINK_SCREENSHOT .$arResult['PROPERTIES']['CID']['VALUE']."_" . $id?>-s.png" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/>
                                    <span class="gallery-item-overlay"></span>
                                    <span class="gallery-loupe"></span>
                                </a>
                                <?
                                $i++;
                                if($i == 3) break;
                            }
                        }
                        ?>
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

            $listCount = substr_count(htmlspecialchars_decode($arResult['DISPLAY_PROPERTIES']['CONTENT']['DISPLAY_VALUE']),'<li>');

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
                $arResultOut['END_LICENSE'] = $arResult['DISPLAY_PROPERTIES']['END_LICENSE'];
                $arResultOut['END_LICENSE']['NAME'] = 'Дата окончания лицензии';
                $arResultOut['CLASS'] = $arResult["DISPLAY_PROPERTIES"]["CLASS"];
                $arResultOut['SUBJECT'] = $arResult["DISPLAY_PROPERTIES"]["SUBJECT"];
                if ($arResult['PROPERTIES']['SERIES']['VALUE'])
                {
                    $arResultOut['SERIES'] = $arResult['PROPERTIES']['SERIES'];
                    $res = CIBlockElement::GetList(array(), array('ID' => $arResult['PROPERTIES']['SERIES']['VALUE'], 'ACTIVE' => 'Y'), false, false, array('ID', 'NAME'))->Fetch();

                    $arResultOut['SERIES']['VALUE'] = $res['NAME'];
                }
                if ($arResult["PROPERTIES"]["LANG"]["VALUE"]["0"]) $arResultOut['LANG'] = $arResult["PROPERTIES"]["LANG"];

                $arResultOut['THEORY'] = $arResult['DISPLAY_PROPERTIES']['THEORY'];

                $arResultOut['EXAMPLE'] = $arResult['DISPLAY_PROPERTIES']['EXAMPLE'];

                $arResultOut['TESTS'] = $arResult['PROPERTIES']['TESTS'];
                $arResultOut['CNT_TEST_Q'] = $arResult['PROPERTIES']['CNT_TEST_Q'];

                $arResultOut['EXERCIES'] = $arResult['PROPERTIES']['EXERCIES'];
                $arResultOut['EXER_CNT'] = $arResult['PROPERTIES']['EXER_CNT'];

                $arResultOut['PROP_6'] = $arResult['PROPERTIES']['PROP_6'];
                $arResultOut['PROP_11'] = $arResult['PROPERTIES']['PROP_11'];


                $arResultOut['OGRANICHENIYA'] = $arResult['PROPERTIES']['OGRANICHENIYA'];
                $arResultOut['MARK_TEXT'] = $arResult['DISPLAY_PROPERTIES']['MARK_TEXT'];
                $arResultOut['PUBLISHER'] = $arResult['PROPERTIES']['PUBLISHER'];

                $arResultOut['SUPPLIER'] = $arResult['DISPLAY_PROPERTIES']['POSTAVSHIK'];


                switch ($arResult['PROPERTIES']['ED_TYPE']['VALUE']) {
                    // Учебное пособие
                    case 20771:
                        break;

                    // Тренажер
                    case 20772:
                        break;


                    // Учебник
                    case 20773:
                        unset($arResultOut['THEORY'], $arResultOut['CNT_TEST_Q'], $arResultOut['EXERCIES'], $arResultOut['TESTS']);

                        if ($arResult['PROPERTIES']['AUTORS']['VALUE']) {
                            $arResultOut['AUTORS'] = $arResult['PROPERTIES']['AUTORS'];
                            $arResultOut['AUTORS']["DISPLAY_VALUE"] = array();

                            foreach ($arResult['PROPERTIES']['AUTORS']['VALUE'] as $ar ) {
                                $res = CIBlockElement::GetList(array(), array('ID' => $ar, 'ACTIVE' => 'Y'), false, false, array('ID', 'NAME'))->Fetch();
                                $arResultOut['AUTORS']["DISPLAY_VALUE"][] = $res["NAME"];

                            }
                        }

                        break;


                    // Произведение
                    case 20774:
                        break;

                    // Игра
                    case 20775:
                        break;

                    // Курс
                    case 20805:
                        break;


                    // Справочник
                    case 20806:
                        break;


                    // Лаборатория
                    case 25214:
                        break;


                };
                ?><pre><?//print_r($arResult['PROPERTIES'])?></pre>
                <div class="char-list">
                    <?
                    foreach($arResultOut as $pid=>$arProperty)
                    {
                        unset($val);
                        $val = isset($arProperty["DISPLAY_VALUE"] ) ? $arProperty["DISPLAY_VALUE"] : $arProperty["VALUE"];
                        if (isset($val) && $val)
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
                if (strlen(strip_tags($arResult['PROPERTIES']['FEATURE']['VALUE']['TEXT']))>0)
                {
                    ?>
                    <div class="provider-desc">
                        <h2>Описание</h2>
                        <p class="provider-desc-text"><?=strip_tags($arResult['PROPERTIES']['FEATURE']['VALUE']['TEXT']);?></p>

                    </div>
                <?
                }
                ?>
            </div>
            <?

                    if($listCount > 1):?>

                        <div class="product-detailed-content">

                            <h2>Содержание</h2>
                            <?=htmlspecialchars_decode($arResult['DISPLAY_PROPERTIES']['CONTENT']['DISPLAY_VALUE'])?>

                            <?if($listCount > 7 ):?>

                                <div class="product-detail-content-show"><a href="#">Развернуть</a></div>

                            <?endif;?>

                        </div>
                    <?endif;
                ?>
        </div>
    </div>
</div>

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
<?
if (strlen($arResult["DETAIL_TEXT"])>0)
{
    ?>
    <div class="supplier-desc">
        <div class="w1000">
            <div class="aside-elem aside-elem-quote"></div>
            <h3>Поставщик о продукте:</h3>


            <div class="supplier-desc-text"><?=$arResult["DETAIL_TEXT"]?></div>


        </div>
    </div>
<?
}
?>
<div class="product-bottom">
    <div class="w1000">
        <div class="aside-elem aside-elem-hand"></div>
        <div class="product-bottom-wrap">
            <p class="par-quest">Вам это подходит?</p>
            <?if($arResult['ACTIVE']=='Y'):?>
            <div class="button-block">
                <?//if($arResult['ACTIVE']=='Y')$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'ek_ab', array('PRODUCT_ID' => $arResult['ID'], 'Page' => 'CIPage'));?>
            </div>
            <?endif?>
            <!-- сделать функционал для кнопки купить
            <button class="button btn-buy">
                <span class="btn-text">КУПИТЬ</span><span class="btn-price">200.000 <span>руб.</span></span>
            </button>-->

        </div>
    </div>
</div>