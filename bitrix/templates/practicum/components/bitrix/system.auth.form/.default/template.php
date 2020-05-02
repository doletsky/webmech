<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult["SHOW_ERRORS"]=="Y"):?>
<pre><?print_r($arResult["ERROR_MESSAGE"]["MESSAGE"])?></pre>
<?endif?>

                        <form id="login_form" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
                            <input type="hidden" name="AUTH_FORM" value="Y" />
                            <input type="hidden" name="TYPE" value="AUTH" />
                            <input type="text" name="USER_LOGIN" placeholder="Логин" required="required"><br><br>
                            <input type="password" name="USER_PASSWORD" placeholder="Пароль" required="required"><br><br>
                            <input class="feedback_button btn colorful" type="button" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" id="btn_form" onclick="$('#login_form').submit();">
                        </form>
                        <a href="<?=$arParams["FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
