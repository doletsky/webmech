<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["MESS_FORGOT"]="����� ������������ � ������� �� ���������������. ��������� �������� ������������ ����. ���� ������ �����������, �� ���������� �� ������� ����� ����� �������� ����� (������ ����).";
$filter=array();
if(strlen($_REQUEST["USER_LOGIN"])>0) $filter["LOGIN"] = $_REQUEST["USER_LOGIN"];
if(strlen($_REQUEST["USER_EMAIL"])>0) $filter["EMAIL"] = $_REQUEST["USER_EMAIL"];
if(count($filter)>0){
    $rsUsers = CUser::GetList(($by="sort"), ($order="desc"), $filter);
    if ($rsUsers->GetNext()){
        $arResult["MESS_FORGOT"]="����������� ������ ��� ����� ������, � ����� ���� ��������������� ������, ������� ��� �� E-Mail. ��������� �� ������, ��������� � ������ �� �������� ����� ������.";
    }
}else{
    $arResult["MESS_FORGOT"]="��������� ���� �� ���� ����.";
}



?>