<?
if (count($arResult) > 0)
{
    CModule::IncludeModule('iblock');

    foreach ($arResult as $id => $item)
    {
        if ($item['IBLOCK_ID'] == 11)
        {
            $arResult[ $id ]['IS_PACKET'] = true;
        }
        else
        {
            $arItem = CIBlockElement::GetList(
                array(),
                array(
                    'IBLOCK_ID' => $item['IBLOCK_ID'],
                    'ID' => $item['PRODUCT_ID']
                ),
                false,
                false,
                array('ID', 'PROPERTY_CID', 'PROPERTY_ED_TYPE.NAME')
            )->Fetch();

            $arResult[ $id ]['IMG'] = LINK_PREVIEW . $arItem['PROPERTY_CID_VALUE'] . '_logo-s.png';
            $arResult[ $id ]['TYPE'] = $arItem['PROPERTY_ED_TYPE_NAME'];
            $arResult[ $id ]['IS_PACKET'] = false;
            $arResult[ $id ]['CID'] = $arItem['PROPERTY_CID_VALUE'];
        }
    }
}
?>