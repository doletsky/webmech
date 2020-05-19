<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
$arNotify = unserialize($notifyOption);
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="bookshelf">
<ul>
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
	<li class="" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
			<?
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
			?>
			<h4><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="item_title" title="<?=$arElement["NAME"]?>">
				<span><?=$arElement["NAME"]?><span class="white_shadow"></span></span>
			</a></h4>
			<?if(!empty($arElement["PREVIEW_TEXT"])):?>
				<p><?=$arElement["PREVIEW_TEXT"]?></p>
			<?endif;?>
			<?if(!empty($arElement['BOOKS'])):?>
				<hr/>
				<ul>
				<?foreach($arElement['BOOKS'] as $book):?>
					<li style="display:inline-block; width:200px;position:relative;"><img style="display:block; margin-right:10px; width:160px;" src="<?=$book["PREVIEW_PICTURE"]["SRC"]?>" /><a href="<?=$book["DETAIL_PAGE_URL"]?>"><?=$book["NAME"]?></a> <span style="color:red;"><?=$book["CATALOG_PRICE_1"]?></span></li>
					<!-- <hr style="clear:both;" /> -->
				<?endforeach;?>
				</ul>
			<?endif;?>
			<div class="buy">
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
						<?if($arPrice["CAN_ACCESS"]):?>
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
				<?/*
					<?if($arElement["CAN_BUY"]):?>
						<a href="<?echo $arElement["ADD_URL"]?>" rel="nofollow" class="bt3 addtoCart" onclick="return addToCart(this, 'list', '<?=GetMessage("CATALOG_IN_CART")?>', 'noCart');" id="catalog_add2cart_link_<?=$arElement['ID']?>"><?=GetMessage("CATALOG_BUY")?></a>
					<?elseif ( $arNotify[SITE_ID]['use'] == 'Y'):?>
						<?if ($USER->IsAuthorized()):?>
							<noindex><a href="<?echo $arElement["SUBSCRIBE_URL"]?>" rel="nofollow" class="subscribe_link" onclick="return addToSubscribe(this, '<?=GetMessage("CATALOG_IN_SUBSCRIBE")?>');" id="catalog_add2cart_link_<?=$arElement['ID']?>"><?echo GetMessage("CATALOG_SUBSCRIBE")?></a></noindex>
						<?else:?>
							<noindex><a href="javascript:void(0)" rel="nofollow" class="subscribe_link" onclick="showAuthForSubscribe(this, <?=$arElement['ID']?>, '<?echo $arElement["SUBSCRIBE_URL"]?>')" id="catalog_add2cart_link_<?=$arElement['ID']?>"><?echo GetMessage("CATALOG_SUBSCRIBE")?></a></noindex>
						<?endif;?>
<?endif; */
				}
				?>
			</div>
		<div class="tlistitem_shadow"></div>
		<?if(!(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])) && !$arElement["CAN_BUY"]
			|| is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"]) && $arElement["ALL_SKU_NOT_AVAILABLE"]):?>
		<div class="badge notavailable"><?=GetMessage("CATALOG_NOT_AVAILABLE2")?></div>
		<?endif?>
	</li>
	<?endforeach; ?>
</ul>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>