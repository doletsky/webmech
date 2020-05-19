<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($_POST['OK']=='подписаться'){
    CModule::IncludeModule("subscribe");
    //проверяем (уже подписан?)
    $subscr = CSubscription::GetList(
        array("ID"=>"ASC"),
        array("ID"=>$_POST['sf_RUB_ID'], "ACTIVE"=>"Y", "EMAIL"=>$_POST['sf_EMAIL'])
    );
    if(($subscr_arr = $subscr->Fetch())){
        $arResult['MESS']='Вы уже подписаны';
    }
    else{
        $arFields = Array(
            "EMAIL" => $_POST['sf_EMAIL'],
            "ACTIVE" => "Y",
            "CONFIRMED" => "Y",
            "FORMAT" => "html",
            "RUB_ID" => array($_POST['sf_RUB_ID'])
        );
        $subscr = new CSubscription;

        //can add without authorization
        $ID = $subscr->Add($arFields);
        $arResult['MESS']=$_POST['sf_EMAIL'].' подписан';
    }
}

?>