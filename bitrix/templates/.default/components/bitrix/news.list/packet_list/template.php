<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?$arCurItem = false;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="height: 220px;">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="130" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" style="visibility: visible;">
                </a>
            </div>
        <?else:?>
            <?
            if ($arItem['PROPERTIES']['SUBJECT']['VALUE'][0] == '17603')
            {
                $link = '/images/default_pack/math.png';
            }
            elseif ($arItem['PROPERTIES']['SUBJECT']['VALUE'][0] == '17615')
            {
                $link = '/images/default_pack/read.png';
            }
            elseif ($arItem['PROPERTIES']['SUBJECT']['VALUE'][0] == '17627')
            {
                $link = '/images/default_pack/en.png';
            }
            elseif ($arItem['PROPERTIES']['SUBJECT']['VALUE'][0] == '17602')
            {
                $link = '/images/default_pack/rus.png';
            }
            ?>
            <div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img src="<?=$link?>" width="130" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="visibility: visible;">
                </a>
            </div>
        <?endif;?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
            <div style="margin-left: 150px; margin-top: -190px;">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
                    <?=$arItem["NAME"]?>
                </a>
            </div>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
            <div style="margin-left: 150px;">
			    <?echo $arItem["PREVIEW_TEXT"];?>
            </div>
		<?endif;?>
        <?
        $arPrice = CPrice::GetBasePrice($arItem['ID']);
        ?>
        <div style="margin-left: 150px;">
            <?=$arPrice['PRICE']?> руб.
        </div>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
