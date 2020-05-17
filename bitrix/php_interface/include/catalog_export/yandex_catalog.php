<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $USER;
if (!$USER->IsAdmin()) die();
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
global $APPLICATION;
set_time_limit(0);

global $USER;
$bTmpUserCreated = false;
if (!CCatalog::IsUserExists())
{
    $bTmpUserCreated = true;
    if (isset($USER))
    {
        $USER_TMP = $USER;
        unset($USER);
    }

    $USER = new CUser();
}

$arLabels=array(
    "market"=>"utm_source=market&amp;utm_medium=cpc&amp;utm_campaign=market",
    "mail"=>"utm_source=mail&amp;utm_medium=cpc&amp;utm_campaign=torg"
);

$arYear=array(
    "0-12 мес." => "0",
    "1 год" => "0",
    "2 года" => "0",
    "3 года" => "0",
    "4 года" => "0",
    "5 лет" => "0",
    "6 лет" => "6",
    "1 класс" => "6",
    "2 класс" => "6",
    "3 класс" => "6",
    "4 класс" => "6",
    "5 класс" => "6",
    "6 класс" => "12",
    "7 класс" => "12",
    "8 класс" => "12",
    "9 класс" => "12",
    "10 класс" => "16",
    "11 класс" => "16"
);
$arItemType=array(
    ""=>1,
    "Обучение"=>1,
    "Развитие"=>2,
    "Развлечение"=>3
);

$trans=array(
    "&nbsp;"=>" ",
    "&#40;"=>"(",
    "&#41;"=>")",
    '&ndash;'=>'',
    '«'=>"&quot;",
    '»'=>"&quot;",
    '"'=>"&quot;",
    "&"=>"&amp;",
    ">"=>"&gt;",
    "<"=>"&lt;",
    "'"=>"&apos;"
);
$arCIDrepeat=array();

$ptime = getmicrotime();
$str='<?xml version="1.0" encoding="windows-1251"?>'.PHP_EOL;
$str.='<!DOCTYPE yml_catalog SYSTEM "shops.dtd">'.PHP_EOL;
$data=ConvertTimeStamp(time(),"FULL");
$str.='<yml_catalog date="'.$data.'">'.PHP_EOL;
$str.='<shop>'.PHP_EOL;
$str.='<name>Индигос</name>'.PHP_EOL;
$str.='<company>Индигос</company>'.PHP_EOL;
$str.='<url>http://www.indigos.ru/</url>'.PHP_EOL;
$str.='<currencies><currency id="RUB" rate="1"/></currencies>'.PHP_EOL;
$str.='<categories>'.PHP_EOL.'<category id="1">Обучение</category>'.PHP_EOL.'<category id="2">Развитие</category>'.PHP_EOL.'<category id="3">Развлечение</category>'.PHP_EOL.'<category id="4">Только у нас</category>'.PHP_EOL.'</categories>'.PHP_EOL;
$str.='<offers>'.PHP_EOL;

$debugCount=2;

