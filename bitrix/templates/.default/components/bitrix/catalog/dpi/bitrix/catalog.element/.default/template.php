<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-element">
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
		<?if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])):?>
			<td width="0%" valign="top">
				<?if(is_array($arResult["DETAIL_PICTURE"])):?>
					<img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
				<?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
					<img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
				<?endif?>
				<?if(count($arResult["MORE_PHOTO"])>0):?>
					<br /><a href="#more_photo"><?=GetMessage("CATALOG_MORE_PHOTO")?></a>
				<?endif;?>
			</td>
		<?endif;?>
			<td width="100%" valign="top">
                <div class="item-to-order">

                                <form id="item_btn_submit_<?echo $arResult["ID"]?>" class="button-submit" action="<?echo $arParams["BASKET_URL"]?>" method="post" enctype="multipart/form-data">
                                    <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                                        <input type="hidden" name="ITEM_PROPERTY[]" value="<?=$arProperty["NAME"]?>: <?
                                            if(is_array($arProperty["DISPLAY_VALUE"])):
                                                echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
                                            else:
                                                echo $arProperty["DISPLAY_VALUE"];?>
                                            <?endif?>">
                                    <?endforeach?>
                                    <input type="hidden" name="ITEM_NAME" value="<?echo $arResult["NAME"]?>">
                                    <input type="hidden" name="ITEM_LINK" value="<?=$arResult["DETAIL_PAGE_URL"]?>">
                                    <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                                    <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
                                    <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
                                    <button onclick="javascript:$('#item_btn_submit_<?echo $arResult["ID"]?>').submit();" class="button btn-buy">
                                        <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arResult["PRICES"]['BASE']["VALUE"]?> <span>руб.</span></span>
                                    </button>
                                </form>

                </div>
                <?if($arResult["DETAIL_TEXT"]):?>
                    <br /><?=$arResult["DETAIL_TEXT"]?><br />
                <?elseif($arResult["PREVIEW_TEXT"]):?>
                    <br /><?=$arResult["PREVIEW_TEXT"]?><br />
                <?endif;?>
				<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<?=$arProperty["NAME"]?>:<b>&nbsp;<?
					if(is_array($arProperty["DISPLAY_VALUE"])):
						echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
					elseif($pid=="MANUAL"):
						?><a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a><?
					else:
						echo $arProperty["DISPLAY_VALUE"];?>
					<?endif?></b><br />
				<?endforeach?>
			</td>
		</tr>
	</table>

		<br />

	<?if(count($arResult["LINKED_ELEMENTS"])>0):?>
		<br /><b><?=$arResult["LINKED_ELEMENTS"][0]["IBLOCK_NAME"]?>:</b>
		<ul>
	<?foreach($arResult["LINKED_ELEMENTS"] as $arElement):?>
		<li><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></li>
	<?endforeach;?>
		</ul>
	<?endif?>
	<?
	// additional photos
	$LINE_ELEMENT_COUNT = 2; // number of elements in a row
	if(count($arResult["MORE_PHOTO"])>0):?>
		<a name="more_photo"></a>
		<?foreach($arResult["MORE_PHOTO"] as $PHOTO):?>
			<img border="0" src="<?=$PHOTO["SRC"]?>" width="<?=$PHOTO["WIDTH"]?>" height="<?=$PHOTO["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" /><br />
		<?endforeach?>
	<?endif?>
	<?if(is_array($arResult["SECTION"])):?>
		<br /><a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=GetMessage("CATALOG_BACK")?></a>
	<?endif?>
</div>
