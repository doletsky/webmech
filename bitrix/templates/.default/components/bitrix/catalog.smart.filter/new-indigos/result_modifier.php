<?php
$arResult['FORM_ACTION'] = '/';
unset($arResult['HIDDEN']);

foreach($arResult["ITEMS"] as $propId=>$propVal){
    if($propVal["CODE"]=="SUBJECT")$idSubj=$propId;
    if($propVal["CODE"]=="ITEM_TYPE") $idItemType=$propId;
}

$arSubjectType=array("Обучение"=>'1', "Развитие"=>'2', "Развлечение"=>'3');

foreach($arResult["ITEMS"][$idItemType]["VALUES"] as $key=>$val){
    $arResult["ITEMS"][$idSubj]["ch"][]=$val;
    if($val["CHECKED"]=='1') $checked=$arSubjectType[$val["VALUE"]];
}

$arSubjectResult=array();
foreach($arResult["ITEMS"][$idSubj]["VALUES"] as $id=>$el){
    $db_props = CIBlockElement::GetProperty(10, $id, array("sort" => "asc"), Array("CODE"=>"SUBJECT_TYPE"));
    if($ar_props = $db_props->Fetch()){
        if(IntVal($ar_props["VALUE"])==$checked){
            $arSubjSort[$id]=$arResult["ITEMS"][$idSubj]["VALUES"][$id]["VALUE"];
        }
    }

}
asort($arSubjSort);
reset($fruits);
foreach($arSubjSort as $id=>$el)$arSubjectResult[$id] = $arResult["ITEMS"][$idSubj]["VALUES"][$id];

function sortProp($a, $b)
{
    if ($a['SORT'] == $b['SORT']) {
        return strcmp($a["VALUE"], $b["VALUE"]);
        //return 0;
    }
    return ($a['SORT'] < $b['SORT']) ? -1 : 1;
}

function valProp($a, $b)
{
    return strcmp($a["VALUE"], $b["VALUE"]);
}


uasort($arSubjectResult, "sortProp");//сортируем список предметов по полю SORT
//uasort($arSubjectResult, "valProp");//сортируем список предметов по полю VALUE
$arResult["ITEMS"][$idSubj]["VALUES"]=$arSubjectResult;



