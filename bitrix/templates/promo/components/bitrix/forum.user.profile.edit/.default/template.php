<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
if (!$this->__component->__parent || empty($this->__component->__parent->__name)):
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/forum/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/forum/templates/.default/themes/blue/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/forum/templates/.default/styles/additional.css');
endif;
$path = str_replace(array("\\", "//"), "/", dirname(__FILE__)."/interface.php");
include_once($path);
// *****************************************************************************************
if (!empty($arResult["ERROR_MESSAGE"])): 
?>
<div class="forum-note-box forum-note-error">
	<div class="forum-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"], "forum-note-error");?></div>
</div>
<?
endif;
if (!empty($arResult["OK_MESSAGE"])): 
?>
<div class="forum-note-box forum-note-success">
	<div class="forum-note-box-text"><?=ShowNote($arResult["OK_MESSAGE"], "forum-note-success")?></div>
</div>
<?
endif;
/*?>
<div class="forum-header-box">
	<div class="forum-header-options">
		<span class="forum-option-profile">
			<a href="<?=$arResult["profile_view"]?>"><?=GetMessage("F_PROFILE")?></a>
		</span>
	</div>
	<div class="forum-header-title"><span><?=GetMessage("F_CHANGE_PROFILE")?></span></div>
</div>
<?*/
?>
<form method="post" name="form1" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data" class="forum-form">
	<input type="hidden" name="PAGE_NAME" value="profile" />
	<input type="hidden" name="Update" value="Y" />
	<input type="hidden" name="UID" value="<?=$arParams["UID"]?>" />
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="ACTION" value="EDIT" />
    <input type="hidden" name="EMAIL" size="40" maxlength="50" value="<?=$arResult["str_EMAIL"]?>"/>
    <input type="hidden" name="LOGIN" size="30" maxlength="50" value="<?=$arResult["str_LOGIN"]?>"/><input type="hidden" name="OLD_LOGIN" value="<?=$arResult["str_LOGIN"]?>"/>

    <table>
        <?if($_REQUEST["tab"]=="reg" || !isset($_REQUEST["tab"])):?>
            <tr>
                <th><?=GetMessage("F_NAME")?></th>
                <td><input type="text" name="NAME" size="40" maxlength="50" value="<?=$arResult["str_NAME"]?>"/></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_LAST_NAME")?></th>
                <td><input type="text" name="LAST_NAME" size="40" maxlength="50" value="<?=$arResult["str_LAST_NAME"]?>"/></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_NEW_PASSWORD")?></th>
                <td><input type="password" name="NEW_PASSWORD" size="20" maxlength="50" value="<?=$arResult["NEW_PASSWORD"]?>" autocomplete="off" /></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_PASSWORD_CONFIRM")?></th>
                <td><input type="password" name="NEW_PASSWORD_CONFIRM" size="20" maxlength="50" value="<?=$arResult["NEW_PASSWORD_CONFIRM"]?>" autocomplete="off" /></td>
            </tr>
        <?elseif($_REQUEST["tab"]=="personal"):?>
            <tr>
                <th><?=GetMessage("F_PROFESSION")?></th>
                <td><input type="text" name="PERSONAL_PROFESSION" size="45" maxlength="255" value="<?=$arResult["str_PERSONAL_PROFESSION"]?>"/></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_WWW_PAGE")?></th>
                <td><input type="text" name="PERSONAL_WWW" size="45" maxlength="255" value="<?=$arResult["str_PERSONAL_WWW"]?>"/></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_BIRTHDATE")?> (<?=CLang::GetDateFormat("SHORT")?>):</th>
                <td><?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.calendar",
                    "",
                    array(
                        "SHOW_INPUT" => "Y",
                        "FORM_NAME" => "form1",
                        "INPUT_NAME" => "PERSONAL_BIRTHDAY",
                        "INPUT_VALUE" => $arResult["~str_PERSONAL_BIRTHDAY"]),
                    $component,
                    array("HIDE_ICONS" => "Y"));
                ?></th>
            </tr>
            <tr>
                <th><?=GetMessage("F_CITY")?></th>
                <td><input type="text" name="PERSONAL_CITY" size="45" maxlength="255" value="<?=$arResult["str_PERSONAL_CITY"]?>"/></td>
            </tr>
        <?elseif($_REQUEST["tab"]=="work"):?>
            <tr>
                <th><?=GetMessage("F_COMPANY_ROLE")?></th>
                <td><input type="text" name="WORK_POSITION" size="45" maxlength="255" value="<?=$arResult["str_WORK_POSITION"]?>"/></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_COMPANY_ACT")?></th>
                <td><textarea name="WORK_PROFILE" cols="35" rows="5"><?=$arResult["str_WORK_PROFILE"]?></textarea></td>
            </tr>
            <tr>
                <th><?=GetMessage("F_CITY")?></th>
                <td><input type="text" name="WORK_CITY" size="45" maxlength="255" value="<?=$arResult["str_WORK_CITY"]?>"/></td>
            </tr>
        <?endif;?>
    </table>
<div class="forum-clear-float"></div>
<div class="forum-reply-buttons forum-user-edit-buttons">
	<input type="submit" name="save" value="<?=GetMessage("F_SAVE")?>" id="save"/>&nbsp;
	<input type="submit" value="<?=GetMessage("F_CANCEL")?>" name="cancel" id="cancel" />
</div>

</form>
