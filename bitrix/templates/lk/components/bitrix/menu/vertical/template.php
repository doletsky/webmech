<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <h5>
        <?if(isset($_REQUEST["course"])):?>Есть курс:
        <?else:?>Нет курса:
        <?endif;?>
    </h5>
<?
foreach($arResult as $arItem):
?>
    <div class="col-md-12">
        <?if($arItem["SELECTED"]):?>
            <a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a>
        <?else:?>
            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        <?endif?>
    </div>
<?endforeach?>

<?endif?>
