<?
require_once 'include/inXL/classes/AgentSendReminder.php';
require_once 'include/inXL/classes/AgentDownloadReminder.php';
require_once 'include/inXL/classes/CReferer.php';
require_once 'include/inXL/classes/Google/autoload.php';

//debug comment blog
if($_POST['SECTION_ID']==2)file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/post_form.txt', print_r($_POST, true));

if (\inXL\CReferer::IsEmptyReferer() && $_SERVER['HTTP_REFERER'])
{
    \inXL\CReferer::SetReferer($_SERVER['HTTP_REFERER']);
}
if(array_key_exists('suggested_user_email',$_GET)){
    $APPLICATION->set_cookie("suggested_user_email", $_GET['suggested_user_email'], time()+60*60*24*30*12*5);
}

$arServ=array(
    "localhost:6448"=>"http://stage.indigos.com/",
    "dev.store.indigos.com:80"=>"http://stage.indigos.com/",
    "stage.store.indigos.com:80"=>"http://stage.indigos.com/",
    "www.indigos.ru:80"=>"http://api.indigos.com/"
);

$arServerIps = array(
    "dev.store.indigos.com" => "10.0.10.12",
    "stage.store.indigos.com" => "10.0.10.10",
    "indigos.ru" => "10.0.10.17"
    );


define(LINK_PREVIEW, $arServ[$_SERVER['HTTP_HOST']].'Indigos.Images/Content/');
define(LINK_FULL, $arServ[$_SERVER['HTTP_HOST']].'Indigos.Images/Content/');
define(LINK_SCREENSHOT, $arServ[$_SERVER['HTTP_HOST']].'Indigos.Images/Content/');
define(DEMO_LINK, 'http://publisher.activetextbook.com/active_textbooks/');

define("BX_CUSTOM_TO_LOWER_FUNC", mb_strtolower);

define(VIS_PRICE_LIMIT, 399000);

// general messages
//$MESS['MADE_BY'] = 'Разработка сайта <a href="http://www.inxl.ru" target="_blank"><img src="/images/inxl.png" alt="inXL" title="inXL" /></a>';
$MESS['COPYRIGHT'] = '© 2013, Образовательный ресурс «INDIGOS». ООО «Индигос», юр. адрес:  105066, г. Москва, ул. Доброслободская, д.5. ОГРН 1077763638226.';

// product specific
$MESS['HIT'] = 'Хит';
$MESS['RECOMMENDED'] = 'Рекомендовано';

$MESS['CLIENT_URL'] = 'http://s3-eu-west-1.amazonaws.com/indigos/Indigos+Production+1.65.exe';
$MESS['CLIENT_URL_DNEVNIK'] = 'http://s3-eu-west-1.amazonaws.com/indigos/IndigosInstaller+1.65+(Dnevnik).exe';

$MESS['INDEX_PAGE'] = 'Главная';
$MESS['TO_INDEX'] = 'Вернуться в магазин';

$MESS['ALSO_BUY'] = 'Похожие материалы';

$MESS['URL_EULA'] = '/about/EULA/';


// AJAX
	// Запрос к странице был сделан ajax?
	if ( isset( $_REQUEST ) AND isset( $_REQUEST['isAjax'] ) AND $_REQUEST['isAjax'] == 'Y' ) {

		define('STOP_STATISTICS', TRUE);
		define('IS_AJAX', TRUE);

	} else {

		define('IS_AJAX', FALSE);

	}





/* Типы устройства */
	$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

	define('IS_IPHONE', ( strpos ( $user_agent, 'iPhone' ) !== FALSE ) );
	define('IS_IPAD', ( strpos ( $user_agent, 'iPad' ) !== FALSE ) );


//Custom page on 404 status
AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if(
        !defined('ADMIN_SECTION') &&
        defined("ERROR_404") &&
        file_exists($_SERVER["DOCUMENT_ROOT"]."/404.php")
    ) {
        LocalRedirect("/404.php", "404 Not Found");
//        global $APPLICATION;
//        $APPLICATION->RestartBuffer();
//        CHTTP::SetStatus("404 Not Found");
//        include($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//        include($_SERVER["DOCUMENT_ROOT"]."/404.php");
//        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
    }
}


//Remove kernel js and css files from public + come back core.js and core_ajax.js for smart filter in C:\Bitrix\www\bitrix\templates\.default\header.php
AddEventHandler("main", "OnEndBufferContent", "deleteKernelJs");
AddEventHandler("main", "OnEndBufferContent", "deleteKernelCss");
AddEventHandler("search", "BeforeIndex", "beforeIndexHandler");

