 <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$counter = 0;
?>
<form id="filter-form" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="filter-form">
    <?foreach($arResult["ITEMS"] as $arItem):
    ?>

        <?
        $counter++;
        $needHide = false;
        $type = "";
        if ($arItem['CODE'] == 'SUBJECT')
        {
            $type = ' subjects';
            $needHide = true;
        }
        elseif ($arItem['CODE'] == 'CLASS' || $arItem['CODE'] == 'YEAR')
        {
            $type = ' grade';
        }
        elseif ($arItem['CODE'] == 'FORMAT')
        {
            $type = ' structure';
        }
        ?>
        <?
        if ($counter == 4)
        {
            echo '<div class="hidden-filters">';
        }
        ?>
        <?php if($arItem["PROPERTY_TYPE"] == "N" || isset($arItem["PRICE"])):?>
            <dl class="filter-type<?=$type?>">
                <?php echo $arItem["NAME"]; ?>
                <dt class="filter-type-title"><?=$arItem["NAME"]?></dt>
                <dd class="filter-type-content" id='<?=$arItem['CODE']?>'>
                    <?php if ($arItem['CODE'] == "SCREEN_IDS"): ?>
                        <li class="filter-type-item">
                            <label>
                                <input
                                    type="radio"
                                    name="SCREEN_IDS_YNM"
                                    id="SCREEN_IDS_Y"
                                    value="1"
                                    data-value="1"
                                    onclick="$('#<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>').val('1'); $('#<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>').val(''); smartFilter.click(this)"
                                    <?php if ($arItem["VALUES"]["MIN"]["HTML_VALUE"] && !($arItem["VALUES"]["MAX"]["HTML_VALUE"])) :?>checked="checked"<?php endif ?>
                                />
                                <span class="filter-type-name ">Есть</span>
                            </label>
                        </li>
                        <li class="filter-type-item">
                            <label>
                                <input
                                    type="radio"
                                    name="SCREEN_IDS_YNM"
                                    id="SCREEN_IDS_M"
                                    value=""
                                    data-value=""
                                    onclick="$('#<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>').val(''); $('#<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>').val(''); smartFilter.click(this)"
                                    <?php if (!($arItem["VALUES"]["MIN"]["HTML_VALUE"] && !($arItem["VALUES"]["MAX"]["HTML_VALUE"]))) :?>checked="checked"<?php endif ?>
                                />
                                <span class="filter-type-name ">Не важно</span>
                            </label>
                        </li>
                        <div style="display: none;">
                    <?php endif ?>
                        <input
                            class="price-field"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                            size="5"
                            maxlength="5"
                            onkeyup="smartFilter.keyup(this)"
                        />
                        <span class="dash-wrap">&mdash;</span>
                        <input
                            class="price-field"
                            type="text"
                            name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
                            value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                            size="5"
                            maxlength="5"
                            onkeyup="smartFilter.keyup(this)"
                        />
                    <?php if ($arItem['CODE'] == "SCREEN_IDS"): ?>
                        </div>
                    <?php endif ?>
                </dd>
            </dl>
			<?elseif(!empty($arItem["VALUES"])):;?>
            <?
            $counterItems = 0;
            $maxShow = 100000;
            if ($arItem['CODE'] == 'SUBJECT')
            {
                $maxShow = 5;
            }
            ?>
            <dl class="filter-type<?=$type?><?=($arItem['CODE'] =="YEAR") ? ' year': ''?>" style="<?=($arItem['CODE'] == 'ITEM_TYPE') ? 'display:none;' : ''?>">
                <dt class="filter-type-title"><?=$arItem["NAME"]?></dt>
                <dd class="filter-type-content" id='<?=$arItem['CODE']?>'>
                    <ul class="filter-type-list">
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <?if ($arItem['CODE'] == 'CLASS')
                            {
                                $tmp = explode(' ', $ar['VALUE']);
                                $ar['VALUE'] = $tmp[0];
                            }?>
                            <?
                            if ($ar['VALUE'] == '')
                            {
                                continue;
                            }
                            $counterItems++;
                            if ($counterItems == 6 && $needHide)
                            {
                                echo '</ul>';
                                echo '<ul class="filter-type-list hidden-list">';
                            }
                            ?>
                            <li class="filter-type-item">
                                <label>
                                    <input
                                        type="checkbox"
                                        value="<?echo $ar["HTML_VALUE"]?>"
                                        name="<?echo $ar["CONTROL_NAME"]?>"
                                        id="<?echo $ar["CONTROL_ID"]?>"
                                        <?echo $ar["CHECKED"]? 'checked="checked"': ''?>

                                        <?php
                                            $arValue = $ar["VALUE"];
                                            $patterns = array();
                                            $patterns[0] = '/ мес./';
                                            $patterns[1] = '/ года/';
                                            $patterns[2] = '/ год\b/';
                                            $patterns[3] = '/ лет/';
                                            $arValueRdy = preg_replace($patterns, '', $arValue);
                                        ?>

                                        data-value="<? echo $arValueRdy;?>"
                                        onclick="smartFilter.click(this)"
                                    />
                                    <?
                                    $adClass = '';
                                    if ($ar['VALUE'] == 'Текст')
                                    {
                                        $adClass = 'text';
                                    }
                                    elseif ($ar['VALUE'] == 'Видео')
                                    {
                                        $adClass = 'video';
                                    }
                                    elseif ($ar['VALUE'] == 'Аудио')
                                    {
                                        $adClass = 'audio';
                                    }
                                    elseif ($ar['VALUE'] == 'Программа')
                                    {
                                        $adClass = 'programm';
                                    }
                                    ?>
                                    <span class="filter-type-name <?=$adClass?>"><?echo $ar["VALUE"];?></span>
                                </label>
                            </li>
                        <?endforeach;?>
                        <?php if ($arItem['CODE'] == 'CLASS'): ?>
                            <li class="filter-type-item">
                                <label>
                                    <input
                                        type="checkbox"
                                        value="1"
                                        data-value=""
                                        onclick=""
                                        class="filter-smart-hider-checkbox"
                                        rel=".filter-type.grade.year"
                                        />
                                    <span class="filter-type-name" >Дошкольник</span>
                                </label>
                            </li>
                        <?php endif ?>
                        <?
                        if ($counterItems > 5 && $needHide)
                        {
                        ?>
                            </ul>
                            <div class="more-wrap">
                                <a href="#" class="more-link show-link" data-target="hidden-list">
                                    <span class="symbol-icon">+</span><span class="more-text">Еще предметы (<span><?=$counterItems - 5?></span>)</span>
                                </a>
                                <a href="#" class="more-link hide-link" data-target="hidden-list">
                                    <span class="symbol-icon">-</span><span class="more-text">Свернуть</span>
                                </a>
                            </div>
                        <?
                        }
                        ?>
                    </ul>
                </dd>
            </dl>
			<?endif;?>
		<?endforeach;?>
    <?
    if ($counter > 3)
    {
        echo '</div>';
    }
    ?>

    <a href="/" class="filter-switcher show-link" data-target="hidden-filters"><span>Дополнительные<br>фильтры</span></a>
    <a href="/" class="filter-switcher hide-link" data-target="hidden-filters"><span>Свернуть</span></a>

    <div class="bx_filter_popup_result right" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
        <?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
        <span class="arrow"></span>
        <a href="<?echo $arResult["FILTER_URL"]?>#filter-tabs" id="js-smart-filter-apply-button" onclick="return scrollToTabWorkAround($(this));"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
    </div>
    <input type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" style="display:none;"/>
</form>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>');
</script>