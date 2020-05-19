<? if ( ! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();
/**
 * Верхняя панель выбора
 */
function GetPackType($id)
{
    $arType = CIBlockElement::GetList(
        array(),
        array(
            'ACTIVE' => 'Y',
            'ID' => $id
        ),
        false,
        false,
        array('ID', 'NAME')
    )->Fetch();

    return $arType['NAME'];
}

//Получаю информацию по текущему элементу
$arCurElement = CIBlockElement::GetList(
    array(),
    array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => 11,
        'ID' => $arResult['ID']
    ),
    false,
    false,
    array(
        'ID',
        'PROPERTY_CLASS',
        'PROPERTY_SUBJECT',
        'PROPERTY_TYPE'
    )
)->Fetch();

//----Получаем класс----
$getClass = (int) $_GET['CLASS'];
if (in_array($getClass, $arCurElement['PROPERTY_CLASS_VALUE']))
{
    $arResult['TOPBAR']['SELECTED']['CLASS'] = $getClass;
}
else
{
    $arResult['TOPBAR']['SELECTED']['CLASS'] = $arCurElement['PROPERTY_CLASS_VALUE'][0];
}
//----Получаем тип----
$arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] = false;
if ($arCurElement['PROPERTY_TYPE_VALUE'] == 'Премиум' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Читаем летом' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Английский летом' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Все в одном' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Готовимся к контрольной. Русский язык' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Готовимся к контрольной. Математика' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Математика+' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Алгебра+' || $arCurElement['PROPERTY_TYPE_VALUE'] == 'Геометрия+')
{
    $arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] = 'PREMIUM';
}
if ($arCurElement['PROPERTY_TYPE_VALUE'] == 'ЕГЭ')
{
    $arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] = 'EGE';
}
//----Получаем id----
$arResult['TOPBAR']['SELECTED']['ID'] = $arCurElement['ID'];

$arResult['TOPBAR']['SELECTED']['SUBJECT'] = $arCurElement['PROPERTY_SUBJECT_VALUE'][0];



//получаю список классов
$dbClass = CIBlockElement::GetList(
    array(
        'SORT' => 'ASC'
    ),
    array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => '8',
    ),
    false,
    false,
    array('ID', 'NAME')
);
while ($arClass = $dbClass->Fetch())
{
    if(strpos($arClass['NAME'],'класс')) $classNum = explode(" ", $arClass['NAME']);
    else $classNum[0]=0;

    if ((int)$classNum[0] >= 0 )
    {
        $arResult['TOPBAR']['CLASS'][ $arClass['ID'] ]['CLASS'] = $classNum[0];

        if ($arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] === 'PREMIUM')
        {
            $arPacket = CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => '11',
                    'PROPERTY_TYPE_VALUE' => $arCurElement['PROPERTY_TYPE_VALUE'],
                    'PROPERTY_CLASS' => $arClass['ID']
                ),
                false,
                false,
                array('ID')
            )->Fetch();
        }
        elseif ($arResult['TOPBAR']['SELECTED']['ITEM_TYPE'] === 'EGE')
        {
            $arPacket = CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => '11',
                    'ID' => $arResult['TOPBAR']['SELECTED']['ID'],
                    'PROPERTY_CLASS' => $arClass['ID']
                ),
                false,
                false,
                array('ID')
            )->Fetch();
        }
        else
        {
            $arPacket = CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => '11',
                    'PROPERTY_SUBJECT' => $arResult['TOPBAR']['SELECTED']['SUBJECT'],
                    'PROPERTY_CLASS' => $arClass['ID']
                ),
                false,
                false,
                array('ID')
            )->Fetch();
        }

        if (!$arPacket)
        {
            $arPacket = CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => '11',
                    'PROPERTY_CLASS' => $arClass['ID']
                ),
                false,
                false,
                array('ID')
            )->Fetch();
        }

        $arResult['TOPBAR']['CLASS'][  $arClass['ID'] ]['LINK'] = $arPacket['ID'];
    }
}

asort($arResult['TOPBAR']['CLASS']);
//----Выбираем пакеты для текущего класса----
$dbPacket = CIBlockElement::GetList(
    array(
        'SORT' => 'ASC'
    ),
    array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => '11',
        'PROPERTY_CLASS' => $arResult['TOPBAR']['SELECTED']['CLASS']
    ),
    false,
    false,
    array('ID', 'NAME', 'PROPERTY_TYPE', 'PROPERTY_SUBJECT')
);

