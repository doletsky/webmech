<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    ".default",
    array(
        "AREA_FILE_SHOW" => "sect", //Показывать включаемую область для раздела
        "AREA_FILE_SUFFIX" => "promo_footer", //Суффикс имени файла включаемой области
        "EDIT_TEMPLATE" => "",
        "PATH" => "",
        "AREA_FILE_RECURSIVE" => "N" //Рекурсивное подключение включаемых областей разделов
    ),
    false
);?>

</div>
<a class="scroll-top-icon scroll-top" href="#"><i
        class="fa fa-angle-up"></i></a>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jRespond.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.waitforimages.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.transit.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.stellar.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/simple-scrollbar.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/superfish.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scrollIt.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/functions.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/forms.js"></script>


</body>
</html>