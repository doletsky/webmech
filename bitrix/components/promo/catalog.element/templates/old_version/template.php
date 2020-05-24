<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <section id="banner" class="rounded-bottom" data-scroll-index="0">
        <div class="banner-parallax">
            <div class="bg-element" data-stellar-background-ratio="0.2"
                 style="background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>); background-position: 50% 0%;"></div>
            <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <div class="overlay-colored" data-bg-color="#000" data-bg-color-opacity="0.3"
                 style="background-color: rgba(0, 0, 0, 0.3);"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="banner-center-box text-white">
                                <h1 class="anim-movebottom-seq" data-opacity-value="1" style="opacity: 0;">
                                    <?
                                        $arName=explode(" ",trim($arResult["NAME"]));
                                        $arGreen=explode(", ",$arResult["PROPERTIES"]["GREEN_WORDS"]["VALUE"]);
                                        $arOrange=explode(", ",$arResult["PROPERTIES"]["ORANGE_WORDS"]["VALUE"]);
                                        foreach($arGreen as $numWordG){$arName[$numWordG-1]='<span class="colored">'.$arName[$numWordG-1].'</span>';}
                                        foreach($arOrange as $numWordO){$arName[$numWordO-1]='<span style="color: #eb5600">'.$arName[$numWordO-1].'</span>';}
                                        $strName=implode(" ",$arName);
                                    ?>
                                    <?=$strName;?>
                                </h1>
                                <div class="description anim-movebottom-seq" data-opacity-value="0.7"
                                     style="opacity: 0;">
                                    <?=$arResult["PREVIEW_TEXT"];?>
                                </div><br>
                                <div class="hm-content">
                                    <a class="header-btn scroll-to btn small colorful hover-white" href="#table-send">Записаться сейчас</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator-bottom"></div>
        </div>
    </section>
    <section id="content">
    <div id="content-wrap">
    <div id="fun-facts" class="flat-section" data-scroll-index="1">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Что даст курс?</h2>
                            <p>
                                <?
                                $arBold=explode(", ",$arResult["PROPERTIES"]["BOLD_DETAIL_WORDS"]["VALUE"]);
                                $arStrDetail=explode(PHP_EOL,trim($arResult["DETAIL_TEXT"]));
                                $corr=1;
                                foreach($arStrDetail as $key=>$strD){
                                    $arDetail=explode(" ",trim($strD));
                                    foreach($arDetail as $wNum=>$wDetail){
                                        if(in_array($wNum+$corr,$arBold)){
                                            $arDetail[$wNum]='<b>'.trim($arDetail[$wNum]).'</b>';
                                        }
                                    }
                                    $corr+=count($arDetail);
                                    $arStrDetail[$key]=implode(" ",$arDetail);
                                }
                                $strDetail=implode('<br>',$arStrDetail);
                                ?>
                                <?=$strDetail?>
                            </p>
                        </div>
                    </div>

                    <?if(strlen($arResult["PROPERTIES"]["IT_FOR"]["VALUE"])>0):?>
                    <div id="prima-video" class="flat-section">
                        <div class="section-content" style="padding: 40px 0;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="section-title text-center">
                                            <h2>Для кого этот курс.</h2>
                                            <p>30 секунд о том, что ценного в этом курсе и кому он может быть полезен.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="video-preview">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?endif?>

                    <?if(is_array($arResult["PROPERTIES"]["NUMS"]["VALUE"])&&!empty($arResult["PROPERTIES"]["NUMS"]["VALUE"])):?>
                    <div class="col-md-12">

                        <div class="fun-facts-boxes">
                            <?
                            foreach($arResult["PROPERTIES"]["NUMS"]["VALUE"] as $nums):
                                $arNum=explode("_",$nums);
                                ?>
                            <div class="box-counter anim-movebottom-seq text-center" data-opacity-value="1" style="opacity: 0; transform: translate(0px, 30px);">
                                <div class="bc-content">
                                    <h1>
                                        <span class="counter-stats">
                                            <?
                                            $c=0;
                                            do{
                                                if($c>0) echo "</span>";
                                            ?>
                                                <span class="digit">
                                                    <span class="digit-value"><?=$arNum[0]{$c}?></span>
                                                    <div class="counter-animator" data-value="<?=$arNum[0]{$c}?>">
                                                        <ul>
                                                            <li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
                                                        </ul>
                                                    </div>
                                            <?$c++;}
                                            while(is_numeric($arNum[0]{$c}))?>
                                                </span>
                                                <div class="main"><?=substr($arNum[0],0,$c);?></div><?=substr($arNum[0],$c);?>
                                        </span>
                                    </h1>
                                    <h5><?=$arNum[1]?></h5>
                                </div>
                            </div>
                            <?endforeach?>
                        </div>
                    </div>
                <?endif?>
                </div>
            </div>
        </div>
    </div>

    <div id="service-features" class="parallax-section" data-scroll-index="1" data-parallax-bg-img="img-37.jpg"
         data-stellar-background-ratio="0.2"
         style="background-image: url(<?=$arResul['DETAIL_PICTURE']['SRC']?>); background-position: 50% 50%;">
        <div class="overlay-colored" data-bg-color="#000" data-bg-color-opacity="0.4"
             style="background-color: rgba(0, 0, 0, 0.4);"></div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <?$col_cnt=0;?>
                    <?foreach($arResult["PROPERTIES"]["BENEFITS"]["ADV"] as $benefit):$col_cnt++;?>
                    <div class="col-md-4">
                        <div class="box-info box-info-1 text-white mb-md-50 anim-scaledown-seq"
                             data-opacity-value="1" style="opacity: 0; transform: scale(0.8, 0.8);">
                            <div class="box-icon icon x2 colorful-icon mr-20"><i class="<?=$benefit['ICON_CLASS']['VALUE']?>"></i>
                            </div>
                            <div class="box-content">
                                <h4 class="capitalized"><?=$benefit["NAME"]?></h4>
                                <p>
                                    <?=$benefit["PREVIEW_TEXT"]?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?if($col_cnt==3) echo "</div><div class='row'>";?>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </div>