//EK
$arFilter = Array(
    "IBLOCK_CODE"=>"books",
    ">CATALOG_PRICE_1"=>0,
    "ACTIVE"=>"Y"
);
$arSelect = array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "DETAIL_TEXT",
    "CATALOG_GROUP_1",
    "PROPERTY_CID",
    "PROPERTY_PUBLISHER",
    "PROPERTY_SERIES.NAME",
    "PROPERTY_CONTENT", //содержание
    "PROPERTY_CONTENT_TYPE" //курс/лаборатория/произведение и т.д.


);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ar_fields = $res->GetNext())
{
    $arCIDrepeat[$ar_fields["PROPERTY_CID_VALUE"]][]=$ar_fields["ID"];

    $ageCode=array();
    $age="";
    $VALUE=array();

    $ageCode=array("CODE" => "YEAR");

    $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "name", "asc", $ageCode );
    while ($ob = $resProp->GetNext())
    {
            $resYear=CIBlockElement::GetByID($ob['VALUE']);
            if($arResYear = $resYear->GetNext())
                $VALUE[]=$arResYear["NAME"];

    }
    if(count($VALUE)==0){
        $ageCode=array("CODE" => "CLASS");
        $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "name", "asc", $ageCode );
        while ($ob = $resProp->GetNext())
        {
            $resYear=CIBlockElement::GetByID($ob['VALUE']);
            if($arResYear = $resYear->GetNext())
                $VALUE[]=$arResYear["NAME"];

        }
    }
    if(count($VALUE)){
        sort($VALUE);
        $age = $arYear[$VALUE[0]];
    }

    $valTmp=array();
    $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "name", "asc", array("CODE" => "ITEM_TYPE") );
    while ($ob = $resProp->GetNext())
    {
        $valTmp[]=$arItemType[$ob["VALUE_ENUM"]];
    }
    sort($valTmp);reset($valTmp);$catId=current($valTmp);

    $autors='';
    $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "name", "asc", array("CODE" => "AUTORS") );
    while ($ob = $resProp->GetNext())
    {
        $resA=CIBlockElement::GetByID($ob['VALUE']);
        if($arResA = $resA->GetNext())
        $autors.=$arResA["VALUE"].', ';
    }

    $str.='<offer id="'.$ar_fields["PROPERTY_CID_VALUE"].'" type="audiobook" available="true">'.PHP_EOL;
    $str.='<url>http://www.indigos.ru/products/'.$ar_fields["PROPERTY_CID_VALUE"].'/</url>'.PHP_EOL;
    $str.='<price>'.str_replace(".00", "",(string)$ar_fields["CATALOG_PRICE_1"]).'</price>'.PHP_EOL;
    $str.='<currencyId>RUB</currencyId>'.PHP_EOL;
    //$catId=$arItemType[$ar_fields["PROPERTY_ITEM_TYPE_VALUE"]];
    $str.='<categoryId>'.$catId.'</categoryId>'.PHP_EOL;
    $str.='<picture>'.PHP_EOL.LINK_PREVIEW.$ar_fields["PROPERTY_CID_VALUE"].'_logo-s.png'.PHP_EOL.'</picture>'.PHP_EOL;
    $str.='<author>'.PHP_EOL.trim($autors, ', ').PHP_EOL.'</author>'.PHP_EOL;
    $str.='<name>'.PHP_EOL.str_replace('&','&amp;',$ar_fields["NAME"]).PHP_EOL.'</name>'.PHP_EOL;
    $str.='<publisher>'.PHP_EOL.$ar_fields["PROPERTY_PUBLISHER_VALUE"].PHP_EOL.'</publisher>'.PHP_EOL;
    $str.='<series>'.PHP_EOL.$ar_fields["PROPERTY_SERIES_NAME"].PHP_EOL.'</series>'.PHP_EOL;
    $table_of_contents=str_replace("</li>", PHP_EOL,$ar_fields["~PROPERTY_CONTENT_VALUE"]["TEXT"]);
    $table_of_contents=strip_tags($table_of_contents);
    $str.='<table_of_contents>'.PHP_EOL.$table_of_contents.'</table_of_contents>'.PHP_EOL;
    $str.='<performance_type>'.PHP_EOL.$ar_fields["PROPERTY_CONTENT_TYPE_VALUE"].PHP_EOL.'</performance_type>'.PHP_EOL;
    $detail=strtr(TruncateText(strip_tags($ar_fields["DETAIL_TEXT"]),500), $trans);
    $str.='<description>'.PHP_EOL.$detail.PHP_EOL.'</description>'.PHP_EOL;
    $str.='<downloadable>true</downloadable>'.PHP_EOL;
    $str.='<age unit="year">'.$age.'</age>'.PHP_EOL;
    $str.='</offer>'.PHP_EOL;
    //file_put_contents($_SERVER["DOCUMENT_ROOT"]."/logs/catalog_xml.txt", $str);die();
