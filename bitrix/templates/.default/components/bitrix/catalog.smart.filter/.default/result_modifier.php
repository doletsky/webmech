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
$arResult["ITEMS"][$idSubj]["VALUES"]=$arSubjectResult;