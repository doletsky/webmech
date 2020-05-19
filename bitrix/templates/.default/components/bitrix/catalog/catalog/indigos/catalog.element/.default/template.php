<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();  ?>
<?LocalRedirect('/products/'. $arResult['PROPERTIES']['CID']['VALUE'].'/', true, '301 Moved permanently');?>
<div class="product-top">
    <div class="w1000">
        <div class="top-nav">
            <a href="<?=SITE_DIR?>" class="back-link"><?=GetMessage('TO_INDEX')?></a>
            <?$APPLICATION->IncludeComponent('indigos:catalog.filter.breadcrumbs', '', array('ITEM' => $arResult['ID']));?>
        </div>
        <div class="product-wrap">
            <div class="product-image">
                <img src="<?=LINK_FULL . $arResult['PROPERTIES']['CID']['VALUE']?>_logo-o.png"  alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" class="product-img">
            </div>
            <div class="product-desc" bxid="<?=$arResult['ID']?>" tmp="packet">
                <h1 class="product-title"><?=$arResult["NAME"]?></h1>
                <p class="product-par"><?=strip_tags($arResult['PROPERTIES']['FEATURE']['VALUE']['TEXT'])?></p>
                <ul class="product-type-list">
                    <li class="product-type-list-item program"><?=$arResult['ED_TYPE']?></li>
                </ul>
            </div>

            <div class="item_buy_place clearfix">
                <?if($arResult['ACTIVE']=='Y'):?>
                    <div id="packet_button">
                        <?//if($arResult['ACTIVE']=='Y')$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID'], 'Page' => 'CIPage'));?>
                    </div>
                <?else:?>
                    <div class="ss_buy_place_no_sell ss_buy_item_no_sell" id="button_add_<?=$arParams['PRODUCT_ID']?>">
                        <div class="ss_buy_label_no_sell">Товар снят с продажи</div>
                        <div class="ss_buy_price_no_sell"></div>
                    </div>
                <?endif?>

<!-- Temporary hide demo button-->
<!--
                <?
                $arDemo = explode('__', $arResult['PROPERTIES']['PROP_55']['VALUE']);
                if (!empty($arDemo[1]))
                {
                ?>
                    <a href="<?=DEMO_LINK . $arDemo[1]?>" target="_blank" class="demo_button">Онлайн-демо</a>
                <?
                }
                if (!empty($arResult['PROPERTIES']['DEMO_LINK']['VALUE']))
                {
                    ?>
                    <div href="<?=$arResult['PROPERTIES']['DEMO_LINK']['VALUE']?>" class="demo_button demo_pop">Онлайн-демо</div>
                <?
                }
                ?>
-->

                <div class="<?=(!empty($arDemo[1]) || !empty($arResult['PROPERTIES']['DEMO_LINK']['VALUE']) ? '' : ' long')?> download-quantity" style="display:none;">27 скачиваний</div>

            </div>
        </div>
    </div>
