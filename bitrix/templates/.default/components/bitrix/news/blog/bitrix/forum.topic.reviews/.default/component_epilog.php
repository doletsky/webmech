<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($_POST['save_product_review']=='Y'){
    $backUrl=$_POST['back_page'];
    $APPLICATION->RestartBuffer();
    LocalRedirect($backUrl);
}
?>

