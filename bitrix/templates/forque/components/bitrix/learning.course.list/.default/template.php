<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <div class="row mt-1">
<?foreach($arResult["COURSES"] as $arCourse):?>
        <div class="col-md-6 col-sm-6 pb-3 offset-md-2">
            <a class="card-link" href="<?=$arCourse["COURSE_DETAIL_URL"]?>" title="Читать">
            <div class="card shadow-sm d-block p-1 h-100">
                <div class="row h-100 no-gutters flex-md-nowrap">
                    <div class="col-md-4 col-sm-12 img_course" style="background-image: url('<?=$arCourse["PREVIEW_PICTURE_ARRAY"]["SRC"]?>')"></div>
                    <div class="col-md p-3 py-4 d-flex">
                        <h5><?echo $arCourse["NAME"]?></h5>
                    </div>
                </div>
            </div>
            </a>
        </div>
<?endforeach;?>
    </div>

<?if(0):?>
    <div class="row pt-3">
    <?foreach($arResult["COURSES"] as $arCourse):?>
        <div class="col-md-8 offset-md-2 pt-5">
            <span class="anchor" id="card_feature"></span>
            <a class="card-link" href="<?=$arCourse["COURSE_DETAIL_URL"]?>" title="Читать">
                <div class="card wow fadeIn shadow-sm flex-md-row">
                    <div
                            class="card-img-top card-img-top-300 card-zoom"
                            style="background-image: url('<?=$arCourse["PREVIEW_PICTURE_ARRAY"]["SRC"]?>')"
                    ></div>
                    <div class="card-body pt-4">
                        <h3 class="card-title"><?echo $arCourse["NAME"]?></h3>
                    </div>
                </div>
            </a>
        </div>
    <?endforeach;?>
</div>
<div style="float: left; padding-top: 2px;"><?=GetMessage("SEARCH_LABEL")?>&nbsp;</div><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => "search.php"
	),
	$component
);?>
<br />
<?if (!empty($arResult["COURSES"])):?>
<div class="learning-course-list">
	<?foreach($arResult["COURSES"] as $arCourse):?>
		<?if ($arCourse["PREVIEW_PICTURE_ARRAY"]!==false):?>
			<?echo ShowImage(
				$arCourse["PREVIEW_PICTURE_ARRAY"], 
				200, 
				200, 
				"hspace='6' vspace='6' align='left' border='0'"
					. ' alt="' . htmlspecialcharsbx($arCourse['PREVIEW_PICTURE_ARRAY']['DESCRIPTION']) . '"', 
				"", 
				true);?>
		<?endif;?>

		<a href="<?=$arCourse["COURSE_DETAIL_URL"]?>" target="_blank"><?=$arCourse["NAME"]?></a>
		<?if(strlen($arCourse["PREVIEW_TEXT"])>0):?>
			<br /><?=$arCourse["PREVIEW_TEXT"]?>
		<?endif?>
		<br clear="all"><br />
	<?endforeach;?>

</div>
	<?=$arResult["NAV_STRING"]?>
<?endif?>
<?endif?>