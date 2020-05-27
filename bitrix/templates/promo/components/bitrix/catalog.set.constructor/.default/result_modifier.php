<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arDefaultParams = array(
	'TEMPLATE_THEME' => 'blue',
);
$arParams = array_merge($arDefaultParams, $arParams);

$arParams['TEMPLATE_THEME'] = (string)($arParams['TEMPLATE_THEME']);
if ('' != $arParams['TEMPLATE_THEME'])
{
	$arParams['TEMPLATE_THEME'] = preg_replace('/[^a-zA-Z0-9_\-\(\)\!]/', '', $arParams['TEMPLATE_THEME']);
	if ('site' == $arParams['TEMPLATE_THEME'])
	{
		$arParams['TEMPLATE_THEME'] = COption::GetOptionString('main', 'wizard_eshop_adapt_theme_id', 'blue', SITE_ID);
	}
	if ('' != $arParams['TEMPLATE_THEME'])
	{
		if (!is_file($_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
			$arParams['TEMPLATE_THEME'] = '';
	}
}
if ('' == $arParams['TEMPLATE_THEME'])
	$arParams['TEMPLATE_THEME'] = 'blue';

if ($arResult["ELEMENT"]['DETAIL_PICTURE'] || $arResult["ELEMENT"]['PREVIEW_PICTURE'])
{
	$arFileTmp = CFile::ResizeImageGet(
		$arResult["ELEMENT"]['DETAIL_PICTURE'] ? $arResult["ELEMENT"]['DETAIL_PICTURE'] : $arResult["ELEMENT"]['PREVIEW_PICTURE'],
		array("width" => "150", "height" => "180"),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true
	);
	$arResult["ELEMENT"]['DETAIL_PICTURE'] = $arFileTmp;
}
$arTimeWord=array(
    "H" => array(
        "час"   => array(1),
        "часа"  => array(2,3,4),
        "часов" => array(0,5,6,7,8,9,11,12,13,14)
    ),
    "D" => array(
        "день"  => array(1),
        "дня"   => array(2,3,4),
        "дней"  => array(0,5,6,7,8,9,11,12,13,14)
    ),
    "W" => array(
        "неделю" => array(1),
        "недели" => array(2,3,4),
        "недель" => array(0,5,6,7,8,9,11,12,13,14)
    ),
    "M" => array(
        "месяц" => array(1),
        "месяца"=> array(2,3,4),
        "месяцев"=> array(0,5,6,7,8,9,11,12,13,14)
    ),
    "Q" => array(
            "квартал" => array(1),
            "квартала"=> array(2,3,4),
            "кварталов"=> array(0,5,6,7,8,9,11,12,13,14)
    ),
    "S" => array(
        "полугодие" => array(1),
        "полугодия"=> array(2,3,4),
        "полугодий"=> array(0,5,6,7,8,9,11,12,13,14)
    ),
    "Y" => array(
        "год" => array(1),
        "года"=> array(2,3,4),
        "лет"=> array(0,5,6,7,8,9,11,12,13,14)
    )
);
$arDefaultSetIDs["vip"] = array($arResult["ELEMENT"]["ID"]);
$arDefaultSetIDs["curator"] = array($arResult["ELEMENT"]["ID"]);
$arDefaultSetIDs["course"] = array($arResult["ELEMENT"]["ID"]);
foreach (array("DEFAULT", "OTHER") as $type)
{
	foreach ($arResult["SET_ITEMS"][$type] as $key=>$arItem)
	{
        $props = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], array("sort" => "asc"), Array("CODE"=>"COST"));
        $propCost = $props->Fetch();
        $dbAccess=CCatalogProductGroups::GetList(
            array(),
            array("PRODUCT_ID" => $arItem["ID"]),
            false,
            false,
            array()
        );
        $arAccess=$dbAccess->GetNext();
        foreach($arTimeWord[$arAccess["ACCESS_LENGTH_TYPE"]] as $accessText=>$numsL)
        {
            if(in_array( $arAccess["ACCESS_LENGTH"], $numsL)) $arAccess["ACCESS_TEXT"]=$arAccess["ACCESS_LENGTH"]." ".$accessText;
        }

		$arElement = array(
			"ID"=>$arItem["ID"],
			"NAME" =>$arItem["NAME"],
			"CODE"=>$arItem["CODE"],
			"PREVIEW_TEXT"=> $arItem["PREVIEW_TEXT"],
            "COST" => IntVal($propCost["VALUE"]),
            "ACCESS" => $arAccess,
			"PRICE_CURRENCY" => $arItem["PRICE_CURRENCY"],
			"PRICE_DISCOUNT_VALUE" => $arItem["PRICE_DISCOUNT_VALUE"],
			"PRICE_PRINT_DISCOUNT_VALUE" => $arItem["PRICE_PRINT_DISCOUNT_VALUE"],
			"PRICE_VALUE" => $arItem["PRICE_VALUE"],
			"PRICE_PRINT_VALUE" => $arItem["PRICE_PRINT_VALUE"],
			"PRICE_DISCOUNT_DIFFERENCE_VALUE" => $arItem["PRICE_DISCOUNT_DIFFERENCE_VALUE"],
			"PRICE_DISCOUNT_DIFFERENCE" => $arItem["PRICE_DISCOUNT_DIFFERENCE"],
		);
		if ($arItem["PRICE_CONVERT_DISCOUNT_VALUE"])
			$arElement["PRICE_CONVERT_DISCOUNT_VALUE"] = $arItem["PRICE_CONVERT_DISCOUNT_VALUE"];
		if ($arItem["PRICE_CONVERT_VALUE"])
			$arElement["PRICE_CONVERT_VALUE"] = $arItem["PRICE_CONVERT_VALUE"];
		if ($arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"])
			$arElement["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"] = $arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"];

		if ($type == "DEFAULT"){
            $arDefaultSetIDs["vip"][] = $arItem["ID"];
            if($arElement["CODE"]!=="vip")$arDefaultSetIDs["curator"][] = $arItem["ID"];
            if($arElement["CODE"]!=="vip" && $arElement["CODE"]!=="curator")$arDefaultSetIDs["course"][] = $arItem["ID"];
        }


//        $arResult["SET_ITEMS"][$type][$key]="";
		$arResult["SET_ITEMS"][$type][$arElement["CODE"]] = $arElement;
	}
}
$arResult["DEFAULT_SET_IDS"] = $arDefaultSetIDs;
foreach($arResult["DEFAULT_SET_IDS"] as $p=>$ids){
    foreach($ids as $id){
        $arResult["ITEMS_RATIO"][$p][$id]=1;
    }

}

