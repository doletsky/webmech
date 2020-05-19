<?
$arNewResult = array();

foreach($arResult["ITEMS"] as $arItem)
{
    $arReview = array();
    $arReview['ID'] = $arItem['ID'];
    $arReview['EDIT_LINK'] = $arItem['EDIT_LINK'];
    $arReview['DELETE_LINK'] = $arItem['DELETE_LINK'];
    $arReview['IBLOCK_ID'] = $arItem['IBLOCK_ID'];

    $arReview['NAME'] = $arItem['PROPERTIES']['FIO']['VALUE'];
    $arReview['IMAGE'] = $arItem['PREVIEW_PICTURE']['SRC'];
    $arReview['FOR'] = $arItem['PROPERTIES']['DETAIL_FOR']['VALUE'];
    if (!empty($arItem['PROPERTIES']['DETAIL_CLASS']['VALUE']))
    {
        $arClass = CIBlockElement::GetList(array(), array('ID' => $arItem['PROPERTIES']['DETAIL_CLASS']['VALUE']), false, false, array('ID', 'NAME'))->Fetch();
        $arReview['CLASS'] = $arClass['NAME'];
    }
    else
    {
        $arReview['CLASS'] = false;
    }
    $arReview['ADRESS'] = $arItem['PROPERTIES']['DETAIL_ADRESS']['VALUE'];
    $arReview['PREVIEW_TEXT'] = $arItem['PREVIEW_TEXT'];
    $arReview['DETAIL_TEXT'] = $arItem['DETAIL_TEXT'];

    if (!empty($arItem['PROPERTIES']['DETAIL_ITEMS']['VALUE']))
    {
        $dbItems = CIBlockElement::GetList(array(), array('ID' => $arItem['PROPERTIES']['DETAIL_ITEMS']['VALUE']), false, false, array('ID', 'NAME', 'PROPERTY_CONTENT_TYPE', 'IBLOCK_CODE'));

        while ($arReviewItem = $dbItems->Fetch())
        {
            $arTmp = array();
            $arTmp['ID'] = $arReviewItem['ID'];
            $arTmp['NAME'] = $arReviewItem['NAME'];
            $arTmp['TYPE'] = $arReviewItem['PROPERTY_CONTENT_TYPE_VALUE'];
            $arTmp['IS_PACKET'] = ($arReviewItem['IBLOCK_CODE'] === 'bookshelf');
            $arReview['ITEMS'][] = $arTmp;
        }
    }
    else
    {
        $arReview['ITEMS'] = false;
    }

    $arNewResult[] = $arReview;
}

$arResult = $arNewResult;
?>