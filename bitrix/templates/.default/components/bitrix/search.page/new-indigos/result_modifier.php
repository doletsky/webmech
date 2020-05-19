<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (count($arResult["SEARCH"])>0 && CModule::IncludeModule("iblock") && CModule::IncludeModule("catalog"))
{
    foreach($arResult["SEARCH"] as $i=>$el){
        //выбираем поля найденного контента
        $arSelect = Array("ID", "IBLOCK_ID", "IBLOCK_CODE", "NAME",'PREVIEW_PICTURE','PREVIEW_TEXT', "PROPERTY_*");
        $arFilter = Array("ID"=>$el["ITEM_ID"]);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNextElement()){
            $ar_res = $ob->GetFields();
            $ar_props = $ob->GetProperties();

            //получаем все св-ва
            foreach($ar_props as $code => $item){
                if($code=='CLASS'||$code=='YEAR'||$code=='SUBJECT'||$code=='ED_TYPE'){
                    if(is_array($item['VALUE'])){
                        foreach($item['VALUE'] as $id){
                            $propRes=CIBlockElement::GetByID($id);
                            if($arPropRes = $propRes->GetNext()){
                                if($arPropRes['NAME']!='Выпускник'&&!in_array($arPropRes['NAME']." язык",$item['PROP_TITLE'])&&!in_array(str_replace(" язык", "", $arPropRes['NAME']),$item['PROP_TITLE']))$item['PROP_TITLE'][]=$arPropRes['NAME'];
                            }
                        }
                    }else{
                        $propRes=CIBlockElement::GetByID($ar_props['VALUE']);
                        if($arPropRes = $propRes->GetNext()){
                            if($arPropRes['NAME']!='Выпускник')$item['PROP_TITLE'][]=$arPropRes['NAME'];
                        }
                    }
                    $ar_props[$code]=$item;
                }
                if($code=='SHORT_NAME'){
                    if(strlen(trim($item['VALUE']))>0)$arResult["SEARCH"][$i]["TITLE"]=$item['VALUE'];
                }

            }
            $ar_res["PROPERTIES"] = $ar_props;

            //цена
            $db_price = CPrice::GetList(
                array(),
                array(
                    "PRODUCT_ID" => $ar_res["ID"],
                    "CATALOG_GROUP_ID" => "1"
                )
            );
            $price = $db_price->Fetch();
            //$price = CPrice::GetBasePrice($ar_res["ID"]);
            $ar_res["PRICES"]["BASE"] =  array(
                "VALUE" => round($price["PRICE"]),
                "PRINT_VALUE" => round($price["PRICE"])." р.",
                "CAN_ACCESS" => "Y"
            );

            $arResult["SEARCH"][$i] = array_merge($arResult["SEARCH"][$i], $ar_res);

        }
    }

}

?>