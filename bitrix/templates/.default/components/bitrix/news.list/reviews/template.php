<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="w1000">
    <div class="message_box_h info_box_h">Отзывы покупателей</div>

    <?
    foreach($arResult as $arItem)
    {
    ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="testimonial_page_item  clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="speaker_face"><img src="<?=$arItem['IMAGE']?>" alt="<?=$arItem['NAME']?>"></div>
            <div class="speaker_name">
                <div class="speaker_h"><?=$arItem['NAME']?></div>
                <div class="speaker_role">
                    <p><?=$arItem['FOR']?><b class="db_nl"><?=$arItem['CLASS']?></b></p>
                    <p><?=$arItem['ADRESS']?></p>
                </div>
            </div>
            <div class="speaker_text">
            <blockquote class="testimonial_text">
                <p><?=$arItem['PREVIEW_TEXT']?></p>
                <?
                if ($arItem['DETAIL_TEXT'] != '' || $arItem['ITEMS'])
                {
                ?>
                    <div class="pod_cut">
                        <?
                        if ($arItem['DETAIL_TEXT'] != '')
                        {
                        ?>
                            <p><?=$arItem['DETAIL_TEXT']?></p>
                        <?
                        }
                        ?>

                        <?
                        if ($arItem['ITEMS'])
                        {
                        ?>
                            <div class="testimonial_section">
                                <div class="testimonial_section_h">Приобретения</div>
                                <?
                                foreach ($arItem['ITEMS'] as $item)
                                {
                                ?>
                                    <div class="subject_head">
                                        <div class="sbj_title">
                                            <a href="/<?=$item['IS_PACKET'] ? 'bookshelf' : 'books'?>/<?=$item['ID']?>/" target="_blank"><?=$item['NAME']?></a>
                                        </div>
                                        <div class="sbj_type sbj_type_1"><?=$item['TYPE']?></div>
                                    </div>
                                <?
                                }
                                ?>
                            </div>
                        <?
                        }
                        ?>
                    </div>
                    <div class="testimonial_toggle">
                        <a href="" class="tt_show">Читать отзыв полностью</a>
                        <a href="" class="tt_hide">Свернуть отзыв</a>
                    </div>
                <?
                }
                ?>
            </blockquote>
        </div>
        </div>
    <?
    }
    ?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
    <div class="comment_write">
        <p> Если вы пользуетесь электронными учебными материалами и хотите рассказать о своем опыте, напишите нам <a href="mailto:ig@indigos.ru">ig@indigos.ru</a>.</p>
    </div>
</div>