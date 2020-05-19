<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->SetViewTarget("ShowPacketSelector");?>
    <div class="qm_top_pannel qm_top_pannel_new clearfix">
        <div class="w1000">
            <div class="qm_class_select qm_class_select_new">
                <span>Образовательные наборы для</span>

                <div class="qm_class_drop">
                    <div class="qm_class_actual"><span><b><?=$arResult['TOPBAR']['CLASS'][ $arResult['TOPBAR']['SELECTED']['CLASS'] ]['CLASS']?></b></span></div>
                    <ul class="qm_classes_list" style="display: none;">
                        <?
                        $oldval=12;
                        foreach ($arResult['TOPBAR']['CLASS'] as $id => $arValues)
                        {
                            if($oldval!=$arValues['CLASS'] && $arValues['LINK']>0){
                                $oldval=$arValues['CLASS'];
                        ?>
                            <li class="qm_classes_li" onclick="document.location.href='/bookshelf/<?=$arValues['LINK']?>/?CLASS=<?=$id?>'"><a><?=$arValues['CLASS']?></a></li>
                        <?
                            }
                        }
                        ?>
                    </ul>
                </div>
                класса
            </div>
            <div class="qm_class_sunjects_list">
                <ul>
                    <?
                    foreach ($arResult['TOPBAR']['LIST'] as $id => $name)
                    {
                    ?>
                        <li <?=($id == $arResult['TOPBAR']['SELECTED']['ID']) ? 'class="active"' : ''?>><a href="/bookshelf/<?=$id?>/?CLASS=<?=$arResult['TOPBAR']['SELECTED']['CLASS']?>"><?=$name?></a></li>
                    <?
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?
$this->EndViewTarget();
?>

<?
if ($arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] === false)
{
    $_SESSION['OLD_PRICE'] = 0;
    $PRICE= 0;
    ?>

        <div class="w1000">
            <div id="a-rows">
                <div class="a-rows-left">
                    <h1 style="color: <?=$arResult["COLOR"]?>;"><?=$arResult["NAME"]?></h1>
                    <div class="sub-title">
                        <?if($arResult["DETAIL_TEXT"]):?>
                            <?=$arResult["DETAIL_TEXT"]?><br />
                        <?elseif($arResult["PREVIEW_TEXT"]):?>
                            <?=$arResult["PREVIEW_TEXT"]?><br />
                        <?endif;?>
                    </div>

                    <aside id="blok-2">
                        <h2>
                            <?if(isset( $arResult["DISPLAY_PROPERTIES"]["BOOKS"] )) :?>
                                <?if(is_array( $arResult["DISPLAY_PROPERTIES"]["BOOKS"] )) :?>
                                Содержание набора:
                                <?endif;?>
                            <?endif;?>
                        </h2>
                        <div class="cont">
                            <?if ( isset ( $arResult['DISPLAY_PROPERTIES']['BOOKS']['ELEMENTS'] ) ) :?>
                                    <?foreach ( $arResult['DISPLAY_PROPERTIES']['BOOKS']['ELEMENTS'] as $item ) :?>
                                        <?$APPLICATION->IncludeComponent("bitrix:catalog.element", "bookshelf-item", Array(
                                            "IBLOCK_TYPE" => "books",	// Тип инфоблока
                                            "IBLOCK_ID" => "9",	// Инфоблок
                                            "ELEMENT_ID" => $item["ID"],	// ID элемента
                                            "ELEMENT_CODE" => "",	// Код элемента
                                            "SECTION_ID" => "",	// ID раздела
                                            "SECTION_CODE" => "",	// Код раздела
                                            "HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
                                            "PROPERTY_CODE" => array(	// Свойства
                                                0 => "CID",
                                                1 => "PROP_2",
                                                2 => "PROP_24",
                                                3 => "PROP_8",
                                                4 => "PROP_7",
                                                5 => "PROP_19",
                                                6 => "PROP_16",
                                                7 => "GUID",
                                                8 => "ISBN",
                                                9 => "PROP_62",
                                                10 => "PROP_68",
                                                11 => "PROP_67",
                                                12 => "PROP_66",
                                                13 => "PROP_65",
                                                14 => "PROP_64",
                                                15 => "PROP_29",
                                                16 => "PROP_30",
                                                17 => "PROP_33",
                                                18 => "PROP_25",
                                                19 => "PROP_38",
                                                20 => "PROP_37",
                                                21 => "PROP_27",
                                                22 => "PROP_46",
                                                23 => "PROP_57",
                                                24 => "PROP_55",
                                                25 => "PROP_56",
                                                26 => "PROP_48",
                                                27 => "PROP_26",
                                                28 => "PROP_60",
                                                29 => "PROP_40",
                                                30 => "CONTENT_TYPE",
                                                31 => "GRAPHICS",
                                                32 => "EXTRASUBJECT",
                                                33 => "THEORY",
                                                34 => "PROP_11",
                                                35 => "CNT_TEST_Q",
                                                36 => "EXER_CNT",
                                                37 => "PROP_6",
                                                38 => "MARK_TEXT",
                                                39 => "ED_TYPE",
                                                40 => "OGRANICHENIYA",
                                                41 => "BASED_ON",
                                                42 => "PROP_51",
                                                43 => "PROP_3",
                                                44 => "PROP_49",
                                                45 => "POSTAVSHIK",
                                                46 => "EXAMPLE",
                                                47 => "HIT",
                                                48 => "PROP_28",
                                                49 => "SCREEN_IDS",
                                                50 => "TESTS",
                                                51 => "TYPE",
                                                52 => "EXERCIES",
                                                53 => "FEATURE",
                                                54 => "LANG",
                                                55 => "CLASS",
                                                56 => "SUBJECT",
                                                57 => "AUTORS",
                                                58 => "PUBLISHER",
                                                59 => "BOOKS",
                                                60 => "",
                                            ),
                                            "OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
                                            "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                                            "DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
                                            "BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
                                            "ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
                                            "PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
                                            "PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
                                            "PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
                                            "SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
                                            "CACHE_TYPE" => "N",	// Тип кеширования
                                            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                                            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                                            "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
                                            "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
                                            "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
                                            "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                                            "SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
                                            "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
                                            "USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
                                            "PRICE_CODE" => array(	// Тип цены
                                                0 => "BASE",
                                            ),
                                            "USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
                                            "SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
                                            "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
                                            "PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
                                            "PRODUCT_PROPERTIES" => "",	// Характеристики товара
                                            "USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
                                            "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
                                            "LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
                                            "LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
                                            "LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
                                            "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
                                            ),
                                            false
                                        );?>
                                    <?endforeach;?>
                            <?endif;?>
                        </div>
    <br /><br />
                        <?
                        $arPrice = CPrice::GetBasePrice((int) $arResult['ID']);
                        $PRICE = round($arPrice['PRICE']);
                        $DPRICE = intval($_SESSION['OLD_PRICE']) - intval($PRICE);
                        ?>
                        <?if($DPRICE>0):?>
    <div class="bookshelf">
        <div class="price"><label>Цена за набор</label><span class="right"><span class="zacherk"></span> <?=$_SESSION['OLD_PRICE']?> р.</span></div>
    </div>
                        <?endif;?>


                    </aside>
                    <section class="article_section">
                        <div class="section_h bold">Отзывы покупателей:</div>
                        <?$APPLICATION->IncludeComponent("indigos:reviews.show", "packet", array(
	"IB_TYPE" => "origin",
	"IB_ID" => "20",
	"ID_LINK" => ""
	),
	false
);?>
                    </section>
                </div>
                <div class="a-rows-right">

                    <div class="img">
                        <div id="pop_warranty" href="/about/guaranty/">
                            <div class="waranty <?=$arResult['COLOR_NAME']?>"></div>
                        </div>
                        <?if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])):?>
                            <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                                <img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                            <?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
                                <img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                            <?endif?>
                        <?else:?>
                            <?
                            if ( $arResult['TYPE'] == 'rus' )
                            {
                                ?>
                                <img border="0" src="/images/default_pack/rus.png" />
                                <?
                            }
                            elseif ( $arResult['TYPE'] == 'math' )
                            {
                                ?>
                                <img border="0" src="/images/default_pack/math.png" />
                                <?
                            }
                            elseif ( $arResult['TYPE'] == 'read' )
                            {
                                ?>
                                <img border="0" src="/images/default_pack/read.png" />
                                <?
                            }
                            else
                            {
                                ?>
                                <img border="0" src="/images/default_pack/en.png" />
                                <?
                            }
                            ?>

                        <?endif;?>
                    </div>
                    <?if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])):?>
                    <?else:?>
                        <?foreach($arResult["PRICES"] as $code=>$arPrice):?>
                            <?if($arPrice["CAN_ACCESS"]):?>


                                <div class="big-price">
                                    <p style="font-size: 18px; font-family: 'Conv_DINPro-Bold';margin-left: 24px; margin-bottom: 0px;">
                                    Образовательный набор
                                    </p>
                                    <p style="font-size: 14px;margin-left: 24px;">
                                    Для скачивания и установки <br />на компьютер с ОС Windows Vista, 7,8
                                    </p>
