<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="section-content" style='background: url("<?=$arResult["DETAIL_PICTURE"]["SRC"]?>") no-repeat scroll 50% 0 rgba(0, 0, 0, 0);'>
    <div class="white-bg-wrapper">
        <div class="wrapper">
            <h4><?=$arResult['DISPLAY_PROPERTIES']['ADD_TITLE']['VALUE']?></h4>
            <p><?echo $arResult["DETAIL_TEXT"];?></p>
        </div>
    </div>
</section>
