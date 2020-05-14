<?
define('NEED_FILTER', true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Индигос.ru — магазин образовательного контента");
if($_GET['set_filter']=='Y'){
    CModule::IncludeModule("iblock");
    $arItemType2=array();
    $arTarget=array(
        'Обучение'=>'section-study',
        'Развитие'=>'section-developing',
        'Развлечение'=>'section-entertainment'
    );
    $db_enum_list = CIBlockProperty::GetPropertyEnum("ITEM_TYPE", Array(), Array("IBLOCK_CODE"=>'books'));
    while($ar_enum_list = $db_enum_list->GetNext())
    {
        $arItemType2['PROPERTY_'.$ar_enum_list['PROPERTY_ID']][$ar_enum_list['ID']]=$arTarget[$ar_enum_list['VALUE']];
    }
    foreach($_GET as $key=>$val){
        if(substr_count($key,'PROPERTY')){
            $valName=explode('_',$key);
            $GLOBALS['arrFilter']["PROPERTY_".$valName[1]]=$val;
            $_POST['arrFilter_'.$valName[1].'_'.abs(crc32($val))]="Y";
            if(array_key_exists("PROPERTY_".$valName[1], $arItemType2)){
                $_POST['target']=$arItemType2["PROPERTY_".$valName[1]][$val];
            }
        }
    }
    $_POST['set_filter']='Y';
}
$_GET=array_merge($_GET,$_POST);
?>
    <div class="submenu-wrapper">

        <section data-target="section-we-have" class="we-have-section" style="display:block;">
            <div class="white-bg-wrapper" style="padding-bottom: 59px;">
<!--                <div class="wrapper">-->
<!--                    --><?//if(file_exists($_SERVER["DOCUMENT_ROOT"]."/images/like-banner-for-gs1.jpg")):?>
<!--                    <div class="section-body" style="text-align: center;">-->
<!--                        <img src="/images/like-banner-for-gs.jpg" />-->
<!--                    </div>-->
<!--                      --><?//else:?>
<!--                        <div class="section-body" style="padding-bottom: 20px">-->
<!--                           <h3 class="main-title">Технические работы</h3>-->
<!--                           <p class="about-par" style="padding-left: 16px;">Уважаемые пользователи! По техническим причинам электронный контент будет доступен с 1 сентября 2015 года.-->
<!--                           </p>-->
<!--                        </div>-->
<!--                      --><?//endif?>
<!---->
<!---->
<!--                </div>-->
            </div>
            <div class="submenu-wrapper_cover"></div>
        </section>
        <div class="submenu-wrapper_preloader"><img alt="" src="/img/basket/preloader.png"></div>
    </div>
    </div>

    <!-- Старт блока со слоганом и телефоном поддержки -->
    <section class="slogan-section">
        <div class="wrapper">
            <div class="slogan-text">Выбирайте современные образовательные материалы для детей</div>
            <div class="support-contact">
                <div class="support-time">Служба поддержки: <span style="margin: 0 6px;">пн&ndash;пт,</span> 9&ndash;19</div>
                <div class="support-phone">
                    <strong style="cursor: pointer" onclick="document.location.href='mailto:care@indigos.ru'">8 800 555 07 05</strong>
                </div>

            </div>
        </div>
    </section>
    <!--section class="slogan-section" style="height: 36px">
        <div class="wrapper">
            <div class="slogan-text fmin">Выбирайте современные образовательные материалы для детей
                <div class="support-time">Служба поддержки: <span style="margin: 0 6px;">пн–пт,</span> 11–20 <strong class="slogan_mail_support" onclick="document.location.href='mailto:care@indigos.ru'">care@indigos.ru</strong></div>
            </div>

        </div>
    </section-->
    <!-- Конец блока со слоганом и телефоном поддержки -->

    <!-- Начало блока с карточками -->
    <div class="catalog">

    <!-- Конец блока с карточками -->
        <?$APPLICATION->IncludeComponent("bitrix:news.line","",Array(
                "IBLOCK_TYPE" => "-",
                "IBLOCKS" => Array("24"),
                "NEWS_COUNT" => "5",
                "FIELD_CODE" => Array("ID", "CODE", "PROPERTY_N_HIT", "CATALOG_GROUP_1", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_CID", "PROPERTY_ARTICLE"),
                "SORT_BY1" => "PROPERTYSORT_N_HIT",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "timestamp_x",
                "SORT_ORDER2" => "ASC",
                "DETAIL_URL" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "300",
                "CACHE_GROUPS" => "Y",
                "BLOCK_TITLE" => "Хиты продаж",
                "LP_LINK" => ""
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:news.line","",Array(
                "IBLOCK_TYPE" => "-",
                "IBLOCKS" => Array("24"),
                "NEWS_COUNT" => "5",
                "FIELD_CODE" => Array("ID", "CODE", "PROPERTY_N_POP", "CATALOG_GROUP_1", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_CID", "PROPERTY_ARTICLE"),
                "SORT_BY1" => "PROPERTYSORT_N_POP",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "timestamp_x",
                "SORT_ORDER2" => "ASC",
                "DETAIL_URL" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "300",
                "CACHE_GROUPS" => "Y",
                "BLOCK_TITLE" => "Популярные товары",
                "LP_LINK" => ""
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:news.line","",Array(
                "IBLOCK_TYPE" => "-",
                "IBLOCKS" => Array("24"),
                "NEWS_COUNT" => "5",
                "FIELD_CODE" => Array("ID", "CODE", "PROPERTY_N_OFFER", "CATALOG_GROUP_1", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_CID", "PROPERTY_ARTICLE"),
                "SORT_BY1" => "PROPERTYSORT_N_OFFER",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "timestamp_x",
                "SORT_ORDER2" => "ASC",
                "DETAIL_URL" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "300",
                "CACHE_GROUPS" => "Y",
                "BLOCK_TITLE" => "Специальные предложения",
                "LP_LINK" => "/catalog/offer/"
            )
        );?>
        <?if(!$USER->IsAuthorized()):?>
        <section class="slogan-section" style="margin-top: 0;">
            <div class="wrapper"  style="padding-left: 245px;">
                <div class="slogan-text" style="cursor: pointer;text-align: center;padding-top: 0;" onclick="location.href='/personal/register.php?reg=main';">Оставайтесь с нами! <img class="slogan-img-email" src="/images/mail/email.png" /> Присоединяйтесь, это бесплатно!</div>
            </div>
        </section>
        <?endif?>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>