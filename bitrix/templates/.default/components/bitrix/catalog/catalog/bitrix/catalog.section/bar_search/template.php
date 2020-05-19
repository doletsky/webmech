<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arParams['HIT_XMLID']['RECOMENDED'] ='cb8bbe26bd4211c75cc2579d5236cd1a';
$arParams['HIT_XMLID']['HIT'] = '05129e781d9fab67837d76c5ace9f42a';

$notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
$arNotify = unserialize($notifyOption);
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
    <div class="clear"></div>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<?
$close_cell = true;
$counter = 0;
?>

	<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
        <?
        if ($cell % 3 == 0)
        {
        ?>
            <div class="c-rows">
        <?
            $close_cell = false;
            $counter = 0;
        }
        $counter++;
        ?>
        <div class="row <?=($counter == 3) ? 'row-last' : ''?>" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
			<?
            if ($arElement['PROPERTIES']['HIT']['VALUE_XML_ID'] == $arParams['HIT_XMLID']['RECOMENDED'])
                echo '<div class="rek">Рекомендовано</div>';
            else if ($arElement['PROPERTIES']['HIT']['VALUE_XML_ID'] == $arParams['HIT_XMLID']['HIT'])
                echo '<div class="hit">ХИТ</div>';
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));

			$sticker = "";
			if (array_key_exists("PROPERTIES", $arElement) && is_array($arElement["PROPERTIES"]))
			{
				foreach (Array("SPECIALOFFER", "NEWPRODUCT", "SALELEADER") as $propertyCode)
					if (array_key_exists($propertyCode, $arElement["PROPERTIES"]) && intval($arElement["PROPERTIES"][$propertyCode]["PROPERTY_VALUE_ID"]) > 0)
					{
						$sticker .= "<div class=\"badge specialoffer\">".$arElement["PROPERTIES"][$propertyCode]["NAME"]."</div>";
						break;
					}
			}
			?>
			<?if($arParams["DISPLAY_COMPARE"]):?>
			<noindex>
				<?if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])):?>
				<span class="checkbox">
					<a href="javascript:void(0)" onclick="return showOfferPopup(this, 'list', '<?=GetMessage("CATALOG_IN_CART")?>', <?=CUtil::PhpToJsObject($arElement["SKU_ELEMENTS"])?>, <?=CUtil::PhpToJsObject($arElement["SKU_PROPERTIES"])?>, <?=CUtil::PhpToJsObject($arResult["POPUP_MESS"])?>, 'compare');" id="catalog_add2compare_link_<?=$arElement['ID']?>">
						<input type="checkbox" class="addtoCompareCheckbox"/><span class="checkbox_text"><?=GetMessage("CATALOG_COMPARE")?></span>
					</a>
				</span>
				<?else:?>
				<span class="checkbox">
					<a href="<?echo $arElement["COMPARE_URL"]?>" rel="nofollow" onclick="return addToCompare(this, 'list', '<?=GetMessage("CATALOG_IN_COMPARE")?>', '<?echo $arElement["DELETE_COMPARE_URL"]?>');" id="catalog_add2compare_link_<?=$arElement['ID']?>">
						<input type="checkbox" class="addtoCompareCheckbox"/><span class="checkbox_text"><?=GetMessage("CATALOG_COMPARE")?></span>
					</a>
				</span>
				<?endif?>
			</noindex>
			<?endif?>
			<?if(intval($arElement['PROPERTIES']['CID']['VALUE']) > 0):?>
                <div class="img">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                        <img src="<?=(LINK_PREVIEW . $arElement['PROPERTIES']['CID']['VALUE'] . '_logo-s.png')?>" width="130" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
                    </a>
                </div>
			<?else:?>
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><div class="no-photo-div-big" style="height:130px; width:130px;"></div></a>
			<?endif?>
            <?
            if ($arElement['ED_TYPE'] != '')
            {
            ?>
                <div class="razdel">
                    <a><?=$arElement['ED_TYPE']?></a>
                </div>
            <?
            }
            ?>
            <div class="titl"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>">
                <?
                if (strlen($arElement['NAME']) > 40)
                {
                    $arElement['NAME'] = str_replace('""', '"', Text::limit_words($arElement['NAME'], 8));
                }
                ?>
                <?=$arElement["NAME"]?>
            </a></div>
            <div class="card_bottom">
                <?if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"]))  // Product has offers
                {
                    if ($arElement["MIN_PRODUCT_OFFER_PRICE"] > 0):
                    ?>
                        <div class="price">
                        <span class="item_price"><?if (count($arElement["OFFERS"]) > 1) echo GetMessage("CATALOG_PRICE_FROM")?>
                        <?=$arElement["MIN_PRODUCT_OFFER_PRICE_PRINT"];?></span>
                        </div>
                    <?endif;?>
                    <a href="javascript:void(0)" class="buy_button bt3 addtoCart" id="catalog_add2cart_offer_link_<?=$arElement['ID']?>" onclick="return showOfferPopup(this, 'list', '<?=GetMessage("CATALOG_IN_CART")?>', <?=CUtil::PhpToJsObject($arElement["SKU_ELEMENTS"])?>, <?=CUtil::PhpToJsObject($arElement["SKU_PROPERTIES"])?>, <?=CUtil::PhpToJsObject($arResult["POPUP_MESS"])?>, 'cart');"><?echo GetMessage("CATALOG_BUY")?></a>
                    <?
                }
                else  // Product doesn't have offers
                {
                    $numPrices = count($arParams["PRICE_CODE"]);
                    foreach($arElement["PRICES"] as $code=>$arPrice):?>
                        <?if($arPrice["CAN_ACCESS"] && $arPrice["VALUE"]>0):?>
                            <div class="price">
                            <?if ($numPrices>1):?><p style="padding: 0; margin-bottom: 5px;"><?=$arResult["PRICES"][$code]["TITLE"];?>:</p><?endif?>
                            <?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                                <span  class="discount-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span><br>
                                <span class="old-price"><?=$arPrice["PRINT_VALUE"]?></span>
                            <?else:?>
                                <?=$arPrice["PRINT_VALUE"]?>
                            <?endif;?>
                            </div>
                        <?endif;?>
                    <?endforeach;?>

                    <?//if($arElement["CAN_BUY"]):?>
                        <div class="add-to-cart">
                            <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', '', array('PRODUCT_ID' => $arElement['ID']));?>
<!--                            <div class="form-submit" onclick="javascript:prepareForm(--><?//=$arElement['ID']?><!--)">Купить</div>-->
                        </div>
                    <?//endif;
                }
                ?>
        </div>
	</div>
    <?
    if ($counter == 3)
    {
    ?>
        </div>
    <?
        $close_cell = true;
    }
    ?>
	<?endforeach; ?>
<?
if (!$close_cell)
    echo '</div>';
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <div class="clear"></div>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>