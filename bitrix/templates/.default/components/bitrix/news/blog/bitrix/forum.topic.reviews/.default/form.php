<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//форма добавления комментариев ?>

<form class="blog" name="<?=$arParams["FORM_ID"] ?>" id="<?=$arParams["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>" method="POST" enctype="multipart/form-data" >
    <?if (!$USER->IsAuthorized()):?>
    <input name="REVIEW_AUTHOR" id="REVIEW_AUTHOR" type="hidden" value="<?if(strlen($_COOKIE['Indigos_User_FirstName'])) echo $_COOKIE['Indigos_User_FirstName']; else echo 'guest';?>" />
    <?endif?>
    <input type="hidden" name="index" value="<?=htmlspecialcharsbx($arParams["form_index"])?>" />
    <input type="hidden" name="back_page" value="<?=$arResult["CURRENT_PAGE"]?>" />
    <input type="hidden" name="ELEMENT_ID" value="<?=$arParams["ELEMENT_ID"]?>" />
    <input type="hidden" name="SECTION_ID" value="<?=$arResult["ELEMENT_REAL"]["IBLOCK_SECTION_ID"]?>" />
    <input type="hidden" name="save_product_review" value="Y" />
    <input type="hidden" name="preview_comment" value="N" />
    <?=bitrix_sessid_post()?>
    <?
    if ($arParams['AUTOSAVE'])
        $arParams['AUTOSAVE']->Init();
    ?>
    <input type="hidden" name="pageNumber" value="<?=intval($arResult['PAGE_NUMBER']);?>" />
    <input type="hidden" name="pageCount" value="<?=intval($arResult['PAGE_COUNT']);?>" />
    <input type="hidden" name="save" value="Y" />
    <textarea id="" name="REVIEW_TEXT" class="blog_post_comments_text" rows="25" style="font-family: Helvetica,Verdana,Arial,sans-serif; font-size: 16px; height: 170px; width: 672px;"></textarea>
    <input class="blog_post_comments_submit" type="button" onclick="$('#<?=$arParams["FORM_ID"]?>').submit();" value="Опубликовать" tabindex="<?=$tabIndex++;?>"  />
</form>


