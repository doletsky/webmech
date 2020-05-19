<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
foreach($arResult["ITEMS"] as $key => $arItem){
    if($arItem["IBLOCK_CODE"]=="books"){
        $arResult["ITEMS"][$key]["DETAIL_PICTURE"]["SRC"]="http://stage.indigos.com/Indigos.Images/Content/".$arItem["PROPERTY_CID_VALUE"]."_logo-s.png";
        $CLASS = array();
        $YEAR = array();
        $res = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], "sort", "asc", array("CODE" => "CLASS"));
        while ($ob = $res->GetNext())
        {
            $arClass = CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            if(strlen($arClass['NAME']))
             $CLASS[] = $arClass['NAME'];
        }
        $res = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], "sort", "asc", array("CODE" => "YEAR"));
        while ($ob = $res->GetNext())
        {
            $arClass = CIBlockElement::GetByID($ob['VALUE'])->GetNext();
            if(strlen($arClass['NAME']))
             $YEAR[] = $arClass['NAME'];
        }
        sort($CLASS, SORT_NUMERIC);
        sort($YEAR, SORT_NUMERIC);
        $age=array_merge($YEAR, $CLASS);
        if(count($age)>2){
            reset($age);
            $fAge=current($age);
            $compFAge=explode(" ",trim($fAge));
            end($age);
            $eAge=current($age);
            $compEAge=explode(" ",trim($eAge));
            if(strcasecmp($compFAge[1],$compEAge[1])==0) $dAge=$compFAge[0]." - ".$eAge;
            else $dAge=$fAge." - ".$eAge;
        }else{
            $dAge=trim(implode(",", $age),",");
        }
        $arResult["ITEMS"][$key]["CLASS"]=$dAge;
    }elseif($arItem["IBLOCK_CODE"]=="items"){
        $CLASS = array();
        $res = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], "sort", "asc", array("CODE" => "AGE"));
        while ($ob = $res->GetNext())
        {
               $CLASS[] = $ob['VALUE'];
        }
        $age=$CLASS;
        if(count($age)>2){
            reset($age);
            $fAge=current($age);
            $compFAge=explode(" ",trim($fAge));
            end($age);
            $eAge=current($age);
            $compEAge=explode(" ",trim($eAge));
            if(strcasecmp($compFAge[1],$compEAge[1])==0) $dAge=$compFAge[0]." - ".$eAge;
            else $dAge=$fAge." - ".$eAge;
        }else{
            $dAge=trim(implode(",", $age),",");
        }
        $arResult["ITEMS"][$key]["CLASS"]=$dAge;;
    }
}
?>