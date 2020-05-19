<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>


<footer id="footer">
    <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
            "ROOT_MENU_TYPE" => "bottom",
            "MAX_LEVEL" => "1",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_TIME" => "36000000",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => array(
            ),
        ),
        false
    );?>

    <? $APPLICATION->IncludeFile('/inc_areas/indigos_footer_bottom.php') ?>

</footer><!-- #footer -->

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

</body>
</html>