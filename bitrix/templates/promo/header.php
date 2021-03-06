<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width, intial-scale=1, max-scale=1">

    <link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/skin-default.css" rel="stylesheet" type="text/css">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/devicons.css" rel="stylesheet" type="text/css">

    <title>Курс онлайн. Как обучиться высокооплачиваемой профессии веб-разработчика и начать зарабатывать.</title>

    <style id="fit-vids-style">.fluid-width-video-wrapper {
            width: 100%;
            position: relative;
            padding: 0;
        }

        .fluid-width-video-wrapper iframe, .fluid-width-video-wrapper object, .fluid-width-video-wrapper embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }</style>
    <?$APPLICATION->ShowHead();?>
</head>
<body class="device-lg">
<div id="scroll-progress" style="width: 0%;"><span class="scroll-percent">0%</span></div>

<div id="loading-progress" class="hide-it">
    <a class="logo" href="" style="opacity: 0;">
        <img src="images/logo-header.png" data-logo-alt="images/logo-header-alt.png" alt="">
    </a>
    <div class="lp-content" style="opacity: 0;">
        <div class="lp-counter">
            Loading
            <div id="lp-counter">100%</div>
        </div>
        <div class="lp-bar">
            <div id="lp-bar" style="width: 100%;"></div>
        </div>
    </div>
</div>

<div id="full-container">

    <header id="header" class="style-1 anim-moveleft text-white" data-scroll-index="0" data-opacity-value="1"
            style="opacity: 0;">
        <div id="header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="logo-header" href="" style="position: relative;width: 270px;height: 70px;">
                            <span class="pull-right">АНТИШКОЛА</span>
                            <h3><span class="colored" style="position: absolute;line-height: 22px;letter-spacing: 7px;font-size: 90%;top: 10px;">САМ&nbspСЕБЕ<div style="letter-spacing: normal">УНИВЕРСИТЕТ</div></span></h3>

                        </a>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "sect", //Показывать включаемую область для раздела
                                "AREA_FILE_SUFFIX" => "promo_menu", //Суффикс имени файла включаемой области
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "",
                                "AREA_FILE_RECURSIVE" => "N" //Рекурсивное подключение включаемых областей разделов
                            ),
                            false
                        );?>

                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="mobile-menu" class="ss-container">
                                <div class="ss-scroll" style="right: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>