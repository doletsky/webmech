<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
$APPLICATION->IncludeFile('/inc_areas/indigos_lid.php');
$isIndexPage = ($APPLICATION->GetCurPage() == '/' || $APPLICATION->GetCurPage() == '/catalog.php');
if($APPLICATION->GetCurDir() == '/search') define('NEED_FILTER', false);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
//included for smart filter (after removing smart filter from project, delete core.js and core_ajax.js from loading)
$APPLICATION->AddHeadString('<script type="text/javascript" src="/bitrix/js/main/core/core.js?'.SM_VERSION.'"></script>');
$APPLICATION->AddHeadString('<script type="text/javascript" src="/bitrix/js/main/core/core_ajax.js?'.SM_VERSION.'"></script>');

$APPLICATION->AddHeadString('<link rel="icon" type="image/x-icon" href="/favicon.ico" />');
$APPLICATION->ShowHead();
if ($isIndexPage) {
    $APPLICATION->AddHeadString('<meta property="og:title" content="Индигос" />');
    $APPLICATION->AddHeadString('<meta property="og:type" content="website" />');
    $APPLICATION->AddHeadString('<meta property="og:url" content="http://www.indigos.ru" />');
    $APPLICATION->AddHeadString('<meta property="og:image" content="http://www.indigos.ru/images/girl.png" />');
    $APPLICATION->AddHeadString('<meta property="og:description" content="Магазин образовательного контента «Индигос»" />');
}
$APPLICATION->SetAdditionalCSS("/bitrix/templates/.default/styles.css");
$APPLICATION->AddHeadString('<link rel="stylesheet" href="/bitrix/templates/new-indigos/css/login.css">');
//$APPLICATION->AddHeadString('<link rel="stylesheet" href="/bitrix/templates/new-indigos/css/main.css">');
$APPLICATION->AddHeadString('<!--[if lte IE 6]><link rel="stylesheet" href="style_ie.css" type="text/css" media="screen, projection" /><![endif]-->');
$APPLICATION->AddHeadString("<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,300,200,200italic,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>");
$APPLICATION->AddHeadString('<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/bitrix/templates/.default/ie8-and-down.css" /><![endif]-->');

