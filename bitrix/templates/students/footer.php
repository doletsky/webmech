

</div>
</div>

<!-- Sidebar -->
<div id="sidebar">
    <div class="inner">

        <!-- Menu -->
        <nav id="menu">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "vertical_student",
                Array(
                    "ROOT_MENU_TYPE" => "left",
                    "MAX_LEVEL" => "1",
                    "USE_EXT" => "N",
                    "DELAY" => "Y",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array()
                )
            );?>

        </nav>

    </div>
</div>

</div>

<!-- Scripts -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/browser.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/breakpoints.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/util.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/main.js"></script>
<script type="text/javascript" src="/promo/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/promo/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/promo/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/assets/js/lk.js"></script>

</body>
</html>