<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

//add to tags 'img' atribut 'style' with margin

$arTmp=explode('<img',$arResult["DETAIL_TEXT"]);
if(is_array($arTmp))$count_arTmp=count($arTmp);
else $count_arTmp=0;
if($count_arTmp>1){
    for($i=1;$i<=$count_arTmp-1;$i++){
        $subArTmp=explode('>',$arTmp[$i]);
        $imgAttr=$subArTmp[0];
        $imgAttr=str_replace(' ','&', $imgAttr);
        $imgAttr=str_replace('"','', $imgAttr);
        parse_str($imgAttr, $attr);
        $margin='';
        if(array_key_exists('hspace', $attr))$margin.=' '.$attr['hspace'].'px';
        if(array_key_exists('vspace', $attr))$margin.=' '.$attr['vspace'].'px';
        if(strlen($margin)>2){
            $arTmp[$i]=' style="margin:'.$margin.';" '.$arTmp[$i];
        }
    }
    $arResult["DETAIL_TEXT"]=implode('<img', $arTmp);
}

//change data
if(strlen($arResult['ACTIVE_FROM'])>0)$arResult['FIELDS']['DATA']=substr($arResult['ACTIVE_FROM'], 0, 10);
else $arResult['FIELDS']['DATA']=substr($arResult['FIELDS']['DATE_CREATE'], 0, 10);


?>