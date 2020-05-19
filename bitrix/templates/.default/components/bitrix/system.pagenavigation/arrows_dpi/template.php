<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$ClientID = 'navigation_'.$arResult['NavNum'];

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div id="pager" style="padding-bottom:30px; width: auto;">
<?
if($APPLICATION->GetCurDir() =='/equipment/')$strNavQueryString = $_SERVER["QUERY_STRING"]."::&amp;";
else  $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
if($arResult["bDescPageNumbering"] === true)
{
	// to show always first and last pages
	$arResult["nStartPage"] = $arResult["NavPageCount"];
	$arResult["nEndPage"] = 1;

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
	{
		$bPrevDisabled = false;
		if ($arResult["bSavePage"])
		{
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
		}
		else
		{
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1))
			{
				$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
			}
			else
			{
				$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
			}
		}
	}
	else
	{
		$bPrevDisabled = true;
	}
	
	$sNextHref = '';
	if ($arResult["NavPageNomer"] > 1)
	{
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
	}
	else
	{
		$bNextDisabled = true;
	}
	?>
		<div class="navigation-pages">
			<<?if(!$bPrevDisabled):?>a href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page"<?else:?>span<?endif?> class="navigation-button<?if($bPrevDisabled):?> navigation-disabled<?endif?>"><?if(!$bPrevDisabled):?><</a><?else:?></span><?endif?>
	<?
	$bFirst = true;
	$bPoints = false;
	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		if ($arResult["nStartPage"] <= 2 || $arResult["NavPageCount"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
		{

			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
				<span class="nav-current-page"><?=$NavRecordGroupPrint?></span>
			<?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
			<?endif;
			$bFirst = false;
			$bPoints = true;
		}
		else
		{
			if ($bPoints)
			{
				?>...<?
				$bPoints = false;
			}
		}
		$arResult["nStartPage"]--;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
	?>
	<<?if (!$bNextDisabled):?>a href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page"<?else:?>span<?endif?> class="navigation-button<?if($bNextDisabled):?> navigation-disabled<?endif?>"><?if (!$bNextDisabled):?>></a><?else:?></span><?endif?>
	<?
}
else
{
	// to show always first and last pages
	$arResult["nStartPage"] = 1;
	$arResult["nEndPage"] = $arResult["NavPageCount"];

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] > 1)
	{
		$bPrevDisabled = false;
		
		if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2)
		{
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
		}
		else
		{
			$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
		}
	}
	else
	{
		$bPrevDisabled = true;
	}

	$sNextHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
	{
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
	}
	else
	{
		$bNextDisabled = true;
	}
	?>
		<ul class="middle-ul">
            <?
            if(!$bPrevDisabled)
            {
            ?>
                <li class="all">
                    <a href="<?=$sPrevHref?>" id="<?=$ClientID?>_previous_page"><</a>
                </li>
		    <?
            }

		$bFirst = true;
		$bPoints = false;
		do
		{
			if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
			{
				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <li class="curent"><?=$arResult["nStartPage"]?></li>
				<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                    <li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li>
				<?else:?>
					<li>
                        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
                    </li>
				<?endif;
				$bFirst = false;
				$bPoints = true;
			}
			else
			{
				if ($bPoints)
				{
					?>
                    <li class="doted">...</li>
                    <?
					$bPoints = false;
				}
			}
			$arResult["nStartPage"]++;
		} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
		?>
        <?
        if (!$bNextDisabled)
        {
        ?>
            <li class="naxt">
                <a href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page">></a>
            </li>
		<?
        }
}

if ($arResult["bShowAll"]):
	if ($arResult["NavShowAll"]):
		?>
            <li class="all">
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a>
            </li>
        <?
	else:
		?>
        <li class="all">
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a>
        </li>
        <?
	endif;
endif;
?>
	</ul> <!-- //navigation-pages-->
</div>
<?CJSCore::Init();?>
<script type="text/javascript">
    BX.bind(document, "keydown", function (event) {

        event = event || window.event;
        if (!event.ctrlKey)
            return;

        var target = event.target || event.srcElement;
        if (target && target.nodeName && (target.nodeName.toUpperCase() == "INPUT" || target.nodeName.toUpperCase() == "TEXTAREA"))
            return;

        var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
        if (!key)
            return;

        var link = null;
        if (key == 39)
            link = BX('<?=$ClientID?>_next_page');
        else if (key == 37)
            link = BX('<?=$ClientID?>_previous_page');

        if (link && link.href)
            document.location = link.href;
    });
</script>