<?if(strlen($arResult["PROPERTIES"]["METHOD"]["VALUE"])>0):?>
    <div id="watch-video" class="flat-section">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Методика курса</h2>
                            <p>
                                35 секунд о методике и результатах курса.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="video-preview">
                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endif?>
    <div id="clients-testmonials-plan" class="flat-section" data-scroll-index="2">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>План обучения</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testmonials-slider">
                            <div class="slide">
                                <div class="testmonial-single-2">
                                    <?foreach($arResult["PROPERTIES"]["PLAN"]["ADV"] as $mdl):?>
                                    <div class="quote-sign colored"><?=preg_replace("/\. /", ". <span style='color: #eb5600'>", $mdl["NAME"],1);?></span></div>
                                    <div class="ts-content">
                                        <?=str_replace("Результат модуля:", "<span class='colored'>Результат модуля:</span>", $mdl["PREVIEW_TEXT"]);?><br>
                                    </div>
                                    <?endforeach?>
                                    <br><br>
                                    <?
                                    $bon_cnt=0;
                                    foreach($arResult["PROPERTIES"]["BONUS"]["ADV"] as $bonus):
                                        $bon_cnt++;
                                        ?>
                                    <div class="quote-sign" style="color: #eb5600">
                                        Бонус <?=$bon_cnt?>.<br>
                                        <span class="colored"><?=$bonus["NAME"]?></span>
                                    </div>
                                    <div class="ts-content">
                                        <?=$bonus["PREVIEW_TEXT"]?>
                                        <br>
                                    </div>
                                    <?endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?if(strlen($arResult["PROPERTIES"]["ADD"]["VALUE"])>0):?>
    <div id="watch-video" class="flat-section">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Watch Our Video</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                Ipsum has
                                <br>
                                been standard dummy text ever since the 1500s
                            </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="video-preview">
                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endif?>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor",
        ".default",
        array(
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "ELEMENT_ID" => $arResult["ID"],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "BASKET_URL" => $arParams["BASKET_URL"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "PROP_BRAND" => $arResult["PROPERTIES"]["BRANDS"]["VALUE"],
            "PROP_BONUS" => $arResult["PROPERTIES"]["BONUS"]["ADV"],
            "PRICE"     =>  $arResult["CATALOG_PRICE_1"]
        ),
        $component,
        array("HIDE_ICONS" => "Y")
    );?>


    </div>
    </section>
