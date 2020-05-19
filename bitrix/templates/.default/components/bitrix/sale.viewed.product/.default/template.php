<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (count($arResult) > 0):?>
    <div class="additional_box">
        <div class="additional_h">Недавно просмотренное</div>
        <ul class="additional_ul">
            <?foreach($arResult as $arItem):?>
                <li class="additional_li unit_li">
                    <div class="unit_in clearfix fix_height">
                        <div class="unit_img">
                            <?
                            if ($arItem['IS_PACKET'])
                            {
                            ?>
                                <img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" style="max-width:100px; max-height:100px; height:auto; width:auto;">
                            <?
                            }
                            else
                            {
                            ?>
                                <img src="<?=$arItem['IMG']?>" style="max-width:100px; max-height:100px; height:auto; width:auto;">
                            <?
                            }
                            ?>
                        </div>
                        <div class="unit_desc">
                            <div class="unit_h">
                                <a href="/products/<?=$arItem['CID']?>/" target="_blank"><?=$arItem["NAME"]?></a>
                            </div>
                            <div class="unit_type"><?=$arItem['TYPE']?></div>
                        </div>
                    </div>
                    <div class="unit_footer">
                        <div class="unit_price"><?=$arItem["PRICE_FORMATED"]?></div>
                        <?$APPLICATION->IncludeComponent('indigos:sale.order.add2basket', '', array('PRODUCT_ID' => $arItem['PRODUCT_ID']))?>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
<?endif;?>