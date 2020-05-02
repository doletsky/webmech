<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <header class="major">
        <h2>
            <?if(isset($_REQUEST["course"])):?>Список занятий:
            <?else:?>Список курсов:
            <?endif;?>
        </h2>
    </header>

    <ul>
        <?
        foreach($arResult as $arItem):
            ?>
            <li>
                <?if($arItem["SELECTED"]):?>
                    <a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a>
                <?else:?>
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                <?endif?>
            </li>
        <?endforeach;?>
    </ul>
<?endif?>
