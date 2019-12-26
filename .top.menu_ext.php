<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if (!function_exists("GetTreeRecursive")) //Include from main.map component
{
$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
	// "IBLOCK_TYPE_ID" => "books",
	"IBLOCK_TYPE" => "items",
	"IBLOCK_ID" => 24,
    "DEPTH_LEVEL" => "6",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000"
	),
	false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
}
?>