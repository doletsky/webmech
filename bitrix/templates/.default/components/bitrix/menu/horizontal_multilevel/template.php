<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<?
//массив имен классов от старого меню разноцветного подчеркивания
$arColorClass=array(
    "we-have",
    "study",
    "developing",
    "entertainment"
);

?>
<?if (!empty($arResult)):?>
<ul id="header-menu-list" class="header-menu-list">

<?
$previousLevel = 0;
$cntCC=0;
foreach($arResult as $arItem):
$addAtr="";
if($APPLICATION->GetCurPage()=='/soft.php'&&substr_count($arItem["LINK"], "#section")>0){
    $addAtr='data-role="header-menu-item" data-target="'.substr($arItem["LINK"], strpos($arItem["LINK"], "#")+1).'"';
}

$active='';
if(1==$arItem["SELECTED"]){
    $active=' active';
    $APPLICATION->AddChainItem($arItem["TEXT"],$arItem["LINK"]);
}
?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li  class="header-menu-item"><a class="header-menu-item-link <?=$arColorClass[$cntCC]?><?=$active?>" href="<?=$arItem["LINK"]?>" onmouseover="showSubmenu(this);return false;"><?=$arItem["TEXT"]?></a>
				<ul class="dhl<?=$arItem["DEPTH_LEVEL"]?>">
                <?$cntCC++;?>
		<?else:?>
			<li  class="header-menu-item"><a class="header-menu-item-link" href="<?=$arItem["LINK"]?>" onmouseover="showSubmenu(this);return false;"><?=$arItem["TEXT"]?></a>
				<ul class="dhl<?=$arItem["DEPTH_LEVEL"]?>">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li  class="header-menu-item"><a class="header-menu-item-link  <?=$arColorClass[$cntCC]?><?=$active?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?$cntCC++;?>
			<?else:?>
				<li  class="header-menu-item"><a class="header-menu-item-link" href="<?=$arItem["LINK"]?>" <?=$addAtr?> ><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li  class="header-menu-item"><a class="header-menu-item-link" href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li  class="header-menu-item"><a class="header-menu-item-link" href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?
endforeach;
?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
                    <li class="header-menu-item">
                        <a class="header-menu-item-link loupe" href="<?= ($isSearchPage ? "#" : "/#section-search")?>" data-role="header-menu-item" data-target="section-search"></a>
                    </li>
</ul>

<?endif?>
