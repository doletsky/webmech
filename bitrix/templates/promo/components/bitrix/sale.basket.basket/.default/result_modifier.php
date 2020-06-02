<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$titleBasket='';
$descriptBasket=array();
$maxAccess=0;
if($_SESSION["lid"]["packet"]==1)$titleBasket='<span class="quote-sign colored">Пакет <span style="color: #eb5600">“Максимум”</span></span>';
if($_SESSION["lid"]["packet"]==2)$titleBasket='<span class="quote-sign colored">Пакет <span style="color: #eb5600">“Оптимальный”</span></span>';
if($_SESSION["lid"]["packet"]==3)$titleBasket='<span class="quote-sign colored">Пакет <span style="color: #eb5600">“Простой”</span></span>';
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
	foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $key=>$arItem)
	{
        $res = CIBlockElement::GetByID($arItem["PRODUCT_ID"]);
        $ar_res = $res->GetNext();
        if($key){
            $arName=explode(".", $arItem["NAME"]);
            if(strlen($arName[1])>3){
                $descriptBasket[0].=$arName[1].". ";
            }
                $arResult["ITEMS"]["AnDelCanBuy"][$key]['PREVIEW_TEXT']=$ar_res['PREVIEW_TEXT'];
                $descriptBasket[1].=$ar_res['PREVIEW_TEXT']."<br>";

        }else{
            $arResult["ITEMS"]["AnDelCanBuy"][$key]["PREVIEW_PICTURE_SRC"]=CFile::GetPath($ar_res["PREVIEW_PICTURE"]);
        }

            $arProp=array();
            $props = CIBlockElement::GetProperty($ar_res["IBLOCK_ID"], $arItem["PRODUCT_ID"], array("sort" => "asc"), Array());
            while($prop = $props->Fetch()){
                if($prop["LINK_IBLOCK_ID"]){
                    $subRes = CIBlockElement::GetByID($prop["VALUE"]);
                    if($arSub = $subRes->GetNext()) $prop["EXT_VALUE"]=$arSub["NAME"];
                }
                if($prop["MULTIPLE"]==="Y"){
                    $arProp[$prop["CODE"]][]=$prop;
                }else{
                    $arProp[$prop["CODE"]]=$prop;
                }

            }

            $dbAccess=CCatalogProductGroups::GetList(
                array(),
                array("PRODUCT_ID" => $arItem["PRODUCT_ID"]),
                false,
                false,
                array()
            );
            $arAccess=$dbAccess->GetNext();
            foreach($arTimeWord[$arAccess["ACCESS_LENGTH_TYPE"]] as $accessText=>$numsL)
            {
                if(in_array( $arAccess["ACCESS_LENGTH"], $numsL)) {
                    $arAccess["ACCESS_TEXT"]=$arAccess["ACCESS_LENGTH"]." ".$accessText;
                    if($maxAccess<$arAccess["ACCESS_LENGTH"]){
                        $maxAccess=$arAccess["ACCESS_LENGTH"];
                        $maxAccessText=$arAccess["ACCESS_TEXT"];
                    }
                }
            }
            $arProp["ACCESS"]=$arAccess;
            $arResult["ITEMS"]["AnDelCanBuy"][$key]['PROPERTIES']=$arProp;


//
//		$arElement = array(
//			"ID"=>$arItem["ID"],
//			"NAME" =>$arItem["NAME"],
//			"CODE"=>$arItem["CODE"],
//			"PREVIEW_TEXT"=> $arItem["PREVIEW_TEXT"],
//            "COST" => IntVal($propCost["VALUE"]),
//            "ACCESS" => $arAccess,
//			"PRICE_CURRENCY" => $arItem["PRICE_CURRENCY"],
//			"PRICE_DISCOUNT_VALUE" => $arItem["PRICE_DISCOUNT_VALUE"],
//			"PRICE_PRINT_DISCOUNT_VALUE" => $arItem["PRICE_PRINT_DISCOUNT_VALUE"],
//			"PRICE_VALUE" => $arItem["PRICE_VALUE"],
//			"PRICE_PRINT_VALUE" => $arItem["PRICE_PRINT_VALUE"],
//			"PRICE_DISCOUNT_DIFFERENCE_VALUE" => $arItem["PRICE_DISCOUNT_DIFFERENCE_VALUE"],
//			"PRICE_DISCOUNT_DIFFERENCE" => $arItem["PRICE_DISCOUNT_DIFFERENCE"],
//		);
//		if ($arItem["PRICE_CONVERT_DISCOUNT_VALUE"])
//			$arElement["PRICE_CONVERT_DISCOUNT_VALUE"] = $arItem["PRICE_CONVERT_DISCOUNT_VALUE"];
//		if ($arItem["PRICE_CONVERT_VALUE"])
//			$arElement["PRICE_CONVERT_VALUE"] = $arItem["PRICE_CONVERT_VALUE"];
//		if ($arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"])
//			$arElement["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"] = $arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"];
//
//		if ($type == "DEFAULT"){
//            $arDefaultSetIDs["vip"][] = $arItem["ID"];
//            if($arElement["CODE"]!=="vip")$arDefaultSetIDs["curator"][] = $arItem["ID"];
//            if($arElement["CODE"]!=="vip" && $arElement["CODE"]!=="curator")$arDefaultSetIDs["course"][] = $arItem["ID"];
//        }
//
//
////        $arResult["SET_ITEMS"][$type][$key]="";
//		$arResult["SET_ITEMS"][$type][$arElement["CODE"]] = $arElement;
	}
$arResult["ITEMS"]["AnDelCanBuy"][0]['PROPERTIES']["ACCESS_MAX"]=$maxAccessText;
$arResult["ITEMS"]["TITLE_BASKET"]=$titleBasket;
$arResult["ITEMS"]["DESCRIPTION_BASKET"]=$descriptBasket[0].'<br><br>'.$descriptBasket[1];
$arResult["ITEMS"]["AR_BASKET"]=$descriptBasket[3];