?>


    <?
    //$debugCount--;
    //if($debugCount==0)break;
    //echo "Время генерации ".round(getmicrotime()-$ptime, 3)." секунд<br>";
}
?>

<?
//Packet
$arFilter = Array(
    "IBLOCK_CODE"=>"bookshelf",
    "ACTIVE"=>"Y"
);
$arSelect = array(
    "ID",
    "IBLOCK_ID",
    "NAME",
    "PREVIEW_TEXT",
    "DETAIL_TEXT",
    "PREVIEW_PICTURE",
    "CATALOG_GROUP_1",
    "PROPERTY_BOOKS",
    "PROPERTY_CLASS"

);
$resPac = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ar_fields = $resPac->GetNext())
{
  if((int)$ar_fields["CATALOG_PRICE_1"]>0){
    if(intval($ar_fields["PROPERTY_CLASS_VALUE"]>0))$ageCode=array("CODE" => "CLASS");
    if(count($ageCode)){
        $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "name", "asc", $ageCode );
        while ($ob = $resProp->GetNext())
        {
            $resYear=CIBlockElement::GetByID($ob['VALUE']);
            if($arResYear = $resYear->GetNext())
                $VALUE[]=$arResYear["NAME"];

        }
        sort($VALUE);
        $age = $arYear[$VALUE[0]];
    }

    $str.='<offer id="P'.$ar_fields["ID"].'" type="audiobook" available="true">'.PHP_EOL;
    $str.='<url>http://www.indigos.ru/bookshelf/'.$ar_fields["ID"].'/</url>'.PHP_EOL;
    $str.='<price>'.str_replace(".00", "",(string)$ar_fields["CATALOG_PRICE_1"]).'</price>'.PHP_EOL;
    $str.='<currencyId>RUB</currencyId>'.PHP_EOL;
    $str.='<categoryId>4</categoryId>'.PHP_EOL;
    $preview=CFile::GetPath($ar_fields["PREVIEW_PICTURE"]);
    $str.='<picture>'.PHP_EOL.$preview.PHP_EOL.'</picture>'.PHP_EOL;
    $str.='<name>'.PHP_EOL.str_replace('&','&amp;',$ar_fields["NAME"]).PHP_EOL.'</name>'.PHP_EOL;
    $table_of_contents='';
    foreach($ar_fields['PROPERTY_BOOKS_VALUE'] as $book){
        $arBook = CIBlockElement::GetByID($_GET["PID"]);
        if($resBook = $arBook->GetNext())
            $table_of_contents.=trim($resBook['NAME']);
    }
    if(strlen(trim($table_of_contents))>0) $str.='<table_of_contents>'.PHP_EOL.$table_of_contents.'</table_of_contents>'.PHP_EOL;
    $detail=strtr(TruncateText(strip_tags($ar_fields["PREVIEW_TEXT"]),500), $trans);
    $str.='<description>'.PHP_EOL.$detail.PHP_EOL.'</description>'.PHP_EOL;
    $str.='<downloadable>true</downloadable>'.PHP_EOL;
    $str.='<age unit="year">'.$age.'</age>'.PHP_EOL;
    $str.='</offer>'.PHP_EOL;
  }
}

?>

<?

$str.='</offers>'.PHP_EOL;
$str.='</shop>'.PHP_EOL;
$str.='</yml_catalog>'.PHP_EOL;

foreach($arLabels as $key=>$label){
    $strLabels=str_replace("</url>", "?".$label."</url>", $str);
    $strFile=utf8win1251($strLabels);
    file_put_contents($_SERVER["DOCUMENT_ROOT"]."/catalog_".$key.".xml", $strFile);
}


if ($bTmpUserCreated)
{
    unset($USER);
    if (isset($USER_TMP))
    {
        $USER = $USER_TMP;
        unset($USER_TMP);
    }
}

echo "Время генерации ".round(getmicrotime()-$ptime, 3)." секунд<br>";
?>