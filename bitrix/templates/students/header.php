<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title><?=$APPLICATION->ShowTitle()?></title>
    <meta charset="windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/main.css" />
    <link href="<?=SITE_TEMPLATE_PATH?>/assets/css/style_lk.css" rel="stylesheet" type="text/css" />
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-chat">
    <div class="inner lk-students-chat">

        <? $APPLICATION->IncludeComponent("bitrix:forum.topic.reviews", "chat", Array(
                "SHOW_LINK_TO_FORUM" => "N",
                "FILES_COUNT" => "2",
                "FORUM_ID" => "8",
                "IBLOCK_TYPE" => "supports",
                "IBLOCK_ID" => MAIN_IBLOCK_ID,
                "ELEMENT_ID" => COption::GetOptionInt("iblock", "main_eid_for_uid_" . $USER->GetID()),
                "AJAX_POST" => "N",
                "POST_FIRST_MESSAGE" => "Y",
                "POST_FIRST_MESSAGE_TEMPLATE" => "#IMAGE#[url=#LINK#]#TITLE#[/url]#BODY#",
                "URL_TEMPLATES_READ" => "read.php?FID=#FID#&TID=#TID#",
                "URL_TEMPLATES_DETAIL" => "photo_detail.php?ID=#ELEMENT_ID#",
                "URL_TEMPLATES_PROFILE_VIEW" => "profile_view.php?UID=#UID#",
                "MESSAGES_PER_PAGE" => "1000000",
                "PAGE_NAVIGATION_TEMPLATE" => "",
                "DATE_TIME_FORMAT" => "d.m.Y H:i:s",
                "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
                "EDITOR_CODE_DEFAULT" => "Y",
                "SHOW_AVATAR" => "Y",
                "SHOW_RATING" => "Y",
                "RATING_TYPE" => "like",
                "SHOW_MINIMIZED" => "N",
                "USE_CAPTCHA" => "Y",
                "PREORDER" => "Y",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "0"
            )
        ); ?>

    </div>
</div>

<!-- Main -->
<div id="main">
    <div class="inner">



