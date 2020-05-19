<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$sBlog=1;//номер рассылки новостей блога
?>
<?=$arResult['MESS']?>
<form action="" class="blog_rightside_dist" method="post">
    <div class="blog_rightside_dist_label">Подпишитесь на рассылку INDIGOS</div>
	<input type="hidden" name="sf_RUB_ID" id="sf_RUB_ID_<?=$sBlog?>" value="<?=$sBlog?>" />

    <input class="blog_rightside_dist_input" type="text" name="sf_EMAIL" size="20" value="<?=$arResult["EMAIL"]?>" title="<?=GetMessage("subscr_form_email_title")?>" placeholder="email@domain.ru" />
	<input class="blog_rightside_dist_submit" type="submit" name="OK" value="подписаться" />
</form>

