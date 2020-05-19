<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if (count($arResult["SEARCH"])>0 && CModule::IncludeModule("iblock") && CModule::IncludeModule("catalog"))
{
    foreach($arResult["SEARCH"] as $i=>$el){
        //выбираем поля найденного контента
        $res = CIBlockElement::GetByID($el["ITEM_ID"]);
        if($ar_res = $res->GetNext()){
            //получаем все св-ва
            $db_props = CIBlockElement::GetProperty($ar_res["IBLOCK_ID"], $ar_res["ID"], array("sort" => "asc"), Array());
            while($ar_props = $db_props->Fetch()){
                $prop[$ar_props["CODE"]]=$ar_props;
            }
            $ar_res["PROPERTIES"] = $prop;

            //образовательный тип
            $edType = CIBlockElement::GetByID($prop["ED_TYPE"]["VALUE"]);
            $ed = $edType->GetNext();
            if($ar_res["IBLOCK_ID"]==11) $ar_res["ED_TYPE"] = "Пакет";
            else $ar_res["ED_TYPE"] = $ed["NAME"];

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