while ($arPacket = $dbPacket->Fetch())
{
    if ($arPacket['PROPERTY_TYPE_VALUE'] == 'ЕГЭ')
    {
        $arResult['TOPBAR']['LIST'][ $arPacket['ID'] ] = $arPacket['NAME'];
    }
    elseif ($arPacket['PROPERTY_TYPE_VALUE'] == 'Премиум' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Читаем летом' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Английский летом' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Все в одном' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Готовимся к контрольной. Русский язык' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Готовимся к контрольной. Математика' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Математика+' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Алгебра+' || $arPacket['PROPERTY_TYPE_VALUE'] == 'Геометрия+')
    {
        $arResult['TOPBAR']['LIST'][ $arPacket['ID'] ] = $arPacket['PROPERTY_TYPE_VALUE'];
    }
    else
        $arResult['TOPBAR']['LIST'][ $arPacket['ID'] ] = GetPackType($arPacket['PROPERTY_SUBJECT_VALUE'][0]);
}
// Цвет
$arType = CIBlockElement::GetList(array(), array('ID' => $arResult['PROPERTY_45'][0]), false, false, array('ID', 'NAME'))->Fetch();
if ($arType['NAME'] == "Математика")
{
    $arResult['COLOR'] = '#c92c15';
    $arResult['COLOR_NAME'] = 'red';
    $arResult['TYPE'] = 'math';
}
elseif ($arType['NAME'] == "Чтение")
{
    $arResult['COLOR'] = '#d1650f';
    $arResult['COLOR_NAME'] = 'orange';
    $arResult['TYPE'] = 'read';
}
elseif ($arType['NAME'] == "Английский язык")
{
    $arResult['COLOR'] = '#d1650f';
    $arResult['COLOR_NAME'] = 'orange';
    $arResult['TYPE'] = 'en';
}
else
{
    $arResult['COLOR'] = '#6ca000';
    $arResult['COLOR_NAME'] = 'green';
    $arResult['TYPE'] = 'rus';
}

/*
 * Получаем параметры элементов из свойства
 * --------------------------------------------------------------------------------------------- */
$PropertyKeys = array(
	'BOOKS',
);

foreach ( $arResult['DISPLAY_PROPERTIES'] as &$item ) {

	if ( ! in_array ( $item['CODE'], $PropertyKeys ) ) continue;

	$item['ELEMENTS'] = array();

	$ids = ( is_array ( $item['VALUE'] ) )
		? $item['VALUE']
		: array ( $item['VALUE'] );

	foreach ( $ids as $key => $id ) {

		$arrElements = array();

		$Result  = CIBlockElement::GetList(
			array(
				'SORT' => 'ASC',
				'NAME' => 'ASC',
			),
			array(
				'IBLOCK_ID' => $item['LINK_IBLOCK_ID'], 
				'ID' => $id,
			),
			false,
			array('nTopCount' => 1),
			array(
				'*',
				'PROPERTY_HIT'
			)
		);

		if ( $Object = $Result->GetNextElement() ) {

			$arrElement = $Object->GetFields();

			$arrElement['PICTURE'] = FALSE;

				$PictureWidth = 99;
				$PictureHeight = 99;

				if ( is_numeric ( $arrElement['PREVIEW_PICTURE'] ) ) {

					$arrElement['PICTURE'] = Img::ResizeById(
						$arrElement['PREVIEW_PICTURE'],
						$PictureWidth,
						$PictureHeight
					);

				} else if ( is_numeric ( $arrElement['DETAIL_PICTURE'] ) ) {

					$arrElement['PICTURE'] = Img::ResizeById(//__resizeImageById(
						$arrElement['DETAIL_PICTURE'],
						$PictureWidth,
						$PictureHeight
					);

				}

			if ( $arrElement["PREVIEW_TEXT"] ) {

				$arrElement["PREVIEW_TEXT"] = Text::limit_words( $arrElement["PREVIEW_TEXT"], 22 );

			} elseif ( $arrElement["DETAIL_TEXT"] ) {

				$arrElement["DETAIL_TEXT"] = Text::limit_words( $arrElement["DETAIL_TEXT"], 22 );

			}

			$item['ELEMENTS'][$key] = $arrElement;

		}

	}

}



?>