<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
		<tr>
		<?endif;?>

		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%" id="<?=$this->GetEditAreaId($arElement['ID']);?>">

			<table cellpadding="0" cellspacing="2" border="0" width="100%">
				<tr>
					<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
						<td id="img" valign="top">
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="150" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a><br />
						</td>
					<?elseif(is_array($arElement["DETAIL_PICTURE"])):?>
						<td id="img" valign="top">
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="150" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a><br />
						</td>
					<?endif?>
					<td valign="top">
                        <div class="item-to-order">
                            <?if(is_array($arElement["PRICES"]['BASE'])):?>

                                    <form id="item_btn_submit_<?echo $arElement["ID"]?>" class="button-submit" action="<?echo $arParams["BASKET_URL"]?>" method="post" enctype="multipart/form-data">
                                        <?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                                            <input type="hidden" name="ITEM_PROPERTY[]" value="<?=$arProperty["NAME"]?>: <?
                                            if(is_array($arProperty["DISPLAY_VALUE"]))
                                                echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
                                            else
                                                echo $arProperty["DISPLAY_VALUE"];?>">
                                        <?endforeach?>
                                        <input type="hidden" name="ITEM_NAME" value="<?echo $arElement["NAME"]?>">
                                        <input type="hidden" name="ITEM_LINK" value="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                        <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                                        <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arElement["ID"]?>">
                                        <input class="button btn-buy" type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
                                        <button onclick="javascript:$('#item_btn_submit_<?echo $arElement["ID"]?>').submit();" class="button btn-buy">
                                            <span class="btn-text">КУПИТЬ</span><span class="btn-price"><?=$arElement["PRICES"]['BASE']["VALUE"]?> <span>руб.</span></span>
                                        </button>
                                    </form>

                            <?endif?>
                    </div>
                        <a class="item-name" href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a><br />
						<?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
							<?=$arProperty["NAME"]?>:&nbsp;<?
								if(is_array($arProperty["DISPLAY_VALUE"]))
									echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
								else
									echo $arProperty["DISPLAY_VALUE"];?><br />
						<?endforeach?>
						<br />

						<?=$arElement["PREVIEW_TEXT"]?>
					</td>
				</tr>
			</table>

			&nbsp;
		</td>

		<?$cell++;
		if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
			</tr>
		<?endif?>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
			<?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
				<td>&nbsp;</td>
			<?endwhile;?>
			</tr>
		<?endif?>

</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