<?if(0):?>
<div class="catalog-element">
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
		<?if(is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"])):?>
			<td width="0%" valign="top">
				<?if(is_array($arResult["PREVIEW_PICTURE"]) && is_array($arResult["DETAIL_PICTURE"])):?>
					<img
						border="0"
						src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
						id="image_<?=$arResult["PREVIEW_PICTURE"]["ID"]?>"
						style="display:block;cursor:pointer;cursor: hand;"
						OnClick="document.getElementById('image_<?=$arResult["PREVIEW_PICTURE"]["ID"]?>').style.display='none';document.getElementById('image_<?=$arResult["DETAIL_PICTURE"]["ID"]?>').style.display='block'"
						/>
					<img
						border="0"
						src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
						width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
						height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
						title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
						id="image_<?=$arResult["DETAIL_PICTURE"]["ID"]?>"
						style="display:none;cursor:pointer;cursor: hand;"
						OnClick="document.getElementById('image_<?=$arResult["DETAIL_PICTURE"]["ID"]?>').style.display='none';document.getElementById('image_<?=$arResult["PREVIEW_PICTURE"]["ID"]?>').style.display='block'"
						/>
				<?elseif(is_array($arResult["DETAIL_PICTURE"])):?>
					<img
						border="0"
						src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
						width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
						height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
						title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
						/>
				<?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
					<img
						border="0"
						src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				<?endif?>
				<?if(count($arResult["MORE_PHOTO"])>0):?>
					<br /><a href="#more_photo"><?=GetMessage("CATALOG_MORE_PHOTO")?></a>
				<?endif;?>
			</td>
		<?endif;?>
			<td width="100%" valign="top">
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
	<?if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])):?>
		<?foreach($arResult["OFFERS"] as $arOffer):?>
			<?foreach($arParams["OFFERS_FIELD_CODE"] as $field_code):?>
				<small><?echo GetMessage("IBLOCK_FIELD_".$field_code)?>:&nbsp;<?
						echo $arOffer[$field_code];?></small><br />
			<?endforeach;?>
			<?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
				<small><?=$arProperty["NAME"]?>:&nbsp;<?
					if(is_array($arProperty["DISPLAY_VALUE"]))
						echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
					else
						echo $arProperty["DISPLAY_VALUE"];?></small><br />
			<?endforeach?>
			<?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
				<?if($arPrice["CAN_ACCESS"]):?>
					<p><?=$arResult["CAT_PRICES"][$code]["TITLE"];?>:&nbsp;&nbsp;
					<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
						<s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
					<?else:?>
						<span class="catalog-price"><?=$arPrice["PRINT_VALUE"]?></span>
					<?endif?>
					</p>
				<?endif;?>
			<?endforeach;?>
			<p>
			<?if($arParams["DISPLAY_COMPARE"]):?>
				<noindex>
				<a href="<?echo $arOffer["COMPARE_URL"]?>" rel="nofollow"><?echo GetMessage("CT_BCE_CATALOG_COMPARE")?></a>&nbsp;
				</noindex>
			<?endif?>
			<?if($arOffer["CAN_BUY"]):?>
				<?if($arParams["USE_PRODUCT_QUANTITY"]):?>
					<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
					<table border="0" cellspacing="0" cellpadding="2">
						<tr valign="top">
							<td><?echo GetMessage("CT_BCE_QUANTITY")?>:</td>
							<td>
								<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" size="5">
							</td>
						</tr>
					</table>
					<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
					<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arOffer["ID"]?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CT_BCE_CATALOG_ADD")?>">
					</form>
				<?else:?>
					<noindex>
					<a href="<?echo $arOffer["BUY_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_BUY")?></a>
					&nbsp;<a href="<?echo $arOffer["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CT_BCE_CATALOG_ADD")?></a>
					</noindex>
				<?endif;?>
			<?elseif(count($arResult["CAT_PRICES"]) > 0):?>
				<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
				<?$APPLICATION->IncludeComponent("bitrix:sale.notice.product", ".default", array(
					"NOTIFY_ID" => $arOffer['ID'],
					"NOTIFY_URL" => htmlspecialcharsback($arOffer["SUBSCRIBE_URL"]),
					"NOTIFY_USE_CAPTHA" => "N"
					),
					$component
				);?>
			<?endif?>
			</p>
		<?endforeach;?>
	<?else:?>
		<?foreach($arResult["PRICES"] as $code=>$arPrice):?>
			<?if($arPrice["CAN_ACCESS"]):?>
				<p><?=$arResult["CAT_PRICES"][$code]["TITLE"];?>&nbsp;
				<?if($arParams["PRICE_VAT_SHOW_VALUE"] && ($arPrice["VATRATE_VALUE"] > 0)):?>
					<?if($arParams["PRICE_VAT_INCLUDE"]):?>
						(<?echo GetMessage("CATALOG_PRICE_VAT")?>)
					<?else:?>
						(<?echo GetMessage("CATALOG_PRICE_NOVAT")?>)
					<?endif?>
				<?endif;?>:&nbsp;
				<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
					<s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
					<?if($arParams["PRICE_VAT_SHOW_VALUE"]):?><br />
						<?=GetMessage("CATALOG_VAT")?>:&nbsp;&nbsp;<span class="catalog-vat catalog-price"><?=$arPrice["DISCOUNT_VATRATE_VALUE"] > 0 ? $arPrice["PRINT_DISCOUNT_VATRATE_VALUE"] : GetMessage("CATALOG_NO_VAT")?></span>
					<?endif;?>
				<?else:?>
					<span class="catalog-price"><?=$arPrice["PRINT_VALUE"]?></span>
					<?if($arParams["PRICE_VAT_SHOW_VALUE"]):?><br />
						<?=GetMessage("CATALOG_VAT")?>:&nbsp;&nbsp;<span class="catalog-vat catalog-price"><?=$arPrice["VATRATE_VALUE"] > 0 ? $arPrice["PRINT_VATRATE_VALUE"] : GetMessage("CATALOG_NO_VAT")?></span>
					<?endif;?>
				<?endif?>
				</p>
			<?endif;?>
		<?endforeach;?>
		<?if(is_array($arResult["PRICE_MATRIX"])):?>
			<table cellpadding="0" cellspacing="0" border="0" width="100%" class="data-table">
			<thead>
			<tr>
				<?if(count($arResult["PRICE_MATRIX"]["ROWS"]) >= 1 && ($arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)):?>
					<td><?= GetMessage("CATALOG_QUANTITY") ?></td>
				<?endif;?>
				<?foreach($arResult["PRICE_MATRIX"]["COLS"] as $typeID => $arType):?>
					<td><?= $arType["NAME_LANG"] ?></td>
				<?endforeach?>
			</tr>
			</thead>
			<?foreach ($arResult["PRICE_MATRIX"]["ROWS"] as $ind => $arQuantity):?>
			<tr>
				<?if(count($arResult["PRICE_MATRIX"]["ROWS"]) > 1 || count($arResult["PRICE_MATRIX"]["ROWS"]) == 1 && ($arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arResult["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)):?>
					<th nowrap>
						<?if(IntVal($arQuantity["QUANTITY_FROM"]) > 0 && IntVal($arQuantity["QUANTITY_TO"]) > 0)
							echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_FROM_TO")));
						elseif(IntVal($arQuantity["QUANTITY_FROM"]) > 0)
							echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], GetMessage("CATALOG_QUANTITY_FROM"));
						elseif(IntVal($arQuantity["QUANTITY_TO"]) > 0)
							echo str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_TO"));
						?>
					</th>
				<?endif;?>
				<?foreach($arResult["PRICE_MATRIX"]["COLS"] as $typeID => $arType):?>
					<td>
						<?if($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"] < $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"])
							echo '<s>'.FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]).'</s> <span class="catalog-price">'.FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"])."</span>";
						else
							echo '<span class="catalog-price">'.FormatCurrency($arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arResult["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"])."</span>";
						?>
					</td>
				<?endforeach?>
			</tr>
			<?endforeach?>
			</table>
			<?if($arParams["PRICE_VAT_SHOW_VALUE"]):?>
				<?if($arParams["PRICE_VAT_INCLUDE"]):?>
					<small><?=GetMessage('CATALOG_VAT_INCLUDED')?></small>
				<?else:?>
					<small><?=GetMessage('CATALOG_VAT_NOT_INCLUDED')?></small>
				<?endif?>
			<?endif;?><br />
		<?endif?>
		<?if($arResult["CAN_BUY"]):?>
			<?if($arParams["USE_PRODUCT_QUANTITY"] || count($arResult["PRODUCT_PROPERTIES"])):?>
				<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
				<table border="0" cellspacing="0" cellpadding="2">
				<?if($arParams["USE_PRODUCT_QUANTITY"]):?>
					<tr valign="top">
						<td><?echo GetMessage("CT_BCE_QUANTITY")?>:</td>
						<td>
							<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" size="5">
						</td>
					</tr>
				<?endif;?>
				<?foreach($arResult["PRODUCT_PROPERTIES"] as $pid => $product_property):?>
					<tr valign="top">
						<td><?echo $arResult["PROPERTIES"][$pid]["NAME"]?>:</td>
						<td>
						<?if(
							$arResult["PROPERTIES"][$pid]["PROPERTY_TYPE"] == "L"
							&& $arResult["PROPERTIES"][$pid]["LIST_TYPE"] == "C"
						):?>
							<?foreach($product_property["VALUES"] as $k => $v):?>
								<label><input type="radio" name="<?echo $arParams["PRODUCT_PROPS_VARIABLE"]?>[<?echo $pid?>]" value="<?echo $k?>" <?if($k == $product_property["SELECTED"]) echo '"checked"'?>><?echo $v?></label><br>
							<?endforeach;?>
						<?else:?>
							<select name="<?echo $arParams["PRODUCT_PROPS_VARIABLE"]?>[<?echo $pid?>]">
								<?foreach($product_property["VALUES"] as $k => $v):?>
									<option value="<?echo $k?>" <?if($k == $product_property["SELECTED"]) echo '"selected"'?>><?echo $v?></option>
								<?endforeach;?>
							</select>
						<?endif;?>
						</td>
					</tr>
				<?endforeach;?>
				</table>
				<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
				<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
				<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
				<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CATALOG_ADD_TO_BASKET")?>">
				</form>
			<?else:?>
				<noindex>
				<a href="<?echo $arResult["BUY_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_BUY")?></a>
				&nbsp;<a href="<?echo $arResult["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD_TO_BASKET")?></a>
				</noindex>
			<?endif;?>
		<?elseif((count($arResult["PRICES"]) > 0) || is_array($arResult["PRICE_MATRIX"])):?>
			<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
			<?$APPLICATION->IncludeComponent("bitrix:sale.notice.product", ".default", array(
				"NOTIFY_ID" => $arResult['ID'],
				"NOTIFY_URL" => htmlspecialcharsback($arResult["SUBSCRIBE_URL"]),
				"NOTIFY_USE_CAPTHA" => "N"
				),
				$component
			);?>
			
		<?endif?>
	<?endif?>
		<br />
	<?if($arResult["DETAIL_TEXT"]):?>
		<br /><?=$arResult["DETAIL_TEXT"]?><br />
	<?elseif($arResult["PREVIEW_TEXT"]):?>
		<br /><?=$arResult["PREVIEW_TEXT"]?><br />
	<?endif;?>
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
<?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor",
    ".default",
    array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_ID" => $arResult["ID"],
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    ),
    $component,
    array("HIDE_ICONS" => "Y")
);?>
<?endif?>
