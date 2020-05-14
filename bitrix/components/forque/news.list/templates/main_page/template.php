<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="row pt-3">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="col-md-4">
        <span class="anchor" id="card_feature"></span>
        <a class="card-link" href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="Читать">
            <div class="card wow fadeIn shadow-sm">
                <div class="card-img-top card-img-top-300 card-zoom">
                    <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" class="mx-auto img-fluid rounded-top d-block">
                </div>
                <div class="card-body pt-4">
                    <h6 class="text-uppercase small"><?echo $arItem["DISPLAY_PROPERTIES"]["SUBTITLE"]["VALUE"]?></h6>
                    <h3 class="card-title"><?echo $arItem["NAME"]?></h3>
                </div>
            </div>
        </a>
    </div>
<?endforeach;?>
</div>
<?if(0):?>





<?endif;?>
<?if(0):?>
<div class="row pt-3">
    <div class="col-md-4">
        <span class="anchor" id="card_feature"></span>
        <div class="card wow fadeIn shadow-sm">
            <div class="card-img-top card-img-top-300 card-zoom">
                <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
            </div>
            <div class="card-body pt-4">
                <h6 class="text-uppercase small">Call to Action</h6>
                <h3 class="card-title">Not What You Expect</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <span class="anchor" id="card_feature"></span>
        <div class="card wow fadeIn shadow-sm">
            <div class="card-img-top card-img-top-300 card-zoom">
                <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
            </div>
            <div class="card-body pt-4">
                <h6 class="text-uppercase small">Call to Action</h6>
                <h3 class="card-title">Not What You Expect</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <span class="anchor" id="card_feature"></span>
        <div class="card wow fadeIn shadow-sm">
            <div class="card-img-top card-img-top-300 card-zoom">
                <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
            </div>
            <div class="card-body pt-4">
                <h6 class="text-uppercase small">Call to Action</h6>
                <h3 class="card-title">Not What You Expect</h3>
            </div>
        </div>
    </div>
</div>
<?endif;?>