</div>
<div class="product-gallery">
    <div class="w1000">
        <div class="cols">
            <div class="left-col">
                <h2 class="gallery-title">Скриншоты</h2>
                <div class="gallery">
                    <?
                    if(count($arResult['PROPERTIES']['SCREEN_IDS']['VALUE'])>0 && $arResult['PROPERTIES']['SCREEN_IDS']['VALUE'][0] != '')
                    {
                        $i = 0;
                        foreach($arResult['PROPERTIES']['SCREEN_IDS']['VALUE'] as $id)
                        {
                            ?>
                            <a class="fancybox gallery-item" data-fancybox-group="gallery" href="<?=LINK_SCREENSHOT . $id?>" title="<?=$arResult["NAME"]?>">
                                <img style="max-width:240px; height:auto; width:auto;" src="<?=LINK_SCREENSHOT . $id?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"/>
                            </a>
                            <?
                            $i++;
                            if($i == 3) break;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="right-col">
                <div class="howto-install">
                    <span class="medal"></span>
                    <h4 class="howto-install-title">Как установить:</h4>
                    <ul class="install-list">
                        <li class="install-list-item step1">Требуется загрузка на&nbsp;компьютер. Программа устанавливается на&nbsp;компьютере, ее&nbsp;можно запустить через меню Пуск или из&nbsp;<a href="/lk/Library">Библиотеки</a> ИНДИГОС. При установке тебя могут спросить код активации!</li>
                        <li class="install-list-item step2">После установки программа не требует подключения к интернету.</li>
                        <li class="install-list-item step3">Ты&nbsp;можешь установить эту программу на&nbsp;1&nbsp;компьютер</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-about">
    <div class="w1000">
        <div class="cols">
            <div class="left-col">
                <div class="col-string">
                    <div class="product-char">
                        <h3><?=GetMessage("DESC_FEATURES")?></h3>
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
                        ?><pre><?//print_r($arResult)?></pre>
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
                    <?
                    if ($arResult["DETAIL_TEXT"])
                    {
                        ?>
                        <div class="provider-desc">
                            <h3><?=GetMessage("DESC_SUPPLIER")?></h3>

                            <p class="provider-desc-text"><?=$arResult["DETAIL_TEXT"]?></p>
                            <?/*<p class="provider-desc-text hidden-text">Курс английского языка Talk More!, наряду с&nbsp;курсами Talk Now!, Talk the Talk!, Talk Business!, входит в&nbsp;серию языковых курсов различного уровня изучения, разработанных британской компанией EuroTalk.</p>
                            <div class="more-link-wrap">
                                <a href="/" class="more-link show-link" data-target="hidden-text">Полное описание</a>
                                <a href="/" class="more-link hide-link"data-target="hidden-text">Свернуть</a>
                            </div> */?>
                        </div>
                        <?/*<aside id="blok-op">
                            <h2><?=GetMessage("DESC_SUPPLIER")?></h2>

                            <div class="cont">
                                <div <?= strlen($arResult["DETAIL_TEXT"]) > 650 ?  'class="expandable_text"' : '' ?>>
                                    <p><?=$arResult["DETAIL_TEXT"]?></p>
                                </div>
                            </div>
                        </aside> */?>
                    <?
                    }
                    ?>

                </div>
                <?
                if (!empty($arResult['DISPLAY_PROPERTIES']['CONTENT']['VALUE']['TEXT']))
                {
                ?>
                    <div class="product-detailed-content">
                        <h3>Содержание</h3>
                        <?=htmlspecialchars_decode($arResult['DISPLAY_PROPERTIES']['CONTENT']['DISPLAY_VALUE'])?>
                    </div>
                <?
                }
                ?>
                <div class="item_buy_place clearfix">
                    <?if($arResult['ACTIVE']=='Y'):?>
                        <div id="packet_button">
                            <?//if($arResult['ACTIVE']=='Y')$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID'], 'Page' => 'CIPage'));?>
                        </div>

                    <?else:?>
                        <div class="ss_buy_place_no_sell ss_buy_item_no_sell" id="button_add_<?=$arParams['PRODUCT_ID']?>">
                            <div class="ss_buy_label_no_sell">Товар снят с продажи</div>
                            <div class="ss_buy_price_no_sell"></div>
                        </div>
                    <?endif?>
<!--                    <div style="" class="ss_buy_place ss_buy_item" onclick="javascript:add2basketPacket(20516);" id="button_add_20516">-->
<!--                        <div class="ss_buy_label">Купить</div>-->
<!--                        <div class="ss_buy_price">1035 р.</div>-->
<!--                    </div>-->

<!-- Temporary hide demo button-->
<!--
                    <?
                    $arDemo = explode('__', $arResult['PROPERTIES']['PROP_55']['VALUE']);
                    if (!empty($arDemo[1]))
                    {
                        ?>
                        <a href="<?=DEMO_LINK . $arDemo[1]?>" target="_blank" class="demo_button">Онлайн-демо</a>
                    <?
                    }
                    if (!empty($arResult['PROPERTIES']['DEMO_LINK']['VALUE']))
                    {
                        ?>
                        <div href="<?=$arResult['PROPERTIES']['DEMO_LINK']['VALUE']?>" class="demo_button demo_pop">Онлайн-демо</div>
                    <?
                    }
                    ?>
--> 
                </div>
            </div>
            <div class="right-col">
                <div class="aside-products">
                    <?$APPLICATION->IncludeComponent('indigos:catalog.element.inpacket', '', array('ITEM' => (int) $arResult['ID']), false)?>
                    <?
                    $arRecomParams['CLASS'] = implode(',',$arResult['PROPERTIES']['CLASS']['VALUE']);
                    $arRecomParams['SUBJECT'] = implode(',',$arResult['PROPERTIES']['SUBJECT']['VALUE']);
                    $arRecomParams['ID'] = (int) $arResult['ID'];


                    $APPLICATION->IncludeComponent(
                        'indigos:catalog.element.detail.recommended',
                        'new_detail',
                        array(
                            'CLASS' => $arRecomParams['CLASS'],
                            'SUBJECT' => $arRecomParams['SUBJECT'],
                            'TARGET' => $arRecomParams['ID']
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>