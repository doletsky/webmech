<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
ShowMessage($arParams["~AUTH_RESULT"]);

?>
<form id="bform" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?
    if($_REQUEST["forgot_password"]=="yes") {
        echo $arResult["MESS_FORGOT"];
    }else {
	   echo GetMessage("AUTH_FORGOT_PASSWORD_1");
        }
        ?>
	</p>

<table class="data-table bx-forgotpass-table">
	<thead>
		<tr> 
			<td colspan="2"><b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b></td>
		</tr>
	</thead>
</table>
    <input type="text" name="USER_LOGIN" maxlength="50" placeholder="логин" />&nbsp;<?=GetMessage("AUTH_OR")?>
    <input type="text" name="USER_EMAIL" placeholder="email" maxlength="255" />
    <br><br>
    <input class="feedback_button btn colorful" type="button" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" onclick="$('#bform').submit();" />
<p>
<a href="/"><?=GetMessage("AUTH_AUTH")?></a>
</p> 
</form>
