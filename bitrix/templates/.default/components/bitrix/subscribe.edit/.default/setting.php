<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form action="/payonline/download.php" method="post" id='subscribe'>
<?echo bitrix_sessid_post();?>
<input type="hidden" name="EMAIL" value="<?=$_GET['email']?>"/> <?//ToDo?>
<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
	<input type="checkbox" name="RUB_ID[]" value="<?=$itemValue["ID"]?>" checked style="display:none;"/>
<?endforeach;?>
<input type="radio" name="FORMAT" value="html" checked style="display:none;"/>
<input type="submit" name="Save" value="<?echo ($arResult["ID"] > 0? GetMessage("subscr_upd"):GetMessage("subscr_add"))?>" style="display:none;"/>
<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
<?if($_REQUEST["register"] == "YES"):?>
	<input type="hidden" name="register" value="YES" />
<?endif;?>
<?if($_REQUEST["authorize"]=="YES"):?>
	<input type="hidden" name="authorize" value="YES" />
<?endif;?>
</form>