function deleteKernelJs(&$content) {
    global $USER, $APPLICATION;   // UPD1
    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;      // UPD1

    $arPatternsToRemove = Array(
        '/<script.+?src=".+?kernel_main\/kernel_main\.js\?\d+"><\/script\>/',
        '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
        '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
        '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
    );

    $content = preg_replace($arPatternsToRemove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n\n", $content);
}

function deleteKernelCss(&$content) {
    global $USER, $APPLICATION;      // UPD1
    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;      // UPD1

    $arPatternsToRemove = Array(
        '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+"[^>]+>/',
    );

    $content = preg_replace($arPatternsToRemove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n\n", $content);
}

function beforeIndexHandler($arFields){
    if (($arFields['MODULE_ID'] == 'iblock') && (in_array($arFields['PARAM2'], array(11, 9)))){
        $dbr = CIBlockElement::GetList(array(), array("ID" => $arFields['ITEM_ID']));
        if ($row = $dbr->GetNextElement()){
            $fields = array(
                "SUBJECT", "PUBLISHER", "POSTAVSHIK", "CLASS"
            );
            $properties = $row->GetProperties();
            $allIds = array();
            foreach ($fields as $field){
                if (!array_key_exists($field, $properties)){
                    continue;
                }
                $property = $properties[$field];
                if ($property['MULTIPLE'] == 'Y'){
                    if (!empty($property['VALUE'])){
                        $allIds = array_merge($allIds, $property['VALUE']);
                    }
                }
                elseif ($property['VALUE']){
                    $allIds[] = $property['VALUE'];
                }
            }
            $resS = CIBlockElement::GetList(array(),array("ID" => $allIds), false, false, array("ID", "IBLOCK_ID", "SEARCHABLE_CONTENT"));
            while ($el = $resS->GetNext()){
                if (trim($el['SEARCHABLE_CONTENT'])){
                    $arFields['BODY'] .= " \n".$el['SEARCHABLE_CONTENT'];
                }
            }
        }
    }
    return $arFields;
}

/* Страницы */
$currentPage = $APPLICATION->GetCurPage ( TRUE );

	/* Главная страница */
	define("PAGE_IS_MAIN", ( $currentPage == '/index.php' ) ? TRUE : FALSE );

	/* Cтраница пакета */
	define("PAGE_IS_BOOKSHELF", CSite::InDir("/bookshelf/") );

require_once __DIR__.'/Img.php';

//формируем номер заказа при заполнении заявки
AddEventHandler('form', 'onBeforeResultAdd', 'my_onBeforeResultAdd');
function my_onBeforeResultAdd($WEB_FORM_ID, $arFields, $arrVALUES)
{
    global $APPLICATION;

    // действие обработчика распространяется только на форму с ID=3
    if ($WEB_FORM_ID == 3)
    {
        CModule::IncludeModule("form");
        $rsField = CFormField::GetBySID('order_num');
        $arField = $rsField->Fetch();
        $rsAnswers = CFormAnswer::GetList(
            $arField['ID'],
            $by="s_id",
            $order="desc"
        );
        $arAnswer = $rsAnswers->Fetch();
        //счетчик заказов
        $countOrderNum=COption::GetOptionInt("form", "dpi_count_order_num");
        $countOrderNum++;
        COption::SetOptionInt("form", "dpi_count_order_num", $countOrderNum);
        $arrVALUES['form_text_'.$arAnswer['ID']]=$countOrderNum;
        ?><pre><?print_r($arrVALUES)?></pre><?
    }
}


//создание и заполнение поля сортировки у ИБ учебники из ИБ Лендинги (из поля ID_SORT)
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("IdSort", "OnAfterIBlockElementUpdateHandler"));

class IdSort
{
    // создаем обработчик события "OnAfterIBlockElementUpdate"
    function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        $res = CIBlock::GetByID($arFields["IBLOCK_ID"]);
        $ar_res = $res->GetNext();
        if($ar_res['CODE']=='landing_school'){
            $properties = CIBlockProperty::GetList(Array("sort"=>"asc"), Array( "CODE"=>"ID_SORT"));
            if ($prop_fields = $properties->GetNext())
            {
                $propLandIdList=$prop_fields['ID'];
            }
            reset($arFields['PROPERTY_VALUES'][$propLandIdList]);
            $tmpIdList=current($arFields['PROPERTY_VALUES'][$propLandIdList]);
            //если список id существует
            if(strlen(trim($tmpIdList['VALUE']['TEXT']))){
                        $arContId=explode(',', trim($tmpIdList['VALUE']['TEXT']));

                        $properties = CIBlockProperty::GetList(Array("sort"=>"asc"), Array("CODE"=>"SORT".$arFields["ID"]));
                        if($prop_fields = $properties->GetNext()){
                            //уже есть, надо сбросить
                            CIBlockProperty::Delete($prop_fields["ID"]);
                        }

                            //надо создать
                            $arrFields = Array(
                                "NAME" => "SORT".$arFields["ID"],
                                "ACTIVE" => "Y",
                                "SORT" => "999999",
                                "CODE" => "SORT".$arFields["ID"],
                                "PROPERTY_TYPE" => "N",
                                "IBLOCK_ID" => 9
                               );

                            $ibp = new CIBlockProperty;
                            $PropID = $ibp->Add($arrFields);

                            //забрать из $arFields список contid, прописать в созданное св-во с условием - первыы с большим номером
                            $num=count($arContId);
                            foreach($arContId as $cid){
                                $arFilter = Array(
                                    "IBLOCK_ID"=>9,
                                    "ACTIVE"=>"Y",
                                    "PROPERTY_CID"=>$cid
                                );
                                $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);
                                if($arEl = $res->GetNext())
                                {
                                    CIBlockElement::SetPropertyValueCode($arEl['ID'], 'SORT'.$arFields["ID"], $num);
                                    $num--;
                                }
                            }

                    }

                    ?><pre><?print_r($arContId)?></pre><?
                    //die();
        }
    }
}
//OnOrderPaySendEmail
AddEventHandler("sale", "OnOrderPaySendEmail", "MyOnOrderPaySendEmail");

