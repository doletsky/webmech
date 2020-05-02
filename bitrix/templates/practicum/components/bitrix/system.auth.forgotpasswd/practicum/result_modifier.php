<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["MESS_FORGOT"]="“акой пользователь в системе не зарегистрирован. ѕроверьте верность заполненного пол€. ≈сли ошибка повтор€етс€, то обратитесь за помощью через форму обратной св€зи (ссылка ниже).";
$filter=array();
if(strlen($_REQUEST["USER_LOGIN"])>0) $filter["LOGIN"] = $_REQUEST["USER_LOGIN"];
if(strlen($_REQUEST["USER_EMAIL"])>0) $filter["EMAIL"] = $_REQUEST["USER_EMAIL"];
if(count($filter)>0){
    $rsUsers = CUser::GetList(($by="sort"), ($order="desc"), $filter);
    if ($rsUsers->GetNext()){
        $arResult["MESS_FORGOT"]=" онтрольна€ строка дл€ смены парол€, а также ваши регистрационные данные, высланы вам по E-Mail. ѕерейдите по ссылке, указанной в письме на страницу смены парол€.";
    }
}else{
    $arResult["MESS_FORGOT"]="«аполните хот€ бы одно поле.";
}



?>