$APPLICATION->AddHeadString('<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>');
$APPLICATION->AddHeadString('<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>');
$APPLICATION->AddHeadString('<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
$APPLICATION->AddHeadScript('/js/jquery.bxslider.js');
$APPLICATION->AddHeadScript('/js/jquery.checkbox.min.js');
$APPLICATION->AddHeadScript('/js/site.js');
$APPLICATION->AddHeadScript('/js/jQuery.CustomSelect.js');
$APPLICATION->AddHeadString('<script type="text/javascript" src="/js/basket/buy_btn.js"></script>');
$APPLICATION->AddHeadString('<script type="text/javascript" src="/js/jquery.transform.js-master/jquery.transform2d.js"></script>');
$APPLICATION->AddHeadString('<script type="text/javascript" src="/js/basket/update_btn.js"></script>');
$APPLICATION->AddHeadString('<script type="text/javascript" src="/js/searchMenuItem.js"></script>');
if(($APPLICATION->GetCurDir()>='/bookshelf/'||$APPLICATION->GetCurDir()>='/products/') && $_GET['buy']=='now'){
    $APPLICATION->AddHeadString('<script type="text/javascript" src="/js/basket/buy_now.js"></script>');
}
?>
    <title><?$APPLICATION->ShowTitle()?></title>
<? $APPLICATION->IncludeFile('/inc_areas/fancybox.php'); //ToDo надо удалить?>
<?if($APPLICATION->GetCurDir()>='/bookshelf/'||$APPLICATION->GetCurDir()>='/books/'||$APPLICATION->GetCurDir()>='/cart/'):?>
    <!-- Start Visual Website Optimizer Asynchronous Code -->
    <script type='text/javascript'>
        var _vwo_code=(function(){
            var account_id=83631,
                settings_tolerance=2000,
                library_tolerance=2500,
                use_existing_jquery=false,
// DO NOT EDIT BELOW THIS LINE
                f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
    </script>
    <!-- End Visual Website Optimizer Asynchronous Code -->
<?endif?>
    <link href='http://fonts.googleapis.com/css?family=Bad+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<?
if (SITE_TEMPLATE_ID == 'eshop_gray')
{
    $bobyParam = 'class="front"';
}
elseif (SITE_TEMPLATE_ID == 'indigos_detail_shop')
{
    $APPLICATION->AddHeadScript('/js/stickySidebar.js');
    $APPLICATION->AddHeadScript('/js/plugins/jquery.fitvids.js');
    $APPLICATION->AddHeadScript('/js/plugins/jquery.easing.1.3.js');
    $bobyParam = 'class="not-front"';
}
elseif (SITE_TEMPLATE_ID == 'indigos_info')
{
    $bobyParam = 'class="product"';
}

?>
<body <?=$bobyParam?>>

<?$APPLICATION->IncludeFile('/bitrix/templates/.default/components/bitrix/sale.basket.basket.small/indigos_basket/basket_template.php');?>

<?$APPLICATION->IncludeFile('/inc_areas/indigos_TagManager.php');?>

<?$APPLICATION->ShowPanel();?>
    <div id="wrapper">
        <div class="menu-wrapper">
            <!-- Начало header-->
            <header class="header">
                <div class="wrapper">
                    <a href="/" class="header-logo">Индигос</a>
                    <?if(0):?>
                        <ul class="header-menu-list">
                            <li class="header-menu-item">
                                <a href="/" class="header-menu-item-link we-have <?if($isIndexPage):?>active<?endif?>" <?if($isIndexPage&&0):?>data-role="header-menu-item" data-target="section-we-have"<?endif?>>Рекомендации</a>
                            </li>
                            <?if(0)://hidden EK?>
                                <li class="header-menu-item">
                                    <a href="/soft.php#section-study" class="header-menu-item-link study" <?if($isSoftPage):?>data-role="header-menu-item" data-target="section-study"<?endif?>>Учеба</a>
                                </li>
                                <li class="header-menu-item">
                                    <a href="/soft.php#section-developing" class="header-menu-item-link developing" <?if($isSoftPage):?>data-role="header-menu-item" data-target="section-developing"<?endif?>>Развитие</a>
                                </li>
                                <li class="header-menu-item">
                                    <a href="/soft.php#section-entertainment" class="header-menu-item-link entertainment" <?if($isSoftPage):?>data-role="header-menu-item" data-target="section-entertainment"<?endif?>>Развлечение</a>
                                </li>
                            <?endif?>
                            <li class="header-menu-item">
                                <a href="/equipment/" class="header-menu-item-link more header-menu-double-line" ><span>Учебное оборудование</span></a>
                            </li>
                            <li class="header-menu-item">
                                <a href="/packages/" class="header-menu-item-link study">Комплексные решения</a>
                            </li>
                            <li class="header-menu-item">
                                <a href="<?= ($isSearchPage ? "#" : "/#section-search")?>" class="header-menu-item-link loupe" <?if($isIndexPage):?>data-role="header-menu-item" data-target="section-search"<?endif?>></a>
                            </li>
                        </ul>
                    <?endif?>
                    <?if(1)$APPLICATION->IncludeComponent("bitrix:menu","horizontal_multilevel",Array(
                            "ROOT_MENU_TYPE" => "top",
                            "MAX_LEVEL" => "6",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => ""
                        )
                    );?>

                    <div id="aside-right">
                        <aside class="cart">
                            <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "indigos_basket", Array(
                                    "PATH_TO_BASKET" => "/personal/basket.php",
                                    "PATH_TO_ORDER" => "/personal/order.php",
                                    "SHOW_DELAY" => "Y",
                                    "SHOW_NOTAVAIL" => "Y",
                                    "SHOW_SUBSCRIBE" => "Y"
                                )
                            );?>
                        </aside>

                        <aside class="member-area">
                            <div class="widget-panel">
                                <?if($USER->IsAuthorized()):?>
                                    <ul class="signed-area">
                                        <li class="user-pic">
                                            <a id="userNameHeader" class="user-header-link" href="/personal/">
                                            <span class="inner-image-wrap">
                                                <span class="image-clipper"></span>
                                            </span>
                                                <span class="js-user-email"><?=$USER->GetFirstName()?></span>
                                            </a>
                                        </li>
                                        <li><a href="/personal/login.php?logout=yes" class="aside-right_exit"></a></li>
                                    </ul>
                                <?else:?>
                                    <div class="unsigned-area">
                                        <a class="user-pic" href="/personal/login.php">
                                            <span class="inner-image-wrap">
                                                <span class="image-clipper"></span>
                                            </span>
                                            <span class="js-user-email">Войти</span>
                                        </a>
                                    </div>
                                <?endif?>
                            </div>
                        </aside>

                    </div>
                </div>
            </header>
            <!-- Конец header-->

            <div class="submenu-wrapper">

                    <!-- Начало блока со строкой поиска-->
                    <section class="search-section">
                        <div class="white-bg-wrapper">
                            <div class="wrapper">
                                <div class="section-body">
                                    <form class="search-form" action="/search/">
                                        <input type="text" placeholder="Поиск" class="search-field" name="q">
                                        <button type="submit" class="btn-control search-btn">найти</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Конец блока со строкой поиска-->
            </div>

        </div>