function MyOnOrderPaySendEmail($ID, &$eventName, &$arFields)
{
    $payUser='';
    $paySumm='';
    $orderList='';
    $messForManager='Заказ подтвержден покупателем к доставке курьерской компанией и оплатой при получении.';

    if (CModule::IncludeModule("sale")){
            $arBasketItems = array();

            $dbBasketItems = CSaleBasket::GetList(
                array(
                    "NAME" => "ASC"
                ),
                array(
                    "ORDER_ID" => $ID
                ),
                false,
                false,
                array("*")
            );
            while ($arItems = $dbBasketItems->Fetch())
            {
                if(strlen($payUser)<1){
                    if($arItems["ORDER_PAYED"]=='Y'){
                        $messForManager='Заказ оплачен, доставка - самовывоз.';
                    }
                    $arFields["USER_ID"]=$arItems["USER_ID"];
                    $rsUser = CUser::GetByID($arItems["USER_ID"]);
                    $arUser = $rsUser->Fetch();
                    $payUser=$arUser["NAME"]." ".$arUser["LAST_NAME"];
                    $paySumm= $arItems["ORDER_PRICE"];
                }
                $orderList.=$arItems["PRODUCT_ID"]." ".$arItems["NAME"].PHP_EOL;
                $arBasketItems[] = $arItems;
            }
        $arFields["PAY_USER"]=$payUser;
        $arFields["ORDER_LIST"]=$orderList;
        $arFields["ORDER_SUM"]=$paySumm;
        $arFields["MESS_FOR_MANAGER"]=$messForManager;

    }

    //file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/OnOrderPaySendEmail.txt", "payUser=".$payUser.";orderList=".$orderList.";".print_r($arFields, true));
}

AddEventHandler("main", "OnBeforeProlog", "MyOnBeforePrologHandler");

function MyOnBeforePrologHandler()
{
    global $USER;
    if(substr_count($_SERVER['SCRIPT_FILENAME'], '/bitrix/admin/import_ek.php')!=false || substr_count($_SERVER['SCRIPT_FILENAME'], '/bitrix/admin/import.php')!=false){
        global $USER;
        echo $USER->Authorize(1);
    }
}

