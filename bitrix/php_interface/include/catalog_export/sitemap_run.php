<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
global $APPLICATION;
//set_time_limit(0);
$ptime = getmicrotime();
//start parametrs
$root_dir="http://".str_replace(":80", "", $_SERVER['HTTP_HOST']);//"http://www.indigos.ru";
$minPriority=0.2;
$priority=1;
$arChangfreq=array(
    "0.8"=>"daily",
    "0.6"=>"weekly",
    "0.4"=>"weekly",
    "0.2"=>"weekly"
);
$arFile=array(
    "/about"
);

$arIgnore=array(
    "/about/quests/"
);

//first level
$arSmFiles=array(
    "0" => array(
        "loc"=> $root_dir."/",
        "lastmod"=>date ("c"),
        "priority"=>$priority,
        "changefreq"=>"daily"
    )
);

//next level
while(count($arFile)){
    if($priority>0.2)$priority=$priority-0.2;
    $tmpFile=array();
    foreach($arFile as $dir){
        $arSmFiles[]=array(
            "loc"=> $root_dir.$dir,
            "lastmod"=>date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])),
            "priority"=>$priority,
            "changefreq"=>$arChangfreq[(string)$priority]
        );
        $files = scandir($_SERVER["DOCUMENT_ROOT"].$dir);
        foreach($files as $path){
            if(substr_count($path,".")==0&&!in_array($dir."/".$path."/", $arIgnore)){
                 $tmpFile[]=$dir."/".$path."/";
            }
        }
    }
    $arFile=$tmpFile;
}

$arSmEK=array();
$arFilter = Array(
    "IBLOCK_CODE"=>'books',
    "ACTIVE"=>"Y"
);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, array("ID", "IBLOCK_ID", "PROPERTY_CID"));
while($ar_fields = $res->GetNext())
{
    $arSmEK[]=array(
        "loc"=> $root_dir."/products/".$ar_fields["PROPERTY_CID_VALUE"]."/",
        "lastmod"=>date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])),
        "priority"=>"0.8",
        "changefreq"=>"daily"
    );
}

$arSmPackets=array();
$arFilter = Array(
    "IBLOCK_CODE"=>'bookshelf',
    "ACTIVE"=>"Y"
);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, array("ID", "IBLOCK_ID"));
while($ar_fields = $res->GetNext())
{
    $arSmPackets[]=array(
        "loc"=> $root_dir."/bookshelf/".$ar_fields["ID"]."/",
        "lastmod"=>date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])),
        "priority"=>"0.8",
        "changefreq"=>"daily"
    );
}

$strSmIndex='<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><sitemap><loc>http://www.indigos.ru/sitemap_files.xml</loc><lastmod>'.date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])).'</lastmod></sitemap><sitemap><loc>http://www.indigos.ru/sitemap_ek.xml</loc><lastmod>'.date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])).'</lastmod></sitemap><sitemap><loc>http://www.indigos.ru/sitemap_packets.xml</loc><lastmod>'.date ("c",filemtime($_SERVER["DOCUMENT_ROOT"])).'</lastmod></sitemap></sitemapindex>';
file_put_contents($_SERVER["DOCUMENT_ROOT"]."/sitemap.xml", $strSmIndex);

$strSmFiles='<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach($arSmFiles as $strFile){
    $strSmFiles.='<url><loc>'.$strFile["loc"].'</loc><lastmod>'.$strFile["lastmod"].'</lastmod><priority>'.$strFile["priority"].'</priority><changefreq>'.$strFile["changefreq"].'</changefreq></url>';
}
$strSmFiles.='</urlset>';
file_put_contents($_SERVER["DOCUMENT_ROOT"]."/sitemap_files.xml", $strSmFiles);

$strSmEK='<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach($arSmEK as $strEK){
    $strSmEK.='<url><loc>'.$strEK["loc"].'</loc><lastmod>'.$strEK["lastmod"].'</lastmod><priority>'.$strEK["priority"].'</priority><changefreq>'.$strEK["changefreq"].'</changefreq></url>';
}
$strSmEK.='</urlset>';
file_put_contents($_SERVER["DOCUMENT_ROOT"]."/sitemap_ek.xml", $strSmEK);

$strSmPakets='<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
foreach($arSmPackets as $strPac){
    $strSmPakets.='<url><loc>'.$strPac["loc"].'</loc><lastmod>'.$strPac["lastmod"].'</lastmod><priority>'.$strPac["priority"].'</priority><changefreq>'.$strPac["changefreq"].'</changefreq></url>';
}
$strSmPakets.='</urlset>';
file_put_contents($_SERVER["DOCUMENT_ROOT"]."/sitemap_packets.xml", $strSmPakets);

echo "Время генерации ".round(getmicrotime()-$ptime, 3)." секунд<br>";
?>