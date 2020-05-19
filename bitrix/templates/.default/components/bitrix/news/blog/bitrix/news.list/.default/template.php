<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
include($_SERVER['DOCUMENT_ROOT'].'/blog/menu_section.php');
?>

            <div class="blog_top">
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "s1"
                    )
                );?>
                <div class="blog_top_catigory">
                    <div class="blog_top_catigory_label">Блоги INDIGOS:</div>
                    <ul>
                        <?
                        foreach($aMenuLinksExt as $item):
                            $class="";
                            if(substr_count($_SERVER['REQUEST_URI'],$item[1]))$class='class="current"';
                            ?>
                            <li><a <?=$class?> href="<?=$item[1]?>"><?=$item[0]?></a></li>
                        <?endforeach?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="blog_content_items">
   <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="blog_content_items_item">
                    <div class="blog_content_items_item_leftbox">
                        <div class="blog_content_items_item_leftbox_text" onclick="location.href='<?=$arItem['FIELDS']['SECTION_URL']?>';" style="cursor: pointer;"><?=$arItem['FIELDS']['SECTION_NAME']?></div>
                        <div class="blog_content_items_item_leftbox_pic">
                            <div class="blog_content_items_item_leftbox_pic_wrapper"></div>
                            <img class="blog_content_items_item_leftbox_pic_img" height="182" alt="" src="<?=(strlen($arItem["PREVIEW_PICTURE"]["SRC"])>0)?$arItem["PREVIEW_PICTURE"]["SRC"]:'/blog/images/blog/item_pic.png';?>"  style="margin:4px 0 0 3px">
                        </div>
                    </div>
                    <div class="blog_content_items_item_body">
                        <div class="blog_content_items_item_body_label" onclick="location.href='<?=$arItem["DETAIL_PAGE_URL"]?>';" style="cursor: pointer;"><?echo $arItem["NAME"]?></div>
                        <div class="blog_content_items_item_body_text"><?echo $arItem["PREVIEW_TEXT"];?></div>
                    </div>
					<div class="blog_content_items_item_bottom">
						<div class="blog_content_items_item_bottom_date"><?=$arItem['FIELDS']['DATA']?></div>
						<div class="blog_content_items_item_bottom_comments">комментариев: <span><?=($arItem['PROPERTIES']['FORUM_MESSAGE_CNT']['VALUE']<=0)?0:$arItem['PROPERTIES']['FORUM_MESSAGE_CNT']['VALUE']?></span></div>
						<div class="blog_content_items_item_bottom_link"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">ЧИТАТЬ ДАЛЕЕЕ</a></div>
					</div>
                    <div class="clear"></div>
                </div>
   <?endforeach?>
            </div>
<?=$arResult["NAV_STRING"]?><br />





<?if(0):?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" /></a>
			<?else:?>
				<img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br />
		<?endforeach;?>
	</p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
<?endif?>