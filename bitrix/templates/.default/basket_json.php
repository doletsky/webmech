<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
$arJson = array();
$arBasketItems = array();

    $dbBasketItems = CSaleBasket::GetList(
        array(
            "NAME" => "ASC",
            "ID" => "ASC"
        ),
        array(
            //"ID" => $arID,
            "ORDER_ID" => "NULL",
            "FUSER_ID" => CSaleBasket::GetBasketUserID()
        ),
        false,
        false,
        array("ID", "CALLBACK_FUNC", "MODULE",
            "PRODUCT_ID", "QUANTITY", "DELAY",
            "CAN_BUY", "PRICE", "WEIGHT", "PRODUCT_PROVIDER_CLASS", "NAME")
    );
    while ($arItems = $dbBasketItems->Fetch())
    {
        $arBasketItems[] = $arItems;
    }

$sum=0;
$d_type='';
foreach($arBasketItems as $item){
    $arParamItem=array();
    $class=array();
    $year=array();
    $subject=array();
    $platform=array();
//    $obItem=CIBlockElement::GetList(
//        array(),
//        array("ID"=>$item["PRODUCT_ID"]),
//        false,
//        false,
//        array(
//            "ID",
//            "IBLOCK_ID",
//            "IBLOCK_CODE",
//            "NAME",
//            "PREVIEW_PICTURE",
//            "DETAIL_PICTURE",
//            "PREVIEW_TEXT",
//            "DETAIL_TEXT",
//            "PROPERTY_SHORT_NAME",
//            "PROPERTY_CID",
//            "PROPERTY_MARK_TEXT",
//            "PROPERTY_FEATURE",
//            "PROPERTY_ED_TYPE.NAME",
//            "PROPERTY_CLASS.NAME",
//            "PROPERTY_YEAR.NAME",
//            "PROPERTY_SUBJECT.NAME",
//            "PROPERTY_PLATFORM",
//            "PROPERTY_ONLOAD",
//            "CATALOG_GROUP_1"
//        )
$obItem=CIBlockElement::GetList(
    array(),
    array("ID"=>$item["PRODUCT_ID"]),
    false,
    false,
    array(
        "ID",
        "IBLOCK_ID",
        "IBLOCK_CODE",
        "NAME",
        "PREVIEW_PICTURE",
        "DETAIL_PICTURE",
        "PREVIEW_TEXT",
        "DETAIL_TEXT",
        "CATALOG_GROUP_1"
    )
    );
    while($arElement=$obItem->GetNext()){
        $resProp = CIBlockElement::GetProperty($arElement['IBLOCK_ID'], $arElement['ID'], "sort", "asc", array());
        while ($ob = $resProp->GetNext())
        {
            if($ob['PROPERTY_TYPE']=='E'){
                $resExt= CIBlockElement::GetByID($ob['VALUE']);
                $arElExt=$resExt->GetNext();
                $arElement['PROPERTY_'.$ob['CODE'].'_NAME']=$arElExt['NAME'];
            }
            else{
                $arElement['PROPERTY_'.$ob['CODE'].'_VALUE']=$ob['VALUE'];
            }
        }
        if(strlen($arElement["PROPERTY_CLASS_NAME"])>0)$class[$arElement["PROPERTY_CLASS_NAME"]]=$arElement["PROPERTY_CLASS_NAME"];
        if(strlen($arElement["PROPERTY_YEAR_NAME"])>0)$year[$arElement["PROPERTY_YEAR_NAME"]]=$arElement["PROPERTY_YEAR_NAME"];
        if(strlen($arElement["PROPERTY_SUBJECT_NAME"])>0)$subject[$arElement["PROPERTY_SUBJECT_NAME"]]=$arElement["PROPERTY_SUBJECT_NAME"];
        $platform[$arElement["PROPERTY_PLATFORM_VALUE"]]=$arElement["PROPERTY_PLATFORM_VALUE"];
        $arParamItem=$arElement;
    }



    $sum+=(int)$arParamItem["CATALOG_PRICE_1"]*(int)$item['QUANTITY'];


    if($arParamItem["IBLOCK_CODE"]=="books"){

        ksort($class,SORT_NUMERIC);
        ksort($year,SORT_NUMERIC);
        if(count($year)>0){
            reset($year);
            $min=current($year);
        }else{
            reset($class);
            $min=current($class);
        }
        if(count($class)>0){
            end($class);
            $max=current($class);
        }else{
            end($year);
            $max=current($year);
        }
        if($min==$max)$interval=$max;
        else {
            $interval=$min." - ".$max;
            if(substr_count($interval," класс")>1) $interval=str_replace(" класс", "", $min)." - ".$max;
            if(substr_count($interval," лет")>1) $interval=str_replace(" лет", "", $min)." - ".$max;
            if(substr_count($interval," года")>1) $interval=str_replace(" года", "", $min)." - ".$max;
        }

        $strSubj='';
        foreach($subject as $sub){
            if(substr_count($strSubj, $sub." язык")==0)$strSubj.=", ".$sub;
        }
        $strSubj=trim($strSubj, ", ");


        $text=strip_tags($arParamItem["PROPERTY_FEATURE_VALUE"]["TEXT"]);
        if(strlen(trim($arParamItem["PROPERTY_MARK_TEXT_VALUE"]))>0) $text=$arParamItem["PROPERTY_MARK_TEXT_VALUE"];

        $name=$arParamItem["NAME"];
        if(strlen(trim($arParamItem["PROPERTY_SHORT_NAME_VALUE"]))>0)$name=$arParamItem["PROPERTY_SHORT_NAME_VALUE"];

        $arJson[$arParamItem["ID"]]=array(
            "name"=>$name,
            "pic"=>LINK_FULL . $arParamItem["PROPERTY_CID_VALUE"]."_logo-s.png",
            "text"=>$text,
            "platform"=>trim(implode(", ",$platform),", "),
            "type"=>$arParamItem["PROPERTY_ED_TYPE_NAME"],
            "price"=>$arParamItem["CATALOG_PRICE_1"],
            "link"=>"/products/".$arParamItem["PROPERTY_CID_VALUE"]."/",
            "interval"=>$interval,
            "subject"=>$strSubj,
            "onload"=>$arParamItem["PROPERTY_ONLOAD_VALUE"]
        );

    }
    elseif($arParamItem["IBLOCK_CODE"]=="items"){

        $SVALUES = array();
        $res = CIBlockElement::GetProperty($arParamItem["IBLOCK_ID"], $arParamItem["ID"], "sort", "asc", array("CODE" => "SUBJECT"));
        while ($ob = $res->GetNext())
        {
            $arC=CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            $SVALUES[] = $arC['NAME'];
        }

        $VALUES = array();
        $res = CIBlockElement::GetProperty($arParamItem["IBLOCK_ID"], $arParamItem["ID"], "sort", "asc", array("CODE" => "CLASS"));
        while ($ob = $res->GetNext())
        {
            $arC=CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            $VALUES[] = $arC['NAME'];
        }

        $name=$arParamItem["NAME"];
        if(strlen(trim($arParamItem["PROPERTY_SHORT_NAME_VALUE"]))>0)$name=$arParamItem["PROPERTY_SHORT_NAME_VALUE"];

        $arJson[$arParamItem["ID"]]=array(
            "name"=>$name,
            "pic"=>CFile::GetPath($arParamItem["PREVIEW_PICTURE"]),
            "text"=>$arParamItem["PREVIEW_TEXT"],
            "platform"=>null,
            "type"=>"учебное оборудование",
            "price"=>$arParamItem["CATALOG_PRICE_1"],
            "link"=>"/equipment/detail.php?ID=".$arParamItem["ID"],
            "interval"=>trim(implode(",", $VALUES), ","),
            "subject"=>trim(implode(",", $SVALUES), ","),
            "quantity" => $item['QUANTITY'],
            "onload"=>null
        );


    }
    else{

        $SVALUES = array();
        $res = CIBlockElement::GetProperty($arParamItem["IBLOCK_ID"], $arParamItem["ID"], "sort", "asc", array("CODE" => "SUBJECT"));
        while ($ob = $res->GetNext())
        {
            $arC=CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            $SVALUES[] = $arC['NAME'];
        }

        $VALUES = array();
        $res = CIBlockElement::GetProperty($arParamItem["IBLOCK_ID"], $arParamItem["ID"], "sort", "asc", array("CODE" => "CLASS"));
        while ($ob = $res->GetNext())
        {
            $arC=CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            $VALUES[] = $arC['NAME'];
        }

        $name=$arParamItem["NAME"];
        if(strlen(trim($arParamItem["PROPERTY_SHORT_NAME_VALUE"]))>0)$name=$arParamItem["PROPERTY_SHORT_NAME_VALUE"];

        $arJson[$arParamItem["ID"]]=array(
            "name"=>$name,
            "pic"=>CFile::GetPath($arParamItem["PREVIEW_PICTURE"]),
            "text"=>$arParamItem["PREVIEW_TEXT"],
            "platform"=>null,
            "type"=>"набор",
            "price"=>$arParamItem["CATALOG_PRICE_1"],
            "link"=>"/bookshelf/".$arParamItem["ID"]."/",
            "interval"=>trim(implode(",", $VALUES), ","),
            "subject"=>trim(implode(",", $SVALUES), ","),
            "onload"=>null
        );


    }

}

$arJson["sum"]=$sum;
// Печатаем массив, содержащий актуальную на текущий момент корзину
echo json_encode($arJson);
die();