<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

if($arResult["NavPageCount"] > 1)
{
    ?>
    <div class="blog_pag">
    <div class="blog_pag_wrap">
        <?
        if($arResult["bDescPageNumbering"] === true):
            $bFirst = true;
            if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if($arResult["bSavePage"]):
                    ?>

                    a<a class="blog_pag_wrap_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
                <?
                else:
                    if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
                        ?>
                        b<a class="blog_pag_wrap_right" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_prev")?></a>
                    <?
                    else:
                        ?>
                        c<a class="blog_pag_wrap_right" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
                    <?
                    endif;
                endif;
                ?>
                <?

                if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
                    $bFirst = false;
                    if($arResult["bSavePage"]):
                        ?>
                        d<a class="blog_pag_wrap_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
                    <?
                    else:
                        ?>
                        f<a class="blog_pag_wrap_page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?
                    endif;
                    ?>
                    <?
                    if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        g<a class="blog_pag_wrap_page separator" href="">...</a>
                    <?
                    endif;
                endif;
            endif;
            do
            {
                $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    h<span class="<?=($bFirst ? "blog-page-first " : "")?>blog-page-current"><?=$NavRecordGroupPrint?></span>
                <?
                elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                    ?>
                    i<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "blog-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>
                <?
                else:
                    ?>
                    j<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                    ?> class="<?=($bFirst ? "blog-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>

                <?
                endif;
                ?>
                <?

                $arResult["nStartPage"]--;
                $bFirst = false;
            } while($arResult["nStartPage"] >= $arResult["nEndPage"]);

            if ($arResult["NavPageNomer"] > 1):
                if ($arResult["nEndPage"] > 1):
                    if ($arResult["nEndPage"] > 2):
                        ?>
                        <span class="blog-page-dots">...</span>
                    <?
                    endif;
                    ?>
                    l<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
                <?
                endif;

                ?>
                m<a class="blog-page-next"href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_next")?></a>
            <?
            endif;

        else:
            $bFirst = true;

            if ($arResult["NavPageNomer"] > 1):
                if($arResult["bSavePage"]):
                    ?>
                    n<a class="blog-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
                <?
                else:
                    if ($arResult["NavPageNomer"] > 2):
                        ?>
                        <a class="blog_pag_wrap_left" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"></a>
                    <?
                    else:
                        ?>
                        <a class="blog_pag_wrap_left" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"></a>
                    <?
                    endif;

                endif;
                ?>
                <?

                if ($arResult["nStartPage"] > 1):
                    $bFirst = false;
                    if($arResult["bSavePage"]):
                        ?>
                        r<a class="blog-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
                    <?
                    else:
                        ?>
                        <a class="blog_pag_wrap_page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?
                    endif;
                    ?>
                    <?
                    if ($arResult["nStartPage"] > 2):
                        ?>
                        <span class="blog-page-dots">...</span>
                    <?
                    endif;
                endif;
            endif;

            do
            {
                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <span class="blog_pag_wrap_page current"><?=$arResult["nStartPage"]?></span>
                <?
                elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="blog_pag_wrap_page"><?=$arResult["nStartPage"]?></a>
                <?
                else:
                    ?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
                    ?>  class="blog_pag_wrap_page"><?=$arResult["nStartPage"]?></a>
                <?
                endif;
                ?>
                <?
                $arResult["nStartPage"]++;
                $bFirst = false;
            } while($arResult["nStartPage"] <= $arResult["nEndPage"]);

            if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
                if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
                    if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
                        ?>
                        <span class="blog-page-dots">...</span>
                    <?
                    endif;
                    ?>
                    <a class="blog_pag_wrap_page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
                <?
                endif;
                ?>
                <a class="blog_pag_wrap_right" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"></a>
            <?
            endif;
        endif;

        if ($arResult["bShowAll"]):
            if ($arResult["NavShowAll"]):
                ?>
                y<a class="blog-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a>
            <?
            else:
                ?>
                z<a class="blog-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a>
            <?
            endif;
        endif
        ?>
        </div>
    </div>
<?
}
?>
