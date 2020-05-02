<?if(substr_count($APPLICATION->GetCurDir(),'/lk/') && !$USER->IsAuthorized()) LocalRedirect('/');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title><?$APPLICATION->ShowTitle()?></title>
<meta http-equiv="Content-Type" content="text/xml; charset=windows-1251" />
<link href="/promo/css/style.css" rel="stylesheet" type="text/css" />
<link href="/promo/css/style_lk.css" rel="stylesheet" type="text/css" />
    <link href="/promo/css/jquery.jscrollpane.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/promo/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/promo/js/jquery.jplayer.min.js"></script>
    <script type="text/javascript" src="/promo/js/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="/promo/js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="/promo/js/lk.js"></script>

<?$APPLICATION->ShowHead();?>
</head>

<body>
<?
if ($USER->IsAdmin() && $_GET["panel"]==1)$APPLICATION->ShowPanel();
?>
<div class="section-content mfp-wrap">
    <div class="container lk-students">
        <div class="row">
            <div class="col-md-2">
                <a class="logo-header" style="position: relative;width: 270px;height: 70px;">
                    <span class="pull-right">АНТИШКОЛА</span>
                    <h3><span class="colored" style="position: absolute;line-height: 22px;letter-spacing: 7px;font-size: 90%;top: 10px;">САМ&nbspСЕБЕ<div style="letter-spacing: normal">УНИВЕРСИТЕТ</div></span></h3>
                    <div class="clearfix"></div>
                    <hr>
                </a>
            </div>
            <div class="col-lg-9">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "",
                    Array(
                        "ROOT_MENU_TYPE" => "top",
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
                <h4><span class="colored"><?$APPLICATION->ShowTitle()?></span></h4>
            </div>
        </div>
        <div class="row lk-students-body">
            <div class="col-md-2">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "vertical",
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

            </div>

