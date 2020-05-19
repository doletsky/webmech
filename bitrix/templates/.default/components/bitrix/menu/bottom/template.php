<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult))
	return;
?>
<div id="ftop">
    <div class="w1000">
        <nav>
            <?foreach($arResult as $itemIdex => $arItem):?>
                <?if ($arItem["DEPTH_LEVEL"] == "1"):?>
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                <?endif?>
            <?endforeach;?>
        </nav>
    </div>
</div>