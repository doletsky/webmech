<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
//section name
foreach($arResult["ITEMS"] as $key=>$arItem){
    $res = CIBlockSection::GetByID($arItem["IBLOCK_SECTION_ID"]);
    if($ar_res = $res->GetNext()){
        $arResult["ITEMS"][$key]["FIELDS"]["SECTION_NAME"] = $ar_res['NAME'];
        $arResult["ITEMS"][$key]["FIELDS"]["SECTION_URL"] = $ar_res['SECTION_PAGE_URL'];
    }
    if(strlen($arItem["CODE"])>0)$arResult["ITEMS"][$key]["DETAIL_PAGE_URL"]=$arResult["ITEMS"][$key]["FIELDS"]["SECTION_URL"].$arItem["CODE"]."/";
    else $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"]=$arResult["ITEMS"][$key]["FIELDS"]["SECTION_URL"].$arItem["ID"]."/";
    //change data
    if(strlen($arItem['ACTIVE_FROM'])>0)$arResult["ITEMS"][$key]['FIELDS']['DATA']=substr($arItem['ACTIVE_FROM'], 0, 10);
    else $arResult["ITEMS"][$key]['FIELDS']['DATA']=substr($arItem['FIELDS']['DATE_CREATE'], 0, 10);
}
?>