<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--<?print_r($arResult)?>-->
    <div class="navbar navbar-dark d-block bg-dark text-white position-fixed h-100 align-self-start w-sidebar shadow-sm p-0 pt-2 pb-4 text-uppercase" id="sidebar">
        <button data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-brand my-1 mr-3 float-right p-0 d-inline-block d-lg-none btn btn-link">
            <span class="h4 align-middle mb-0"><span class="lnr lnr-menu"></span></span>
        </button>
        <div class="nav flex-column text-truncate">
    <?foreach($arResult as $arItem):?>
            <a href="<?echo $arItem['LINK']?>" class="nav-link <?if ($arItem["SELECTED"]):?>selected<?endif;?>"><i class="<?echo $arItem['PARAMS']['class']?>"></i> <?echo $arItem['TEXT']?></a>
    <?endforeach;?>
        </div>
    </div>
<?if (!empty($arResult)&&0):?>
<ul id="vertical-multilevel-menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="root-item">
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>