<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams, $arResult
 * @var CBitrixComponentTemplate $this
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
CUtil::InitJSCore(array('ajax', 'fx'));
// ************************* Input params***************************************************************
$arParams["SHOW_LINK_TO_FORUM"] = ($arParams["SHOW_LINK_TO_FORUM"] == "N" ? "N" : "Y");
$arParams["FILES_COUNT"] = intVal(intVal($arParams["FILES_COUNT"]) > 0 ? $arParams["FILES_COUNT"] : 1);
$arParams["IMAGE_SIZE"] = (intVal($arParams["IMAGE_SIZE"]) > 0 ? $arParams["IMAGE_SIZE"] : 100);
if (LANGUAGE_ID == 'ru'):
    $path = str_replace(array("\\", "//"), "/", dirname(__FILE__)."/ru/script.php");
    include($path);
endif;
// *************************/Input params***************************************************************
if (!empty($arResult["MESSAGES"])||1):
if ($arResult["NAV_RESULT"] && $arResult["NAV_RESULT"]->NavPageCount > 1):
?>
<div class="reviews-navigation-box reviews-navigation-top">
    <div class="reviews-page-navigation">
        <?=$arResult["NAV_STRING"]?>
    </div>
    <div class="reviews-clear-float"></div>
</div>
<?
endif;

?>
    <div class="blog_post_comments">
        <div class="blog_post_comments_label">Комментарии (<?=count($arResult["MESSAGES"])?>)</div>
        <?
        if(strlen($_COOKIE['Indigos_User_Email']))
            include(__DIR__ . "/form.php");
        ?>
        <div class="blog_post_comments_itemsbox">
            <?

            $iCount = 0;

            foreach ($arResult["MESSAGES"] as $res){

                $iCount++;

                if(strlen($res["POST_MESSAGE_TEXT"]) <= 335){
                    $commentClass = "little";
                } else {
                    $commentClass = "";
                }

                if(strlen($res["POST_MESSAGE_TEXT"]) > 335){

                    $shortText = substr($res["POST_MESSAGE_TEXT"], 0, 310);
                    $shortText .= "...";

                } 

                ?>
                <div class="blog_post_comments_itemsbox_item">
                    <div class="blog_post_comments_itemsbox_item_picbox">
                        <div class="blog_post_comments_itemsbox_item_picbox_pic">
                            <img alt="" src="/blog/images/blog/comment_user.png">
                        </div>
                    </div>
                    <div class="blog_post_comments_itemsbox_item_contnent close <? echo $commentClass; ?>">
                        <div class="blog_post_comments_itemsbox_item_contnent_label"><?=$res["AUTHOR_NAME"]?></div>
                        <div class="blog_post_comments_itemsbox_item_contnent_text">
                            <span class="short"><? echo $shortText; ?></span>
                            <span class="long"><?=$res["POST_MESSAGE_TEXT"]; ?></span>
                        </div >
                        <?if(strlen($res["POST_MESSAGE_TEXT"]) > 335):?>
                            <div class="blog_post_comments_itemsbox_item_contnent_button">
                                <a class="button" href="">
                                    <span>Показать</span>
                                    <img alt="" src="/blog/images/blog/point.png">
                                </a>
                            </div>
                        <?endif;?>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>

<?

if (strlen($arResult["NAV_STRING"]) > 0 && $arResult["NAV_RESULT"]->NavPageCount > 1):
?>
<div class="reviews-navigation-box reviews-navigation-bottom">
    <div class="reviews-page-navigation">
        <?=$arResult["NAV_STRING"]?>
    </div>
    <div class="reviews-clear-float"></div>
</div>
<?
endif;




endif;

