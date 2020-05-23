<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
    <h3><span class="colored">Занятие <?=$arResult["NAME"]?></span></h3>
<?endif;?>
<?if($arResult['PREMISSION']==1):?>
<div id="jp_container_1" class="jp-video " role="application" aria-label="media player">
    <div class="jp-type-single">
        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    </div>
</div>

<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
 	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
 	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):?>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			<br />
	<?endforeach;?>
    <div style="cursor: pointer" data-src="<?=$arResult["DISPLAY_PROPERTIES"]["MEDIA"]["FILE_VALUE"]["SRC"]?>"
         onclick='$(function() {
                 $("#jp_container_1").css("display","block");
                  $("#jp_container_1").jPlayer( {
                    ready: function () {
                    $(this).jPlayer("setMedia", {
                    m4v: "HTTP://<?=$_SERVER["SERVER_NAME"].$arResult["DISPLAY_PROPERTIES"]["MEDIA"]["FILE_VALUE"]["SRC"]?>"
                    }).jPlayer("play");
                    $("video").attr("controls","true");
                    },
                    supplied: "m4v",
                    swfPath: "/promo/js"
                 });
                  });'>Play video</div>
<!--	--><?//foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
<!---->
<!--		--><?//=$arProperty["NAME"]?><!--:&nbsp;-->
<!--		--><?//if(is_array($arProperty["DISPLAY_VALUE"])):?>
<!--			--><?//=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
<!--		--><?//else:?>
<!--			--><?//=$arProperty["DISPLAY_VALUE"];?>
<!--		--><?//endif?>
<!--		<br />-->
<!--	--><?//endforeach;?>
	<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>
<?else:?>
Доступ запрещен, обратитесь к администратору.
<?endif?>