//проверки от даты
$lastDataCheck=COption::GetOptionInt("iblock", "lastDataCheck");
$curData=ConvertDateTime(ConvertTimeStamp(time(), SHORT), "YYYYMMDD", "ru");
if($curData>$lastDataCheck){
    //обновляеем дату проверки
    COption::SetOptionInt("iblock", "lastDataCheck", $curData);
    //снимаем чекбоксы у самых старых, но в любом случае должно остаться не меньше 4х
    //если осталось только 4, то шлем письмо
    function PROP_N($param){
        CModule::IncludeModule("iblock");
        $arPropPop=array();
        $arFilter = Array(
            "IBLOCK_CODE"=>"books",
            "PROPERTY_".$param."_VALUE" =>"Y",
            "ACTIVE"=>"Y"
        );
        $res = CIBlockElement::GetList(Array("TIMESTAMP_X"=>"ASC"), $arFilter);
        while($ar_fields = $res->GetNext())
        {
            $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "sort", "asc", array("CODE" => $param));
            if ($ob = $resProp->GetNext())
            {
                $arPropPop[ConvertDateTime($ar_fields["TIMESTAMP_X"], "YYYYMMDD", "ru")][] = array(
                    "BID" => $ar_fields["IBLOCK_ID"],
                    "ID" => $ar_fields["ID"]
                );
            }
        }
        $arFilter["IBLOCK_CODE"]="items";
        $res = CIBlockElement::GetList(Array("TIMESTAMP_X"=>"ASC"), $arFilter);
        while($ar_fields = $res->GetNext())
        {
            $resProp = CIBlockElement::GetProperty($ar_fields["IBLOCK_ID"], $ar_fields["ID"], "sort", "asc", array("CODE" => $param));
            if ($ob = $resProp->GetNext())
            {
                $arPropPop[ConvertDateTime($ar_fields["TIMESTAMP_X"], "YYYYMMDD", "ru")][]  = array(
                    "BID" => $ar_fields["IBLOCK_ID"],
                    "ID" => $ar_fields["ID"]
                );
            }
        }
        ksort($arPropPop);
        $arTmpProp=array();
        foreach($arPropPop as $key=>$prop){
            foreach($prop as $p){
                $arTmpProp[]=array_merge(array("TIMESTAMP_X"=>$key),$p);
            }
        }
        $limitEk=10;
        $cntProp=count($arTmpProp);
        $dCnt=$cntProp-$limitEk;
        if($dCnt<$limitEk){
            //отправить письмо
            //echo "<br>mail send";
        }
        if($dCnt>$limitEk)$dCnt=$limitEk;
        //убираем чекбоксы, так, что бы осталось $limitEk
        for($i=0;$i<$dCnt;$i++){
            CIBlockElement::SetPropertyValues($arTmpProp[$i]["ID"], $arTmpProp[$i]["BID"], "", $param);
        }


    }
    PROP_N("N_POP");PROP_N("N_HIT");PROP_N("N_OFFER");
}
AddEventHandler("main", "OnAfterUserAdd", "addUserCorporate");
AddEventHandler("main", "OnBeforeUserUpdate",  "addUserCorporate");
    // Возвращает группу по символьному идентификатору
    function GetGroupByCode ($code)
    {
        $rsGroups = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => $code));
        return $rsGroups->Fetch();
    }

// создаем обработчик события "OnBeforeUserUpdate"
    function addUserCorporate(&$arFields)
    {

        $arGroupsNew=array();
        foreach($arFields['GROUP_ID'] as $gr){
            $arGroupsNew[]=$gr['GROUP_ID'];
        }
        $arGroupsOld = CUser::GetUserGroup($arFields["ID"]);
        $idCorpGr=GetGroupByCode('corporate');
//        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/OnAfterUserAdd.txt",print_r($arFields, true).print_r($_REQUEST,true));
        if((in_array($idCorpGr["ID"],$arGroupsNew) && !in_array($idCorpGr["ID"], $arGroupsOld)) || $_REQUEST["GROUP_CODE"] == "corporate")
        {

            echo "User add in corporate group<br>";
            CModule::IncludeModule("iblock");
            $res_ib = CIBlock::GetList(
                Array(),
                Array(
                    'TYPE'=>'corporate',
                    'ACTIVE'=>'Y',
                    "CODE"=>'corporate_details',
                    "CHECK_PERMISSIONS" => "N"
                )
            );
            $ar_res_ib = $res_ib->GetNext();
            echo $BID=$ar_res_ib['ID'];

            $arFilter = Array(
                "IBLOCK_ID"=>$BID,
                "ACTIVE"=>"Y",
                "CODE"=>"USER_".$arFields["ID"]
            );
            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);
            if($ar_fields = $res->GetNext())
            {
                echo $ar_fields["NAME"]."<br>";
            }
            else
            {
                $el = new CIBlockElement;

                $arLoadProductArray = Array(
                    "MODIFIED_BY"    => $arFields["ID"], // элемент изменен текущим пользователем
                    "IBLOCK_ID"      => $BID,
                    "NAME"           => "noname",
                    "CODE"           => "USER_".$arFields["ID"],
                    "ACTIVE"         => "Y"            // активен
                );

                if($resAdd=$el->Add($arLoadProductArray))$n=$resAdd;
                else $n=$el->LAST_ERROR;
            }
            //file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/OnAfterUserAdd.txt",print_r($arFields, true).print_r($_REQUEST,true).$BID.print_r($ar_fields,true).$n);
        }
    }
