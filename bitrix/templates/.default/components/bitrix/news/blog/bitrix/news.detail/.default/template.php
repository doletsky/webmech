<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
include($_SERVER['DOCUMENT_ROOT'].'/blog/menu_section.php');
?>
            <div class="blog_top">
<!--                <a class="blog_top_back" href="/blog/">Вернуться к блогам</a>-->
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "s1"
                    )
                );?>
                <div class="blog_top_catigory">
                    <div class="blog_top_catigory_label">Блоги INDIGOS:</div>
                    <ul>
                        <?
                        foreach($aMenuLinksExt as $item):
                            $class="";
                            if(substr_count($_SERVER['REQUEST_URI'],$item[1]))$class='class="current"';
                            ?>
                            <li><a <?=$class?> href="<?=$item[1]?>"><?=$item[0]?></a></li>
                        <?endforeach?>
                    </ul>                    
                    <div class="clear"></div>
                </div>
            </div>
                    <div class="blog_post_date"><?=$arResult['FIELDS']['DATA']?></div>
                    <div class="blog_post_label"><?=$arResult["NAME"]?></div>
                    <?if((strlen($arResult["DETAIL_PICTURE"]["SRC"])>0)):?>
                       <div class="blog_post_picbox">
                        <div class="blog_post_picbox_leftgradient"></div>
                        <div class="blog_post_picbox_rightgradient"></div>
                        <img alt="" width="668" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
                       </div>
                    <?endif?>
                    <div class="blog_post_textbox"><?=$arResult["DETAIL_TEXT"]?></div>






