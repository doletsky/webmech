<?php
?><pre><?print_r($_REQUEST)?></pre><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent("bitrix:forum.topic.reviews","chat",Array(
        "SHOW_LINK_TO_FORUM" => "N",
        "FILES_COUNT" => "2",
        "FORUM_ID" => "8",
        "IBLOCK_TYPE" => "supports",
        "IBLOCK_ID" => MAIN_IBLOCK_ID,
        "ELEMENT_ID" =>  COption::GetOptionInt("iblock", "main_eid_for_uid_".$USER->GetID()),
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
);