<!--                                --><?//if($arResult["CAN_BUY"]):?>
                                    <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID'], 'STYLE' => 'z-index:100;'));?>
                                    </div>

                            <?endif;?>
                        <?endforeach;?>
                    <?endif?>

    <?if($DPRICE>0):?>
                    <div class="desc" style="margin-top: -20px;margin-left: 64px;"><span style="font-size: 14px;">Специальная цена для пользователей <b>«Дневника»</b>.  Экономия <?=( $DPRICE )?> р.</span></div>
    <?endif;?>
                </div>
                <div class="clear"></div>



            </div>

            </div>
<?
}
elseif ($arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] === 'PREMIUM')
{
    $arPrice = CPrice::GetBasePrice($arResult['ID']);
    $price = round($arPrice['PRICE']);
?>
    <script type="text/javascript">
        $('body').addClass('whitepage');
    </script>
    <div class="w1000">
        <div class="package_page pcg_4 clearfix">
            <div class="package_left">
                <figure class="">
                    <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                    <?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
                        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
                    <?endif?>
                </figure>
                <div class="package_required">
                    <div class="package_required_text">Для установки на компьютеры с операционными системами</div>
                    <div class="package_systems">
                        <img src="/images/w7_small.png" alt="">
                        <img src="/images/w8_small.png" alt="">
                    </div>
                </div>
                <div class="package_benefits">
                    <ul class="package_benefits_list">
                        <li><i class="package_benefit package_benefit_1"></i>Нравится детям и подросткам</li>
                        <li><i class="package_benefit package_benefit_2"></i>Безопасные программы</li>
                        <li><i class="package_benefit package_benefit_3"></i>Эффективность подтверждена</li>
                        <li><i class="package_benefit package_benefit_4"></i>Гарантия от Индигос</li>
                    </ul>
                </div>
            </div>
            <div class="package_full">
                <header class="package_header">
                    <h1 class="bold"><?=$arResult['NAME']?></h1>
                    <h2>Образовательный набор для <?=$arResult['TOPBAR']['CLASS'][ $arResult['TOPBAR']['SELECTED']['CLASS'] ]['CLASS']?> класса серия «<?=$arResult['TOPBAR']['LIST'][ $arResult['ID'] ] ?>»</h2>
                    <?if (!empty($arResult['PREVIEW_TEXT'])) {?>
                        <p class="lead"><?=$arResult['PREVIEW_TEXT']?></p>
                    <?}?>
                </header>
                <section class="article_section">
                    <?
                    if (!empty($arResult['PROPERTIES']['INCLUDES']['VALUE']))
                    {w
                    ?>
                        <div class="section_h bold">В набор входят:</div>
                        <ul class="package_contain">
                            <?
                            foreach ($arResult['PROPERTIES']['INCLUDES']['VALUE'] as $id => $value)
                            {
                                $isPresent = $value == '+ ПОДАРОК';
                            ?>
                                <li><span class="package_ico_cnt"><i class="package_ico package_ico_<?=$arResult['PROPERTIES']['INCLUDES']['VALUE_XML_ID'][ $id ]?>"></i></span>
                                    <?=$isPresent ? '<span class="present">' : ''?>
                                    <?=$value?>
                                    <?=$isPresent ? '</span>' : ''?>
                                </li>
                            <?
                            }
                            ?>
                        </ul>
                    <?
                    }
                    ?>
                    <div class="item_buy_place clearfix">
                        <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID']));?>
<!--                        <div class="sale_sticker">-->
<!--                            <div class="sale_date">-->
<!--                                <div class="sale_date_h">Скидка</div>до 31.01-->
<!--                            </div>-->
<!--                            <div class="sale_p">15%</div>-->
<!--                        </div>-->
                    </div>
                </section>
                <?if (!empty($arResult['DETAIL_TEXT'])) {?>
                    <section class="article_section">
                        <div class="section_h bold">Описание:</div>
                        <?=$arResult['DETAIL_TEXT']?>
                    </section>
                <?}?>
                <?
                /*Пиздец ужасно, потом переделать ToDo*/
                $sumPrice = 0;
                $arBooks = $arResult['DISPLAY_PROPERTIES']['BOOKS']['ELEMENTS'];
                if (!empty($arBooks)  && $arBooks[0] != '')
                {
                    foreach ($arBooks as $book)
                    {
                        $arIds[] = $book['ID'];
                    }
                    //----Товары в пакете----
                    $dbItem = CIBlockElement::GetList(
                        array(),
                        array(
                            'ID' => $arIds
                        ),
                        false,
                        false,
                        array('ID', 'NAME', 'PROPERTY_SUBJECT.NAME')
                    );
                    while ($arItem = $dbItem->Fetch())
                    {
                        $arItems[ $arItem['ID'] ] = $arItem;
                    }
                    foreach ($arItems as $arItem)
                    {
                        $arPrice = CPrice::GetBasePrice($arItem['ID']);
                        $sumPrice = $sumPrice + $arPrice['PRICE'];
                        $arResult['PACKET_ITEMS']['NORMAL'][ $arItem['PROPERTY_SUBJECT_NAME'] ][] = $arItem;
                    }

                    //----Подарки----
                    $arIds = array();
                    $arItems = array();
                    $dbGifts = CIBlockElement::GetList(array(), array('ID' => $arResult['ID']), false, false, array('ID', 'PROPERTY_GIFT.ID'));
                    while ($arGift = $dbGifts->Fetch())
                    {
                        $arIds[] = $arGift['PROPERTY_GIFT_ID'];
                    }
                    if (!empty($arIds) && $arIds[0] != '')
                    {
                        $dbItem = CIBlockElement::GetList(
                            array(),
                            array(
                                'ID' => $arIds
                            ),
                            false,
                            false,
                            array('ID', 'NAME', 'PROPERTY_SUBJECT.NAME')
                        );
                        while ($arItem = $dbItem->Fetch())
                        {
                            $arItems[ $arItem['ID'] ] = $arItem;
                        }
                        foreach ($arItems as $arItem)
                        {
                            $arResult['PACKET_ITEMS']['GIFT'][ $arItem['PROPERTY_SUBJECT_NAME'] ][] = $arItem;
                        }
                    }
                    $sumPrice = round($sumPrice);
                }
                /*Конец пиздеца*/
                ?>
                <section class="article_section">
                    <div class="expandable_contain expanded">
                        <div class="expandable_contain_h bold">Содержание набора<a href="" class="exp_arrow">
                                <span class="oie_expand">▼</span>
                                <span class="oie_suspand">▲</span>
                            </a></div>
                        <div class="expandable_contain_body">
                            <?
                            foreach ($arResult['PACKET_ITEMS']['NORMAL'] as $groupName => $group)
                            {
                            ?>
                                <div class="lesson_section">
                                    <div class="lesson_h bold"><?=$groupName?></div>
                                    <ul class="lesson_contains_ul">
                                        <?
                                        foreach ($group as $item)
                                        {
                                        ?>
                                        <li><?=$item['NAME']?></li>
                                        <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?
                            }
                            ?>
                            <?if (!empty($arResult['PACKET_ITEMS']['GIFT'])) {?>
                                <div class="bonus_block">
                                    <div class="bonus_block_h"><span><i class="package_ico package_ico_6"></i>ПОДАРОК</span></div>
                                    <?
                                    foreach ($arResult['PACKET_ITEMS']['GIFT'] as $groupName => $group)
                                    {
                                        ?>
                                        <div class="lesson_section">
                                            <div class="lesson_h bold"><?=$groupName?></div>
                                            <ul class="lesson_contains_ul">
                                                <?
                                                foreach ($group as $item)
                                                {
                                                    ?>
                                                    <li><?=$item['NAME']?></li>
                                                <?
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?
                                    }
                                    ?>
                                </div>
                            <?}?>
                        </div>
                    </div>

	<?//не показывать зачеркнутую цену, если цена пакета равна сумме (18.04.14 doletsky)?>
	<?if($arResult['CATALOG_PRICE_1']<$sumPrice):?>
                    <div class="package_price"><div class="ss_final_price">Цена за набор:  <span class="ss_f_croseed"><?=$sumPrice?> Р</span></div></div>
	<?endif?>
                    <div class="item_buy_place item_buy_place_cnt">
                        <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID'], 'STYLE' => 'float:none;'));?>
<!--                        <div class="sale_sticker">-->
<!--                            <div class="sale_date">-->
<!--                                <div class="sale_date_h">Скидка</div>до 31.01-->
<!--                            </div>-->
<!--                            <div class="sale_p">15%</div>-->
<!--                        </div>-->
                    </div>

                </section>
                <section class="article_section">
                    <div class="section_h bold">Отзывы покупателей:</div>
                    <?$APPLICATION->IncludeComponent("indigos:reviews.show", "packet", array(
	"IB_TYPE" => "origin",
	"IB_ID" => "20",
	"ID_LINK" => ""
	),
	false
);?>
                </section>
            </div>
        </div>

    </div>
<?
}
elseif ($arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] === 'EGE')
{
    $arPrice = CPrice::GetBasePrice($arResult['ID']);
    $price = round($arPrice['PRICE']);
    ?>
    <script type="text/javascript">
        $('body').addClass('whitepage');
    </script>
    <div class="w1000">
    <div class="package_page pcg_4 clearfix">
    <div class="package_left">
        <figure class="">
            <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
            <?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
                <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
            <?endif?>
        </figure>
        <div class="package_required">
            <div class="package_required_text">Для установки на компьютеры с операционными системами</div>
            <div class="package_systems">
                <img src="/images/w7_small.png" alt="">
                <img src="/images/w8_small.png" alt="">
            </div>
        </div>
        <div class="package_benefits">
            <ul class="package_benefits_list">
                <li><i class="package_benefit package_benefit_1"></i>Нравится детям и подросткам</li>
                <li><i class="package_benefit package_benefit_2"></i>Безопасные программы</li>
                <li><i class="package_benefit package_benefit_3"></i>Эффективность подтверждена</li>
                <li><i class="package_benefit package_benefit_4"></i>Гарантия от Индигос</li>
            </ul>
        </div>
    </div>
    <div class="package_full">
        <header class="package_header">
            <h1 class="bold"><?=$arResult['NAME']?></h1>
            <h2>Образовательный набор для <?=$arResult['TOPBAR']['CLASS'][ $arResult['TOPBAR']['SELECTED']['CLASS'] ]['CLASS']?> класса</h2>
            <?if (!empty($arResult['PREVIEW_TEXT'])) {?>
                <p class="lead"><?=$arResult['PREVIEW_TEXT']?></p>
            <?}?>
        </header>
        <section class="article_section">
            <?
            if (!empty($arResult['PROPERTIES']['INCLUDES']['VALUE']))
            {
                ?>
                <div class="section_h bold">В набор входят:</div>
                <ul class="package_contain">
                    <?
                    foreach ($arResult['PROPERTIES']['INCLUDES']['VALUE'] as $id => $value)
                    {
                        $isPresent = $value == '+ ПОДАРОК';
                        ?>
                        <li><span class="package_ico_cnt"><i class="package_ico package_ico_<?=$arResult['PROPERTIES']['INCLUDES']['VALUE_XML_ID'][ $id ]?>"></i></span>
                            <?=$isPresent ? '<span class="present">' : ''?>
                            <?=$value?>
                            <?=$isPresent ? '</span>' : ''?>
                        </li>
                    <?
                    }
                    ?>
                </ul>
            <?
            }
            ?>
            <?$APPLICATION->ShowViewContent('package_price');?>
            <div class="item_buy_place clearfix">
                <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID']));?>
<!--                <div class="sale_sticker">-->
<!--                    <div class="sale_date">-->
<!--                        <div class="sale_date_h">Скидка</div>до 23.02-->
<!--                    </div>-->
<!--                    <div class="sale_p">10%</div>-->
<!--                </div>-->
            </div>
        </section>
        <?if (!empty($arResult['DETAIL_TEXT'])) {?>
            <section class="article_section">
                <div class="section_h bold">Описание:</div>
                <?=$arResult['DETAIL_TEXT']?>
            </section>
        <?}?>
        <?
        /*Пиздец ужасно, потом переделать ToDo*/
        $sumPrice = 0;
        $arBooks = $arResult['DISPLAY_PROPERTIES']['BOOKS']['ELEMENTS'];
        if (!empty($arBooks)  && $arBooks[0] != '')
        {
            foreach ($arBooks as $book)
            {
                $arIds[] = $book['ID'];
            }
            //----Товары в пакете----
            $dbItem = CIBlockElement::GetList(
                array(),
                array(
                    'ID' => $arIds
                ),
                false,
                false,
                array('ID', 'NAME', 'PROPERTY_SUBJECT.NAME')
            );
            while ($arItem = $dbItem->Fetch())
            {
                $arItems[ $arItem['ID'] ] = $arItem;
            }
            foreach ($arItems as $arItem)
            {
                $arPrice = CPrice::GetBasePrice($arItem['ID']);
                $sumPrice = $sumPrice + $arPrice['PRICE'];
                $arResult['PACKET_ITEMS']['NORMAL'][ $arItem['PROPERTY_SUBJECT_NAME'] ][] = $arItem;
            }

            //----Подарки----
            $arIds = array();
            $arItems = array();
            $dbGifts = CIBlockElement::GetList(array(), array('ID' => $arResult['ID']), false, false, array('ID', 'PROPERTY_GIFT.ID'));
            while ($arGift = $dbGifts->Fetch())
            {
                $arIds[] = $arGift['PROPERTY_GIFT_ID'];
            }
            if (!empty($arIds) && $arIds[0] != '')
            {
                $dbItem = CIBlockElement::GetList(
                    array(),
                    array(
                        'ID' => $arIds
                    ),
                    false,
                    false,
                    array('ID', 'NAME', 'PROPERTY_SUBJECT.NAME')
                );
                while ($arItem = $dbItem->Fetch())
                {
                    $arItems[ $arItem['ID'] ] = $arItem;
                }
                foreach ($arItems as $arItem)
                {
                    $arResult['PACKET_ITEMS']['GIFT'][ $arItem['PROPERTY_SUBJECT_NAME'] ][] = $arItem;
                }
            }
            $sumPrice = round($sumPrice);
        }
        /*Конец пиздеца*/
        ?>
        <section class="article_section">
            <div class="expandable_contain expanded">
                <div class="expandable_contain_h bold">Содержание набора<a href="" class="exp_arrow">
                        <span class="oie_expand">▼</span>
                        <span class="oie_suspand">▲</span>
                    </a></div>
                <div class="expandable_contain_body">
                    <?
                    foreach ($arResult['PACKET_ITEMS']['NORMAL'] as $groupName => $group)
                    {
                        ?>
                        <div class="lesson_section">
                            <div class="lesson_h bold"><?=$groupName?></div>
                            <ul class="lesson_contains_ul">
                                <?
                                foreach ($group as $item)
                                {
                                    ?>
                                    <li><?=$item['NAME']?></li>
                                <?
                                }
                                ?>
                            </ul>
                        </div>
                    <?
                    }
                    ?>
                    <?if (!empty($arResult['PACKET_ITEMS']['GIFT'])) {?>
                        <div class="bonus_block">
                            <div class="bonus_block_h"><span><i class="package_ico package_ico_6"></i>ПОДАРОК</span></div>
                            <?
                            foreach ($arResult['PACKET_ITEMS']['GIFT'] as $groupName => $group)
                            {
                                ?>
                                <div class="lesson_section">
                                    <div class="lesson_h bold"><?=$groupName?></div>
                                    <ul class="lesson_contains_ul">
                                        <?
                                        foreach ($group as $item)
                                        {
                                            ?>
                                            <li><?=$item['NAME']?></li>
                                        <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?
                            }
                            ?>
                        </div>
                    <?}?>
                </div>
            </div>
	<?if($arResult['CATALOG_PRICE_1']<$sumPrice):?>
            <div class="package_price"><div class="ss_final_price">Цена за набор:  <span class="ss_f_croseed"><?=$sumPrice?> Р</span></div></div>
	<?endif?>
            <?$this->SetViewTarget("package_price");?>
	<?if($arResult['CATALOG_PRICE_1']<$sumPrice):?>
            <div class="package_price"><div class="ss_final_price">Цена за набор:  <span class="ss_f_croseed"><?=$sumPrice?> Р</span></div></div>
	<?endif?>
            <?$this->EndViewTarget();?>
            <div class="item_buy_place item_buy_place_cnt">
                <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', 'packet', array('PRODUCT_ID' => $arResult['ID'], 'STYLE' => 'float:none;'));?>
<!--                <div class="sale_sticker">-->
<!--                    <div class="sale_date">-->
<!--                        <div class="sale_date_h">Скидка</div>до 23.02-->
<!--                    </div>-->
<!--                    <div class="sale_p">10%</div>-->
<!--                </div>-->
            </div>

        </section>
        <section class="article_section">
            <div class="section_h bold">Отзывы покупателей:</div>
            <?$APPLICATION->IncludeComponent("indigos:reviews.show", "packet", array(
                    "IB_TYPE" => "origin",
                    "IB_ID" => "20",
                    "ID_LINK" => ""
                ),
                false
            );?>
        </section>
    </div>
    </div>

    </div>
<?
}
?>