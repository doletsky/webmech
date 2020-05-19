<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
    <div class="search-result" style="padding-top: 20px;">
        <div class="w1000">
            <h2 class="search-result-title">Результаты поиска (<span><?=count($_SESSION['SEARCH'])?></span>)</h2>
            <div class="search-choice">
                <a href="javascript:navigate('prev');" class="nav-arr prev-arr" id="search_prev"></a>
                <ul class="choice-list">
                    <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
                        <?$arElement['NAME'] = str_replace('""', '"', Text::limit_words($arElement['NAME'], 8));?>
                        <li class="choice-item <?=$arElement['ID'] == $_SESSION['SELECTED_ID'] ? 'active' : ''?>">
                            <div class="choice-item-head">Выбрано
                                <span class="angle"></span>
                            </div>
                            <div class="choice-item-content">
                                <h6 class="choice-item-title"><?=$arElement['NAME']?></h6>
                                <?if(intval($arElement['PROPERTIES']['CID']['VALUE']) > 0):?>
                                    <a href="/books/<? echo $arElement['ID']; ?>/">
                                        <img src="<?=(LINK_PREVIEW . $arElement['PROPERTIES']['CID']['VALUE'] . '_logo-s.png')?>" class="choice-item-img" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>">
                                    </a>
                                <?endif?>
                                <div class="choice-item-price"><?=round($arElement['CATALOG_PRICE_1'])?>р.</div>
                            </div>
                        </li>
                    <?endforeach; ?>
                </ul>
                <a href="javascript:navigate('next');" class="nav-arr next-arr" id="search_next"></a>
            </div>
        </div>
    </div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<script type="text/javascript">
    $().ready(function(){
        if (!$("#navigation_1_next_page").length > 0)
        {
            $('#search_next').remove();
        }
        if (!$("#navigation_1_previous_page").length > 0)
        {
            $('#search_prev').remove();
        }
    });
    function navigate(type)
    {
        if (type == "next" && $('#navigation_1_next_page').length > 0)
        {
            window.location.href = $('#navigation_1_next_page').attr('href');
        }
        if (type == "prev" && $('#navigation_1_previous_page').length > 0)
        {
            window.location.href = $('#navigation_1_previous_page').attr('href');
        }
    }
</script>