<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>


<footer class="footer<?if($APPLICATION->GetCurPage()=="/"):?> footer-main<?endif?>">
    <div class="wrapper">
        <div class="left-block">
            <div>&copy;&nbsp;2014, Образовательный ресурс &laquo;INDIGOS&raquo;.</div>
            <div>ООО &laquo;Индигос&raquo;, юр. адрес: 105066, г. Москва, ул. Доброслободская, д.5 ОГРН 1077763638226</div>
            <div onclick="document.location.href='mailto:care@indigos.ru'" style="cursor: pointer">e-mail: care@indigos.ru</div>
        </div>
        <div class="right-block">
            <ul class="<?if($APPLICATION->GetCurPage()=="/"):?>footer-main-color<?else:?>footer-menu-list<?endif?>">
                <li class="footer-menu-item">
                    <a href="/about/" class="footer-menu-link">О нас</a>
                </li>
                <li class="footer-menu-item">
                    <a href="/about/contacts/" class="footer-menu-link">Контакты</a>
                </li>
                <li class="footer-menu-item">
                    <a href="/about/oferta/" class="footer-menu-link">Условия продажи</a>
                </li>
            </ul>
        </div>
        <div class="footer_cards">
            <img alt="" src="/img/cards/visa.gif">
            <img alt="" src="/img/cards/mc.gif">
        </div>
    </div>
</footer>

<? //$APPLICATION->IncludeFile('/inc_areas/indigos_YM.php') ?>
<?
$APPLICATION->ShowViewContent('popup');
//$APPLICATION->IncludeComponent("indigos:sale.order.oneclick", "link", array(
//        "PERSON_TYPE" => "1",
//        "PERSON_TYPE_PROPS" => array(
//            0 => "0",
//        ),
//        "ORDER_PRODUCT" => "2",
//        "USE_USER" => "N",
//        "PRODUCT_ID" => "",
//        "PAYSYSTEM" => "5",
//        "DELIVERY" => "2",
//        "USE_CAPTCHA" => "N",
//        "TITLE_POPUP" => "Оформление заказа в один клик",
//        "CONFIRM_ORDER" => "Спасибо. Ваш заказ принят."
//    ),
//    false
//);
?>
<? $APPLICATION->IncludeFile('/inc_areas/indigos_how-it-works.php') ?>
<?$APPLICATION->IncludeFile('/bitrix/templates/new-indigos/getFreeContent.php');//диалог получения бесплатного контента?>
<?$APPLICATION->IncludeFile('/bitrix/templates/new-indigos/getPriceToMail.php');//диалог получения цены?>
</body>
</html>