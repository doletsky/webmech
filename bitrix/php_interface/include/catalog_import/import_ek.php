<?
$dtm=time();
ini_set('log_errors','on');
ini_set('error_log', $_SERVER['DOCUMENT_ROOT']."/logs/debug_import_error.txt");
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/debug_import.txt", print_r($_POST, true));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
class IdLib {

    var $code;
    var $key;
    var $nameKey;
    var $arParam=array();

    function getIdLib($f=true){
        $arFilter = Array(
            "IBLOCK_CODE"=>$this->code,
            $this->nameKey=>$this->key
        );
        if($f)$arFilter["ACTIVE"]="Y";

        $arSelect=array(
            "ID",
            "IBLOCK_ID",
            "IBLOCK_CODE",
            "NAME",
            "PROPERTY_*"
        );
        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
        if($ar_fields = $res->GetNext()){
            $this->arParam=$ar_fields;
            return $ar_fields["ID"];
        }
        else{
            $res = CIBlock::GetList(Array(),Array('CODE'=>$this->code))->Fetch();
            $this->arParam=array("IBLOCK_ID"=>$res["ID"]);
            return false;
        }
    }
    function saveIdLib(){
        $el = new CIBlockElement;
        $arFields=$this->arParam;
        if(is_set($arFields["ID"])&&$arFields["ID"]>0){
            //update
            $PRODUCT_ID = $arFields["ID"];
            unset($arFields["ID"]);
            $res = $el->Update($PRODUCT_ID, $arFields);
            return $PRODUCT_ID;
        }
        else{
            //create
            if($PRODUCT_ID = $el->Add($arFields))
                return $PRODUCT_ID;
            else
                return false;
        }

    }

    function propIdLib(){
        $res = CIBlockProperty::GetByID($this->nameKey, false, $this->code);
        if($ar_res = $res->GetNext()){
            $this->arParam=$ar_res;
            return true;
        }
        else{
            return false;
        }
    }

    function enumIdLib(){
        $arEnumProp=array();
        $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_CODE"=>$this->code, "CODE"=>$this->nameKey));
        while($enum_fields = $property_enums->GetNext())
        {
            $arEnumProp[$enum_fields["XML_ID"]] = $enum_fields;
        }
        if(count($arEnumProp)>0){
            $this->arParam=$arEnumProp;
            return true;
        }
        else return false;
    }
}
/**
 * Created by PhpStorm.
 * User: adoletskiy
 * Date: 23.09.14
 * Time: 16:11
 * файл принимает $_POST данные о ЕК и создает или обновляет элемент ИБ #9
 */

$li=new IdLib;

//массив свойств и полей EK
$PROP = array();

$PROP["CID"] = $_POST["cont_ID"];//cont.ИД

//привязка к элементам

//класс и возраст
$arCY=explode(";", $_POST["cont_Required_for_promotion:__Класс"]);
$li->code="classes";
$li->nameKey="NAME";
foreach($arCY as $itemCY){
    $item=explode("|", $itemCY);
    $li->key=$item[0];
    $idCY=$li->getIdLib();
    if(strpos($item[0],"класс")!==false)$PROP["CLASS"][] = array("VALUE"=>$idCY);
    else $PROP["YEAR"][] = array("VALUE"=>$idCY);
}
//авторы
if(strlen($_POST["cont_Авторы"])>0){
    $arAutors=explode(";", $_POST["cont_Авторы"]);
    $li->code="autors";
    $li->nameKey="PROPERTY_GUID";
    foreach($arAutors as $itemAutors){
        $item=explode("|", $itemAutors);
        $li->key=$item[1];
        $idAutor=$li->getIdLib();
        $arResult=$li->arParam;
        if($item[0]!=$arResult['NAME']){
        //требуется коррекция $arResult['NAME']
            $arResult['NAME']=$item[0];
            $arResult["PROPERTY_VALUES"]["GUID"]=$item[1];
            $li->arParam=$arResult;
            $idAutor=$li->saveIdLib();
        }
        $PROP["AUTORS"][] = array("VALUE"=>$idAutor);
    }
}
//предмет
$arSubjects=explode(";", $_POST["cont_Required_for_Promotion:_Предмет"]);
$arAddSubj=explode(";", $_POST["subject_info"]);
$addSubj=array();
foreach($arAddSubj as $addS){
    $sItem=explode("|",$addS);
    if(count($sItem)==3)$sItem[3]=1000;//если индекс сортировки из SPS не пришел, то ставим по умолчанию 1000
    $addSubj[$sItem[1]]=$sItem;
}
$li->code="subject";
$li->nameKey="PROPERTY_GUID";
foreach($arSubjects as $itemSubjects){
    $item=explode("|", $itemSubjects);
    $li->key=$item[1];
    $idSubject=$li->getIdLib();
    $arResult=$li->arParam;
    foreach($arResult as $key=>$res){
        if(substr_count($key, "~")==0&&substr_count($key, "PROPERTY_")>0){
            $idp=str_replace("PROPERTY_", "", $key);
            if($res!=$item[1]) $idSubjType=$idp;
        }
    }
    if($item[0]!=$arResult['NAME']||$addSubj[$item[1]][2]!=$arResult['PROPERTY_'.$idp]||$addSubj[$item[1]][3]!=$arResult['SORT']){
        //требуется коррекция $arResult['NAME']
        $arResult['NAME']=$item[0];
        $arResult["PROPERTY_VALUES"]["SUBJECT_TYPE"]=$addSubj[$item[1]][2];// пренадлежность к торговой площадке
        $arResult["PROPERTY_VALUES"]["GUID"]=$item[1];
        $arResult['SORT']=$addSubj[$item[1]][3];//индекс сортировки предметов из SPS
        //if(!$idSubject){
        //    $arResult["PROPERTY_VALUES"]["GUID"]=$item[1];
        //}
        $li->code="subject";
        $li->nameKey="PROPERTY_GUID";
        $li->arParam=$arResult;
        $idSubject=$li->saveIdLib();
    }
    $PROP["SUBJECT"][] = array("VALUE"=>$idSubject);
}

//Тип площадки
$into=array("2"=>"Развитие", "3"=>"Развлечение", "1"=>"Обучение");
$li->code="books";
$li->nameKey="ITEM_TYPE";
if($li->enumIdLib()){
    $arEnumItemType=$li->arParam;
}
foreach($addSubj as $tp){
    $arTP[$tp[2]]=$into[$tp[2]];
}
foreach($arEnumItemType as $eItemType){
    if(in_array($eItemType["VALUE"],$arTP)){
        $PROP["ITEM_TYPE"][] = array("VALUE"=>$eItemType["ID"]);
    }
}
//???$PROP["ITEM_TYPE"] = "";

//Образовательный тип
$arEdTypes=explode(";", $_POST["cont_Образовательный_тип"]);
$li->code="ed_types";
$li->nameKey="PROPERTY_GUID";
foreach($arEdTypes as $itemEdTypes){
    $item=explode("|", $itemEdTypes);
    $li->key=$item[1];
    $idEdType=$li->getIdLib();
    $arResult=$li->arParam;
    if($item[0]!=$arResult['NAME']){
        //требуется коррекция $arResult['NAME']
        $arResult['NAME']=$item[0];
            $arResult["PROPERTY_VALUES"]["GUID"]=$item[1];
        $li->arParam=$arResult;
        $idEdType=$li->saveIdLib();
    }
    $PROP["ED_TYPE"][] = array("VALUE"=>$idEdType);
}


//серии
if(strlen($_POST["series_Идентификатор_GUID"])>0){
    $serSuplier=0;
    $serID=0;
        $li->code="series";
        $li->nameKey="PROPERTY_SID";
        if($li->propIdLib()){
            $arSid=$li->arParam;
        }

    $li->code="series";
    $li->nameKey="PROPERTY_GUID";
    $li->key=$_POST["series_Идентификатор_GUID"];
    $idSerie=$li->getIdLib();
    $arResult=$li->arParam;
        $serID=$arSid["ID"];
        foreach($arResult as $key=>$res){
            if(substr_count($key, "~")==0&&substr_count($key, "PROPERTY_")>0){
                $idp=str_replace("PROPERTY_", "", $key);
                if($res!=$_POST["series_Идентификатор_GUID"]&&$idp!=$arSid["ID"]) $serSuplier=$res;
            }
        }
    if($_POST["series_Имя"]!=$arResult['NAME']||$_POST["series_ИД"]!=$serID||$_POST["series_Required_for_upload:__Поставщик"]!=$serSuplier){
            //требуется коррекция $arResult['NAME']
        $arResult['NAME']=$_POST["series_Имя"];
        $arResult["PROPERTY_VALUES"]["SID"]=$_POST["series_ИД"];
        $se=new IdLib;
        $se->code="postavshik";
        $se->nameKey="PROPERTY_BID";
        $se->key=$_POST["series_Required_for_upload:__Поставщик"];
        $idSSupl=$se->getIdLib();
        $arResult["PROPERTY_VALUES"]["PROPERTY_".$serSuplier]=array("VALUE"=>$idSSupl);
        $arResult["PROPERTY_VALUES"]["GUID"]=$_POST["series_Идентификатор_GUID"];
            $li->arParam=$arResult;
            $idSerie=$li->saveIdLib();
        }
        $PROP["SERIES"] = array("VALUE"=>$idSerie);
}
//поставщик
$li->code="postavshik";
$li->nameKey="PROPERTY_GUID";
$li->key=$_POST["supplier_Идентификатор_GUID"];
$idSupl=$li->getIdLib();
$arResult=$li->arParam;
foreach($arResult as $key=>$res){
    if(substr_count($key, "~")==0&&substr_count($key, "PROPERTY_")>0){
        $idp=str_replace("PROPERTY_", "", $key);
        if($res!=$_POST["supplier_Идентификатор_GUID"]) $supID=$idp;
    }
}
if($_POST["supplier_VendorDisplayName"]!=$arResult['NAME']||$_POST["supplier_ИД"]!==$arResult['PROPERTY_'.$idp]){
    //требуется коррекция $arResult['NAME']
    $arResult['NAME']=$_POST["supplier_VendorDisplayName"];
    $arResult["PROPERTY_VALUES"]["BID"]=$_POST["supplier_ИД"];
        $arResult["PROPERTY_VALUES"]["GUID"]=$_POST["supplier_Идентификатор_GUID"];
    $li->arParam=$arResult;
    $idSupl=$li->saveIdLib();
}
$PROP["POSTAVSHIK"] = array("VALUE"=>$idSupl);

if(1){

//издательство строка
$PROP["PUBLISHER"] = $_POST["st_Поставщик:_Издательство"];
$PROP["GUID"] = $_POST["cont_Идентификатор_GUID"];

    $arTheory=explode(";", $_POST["cont_Изложение_теории"]);
    foreach($arTheory as $Theory){
        $item=explode("|", $Theory);
        $li->code="books";
        $li->nameKey="THEORY";
        if($li->enumIdLib()){
            $arEnumTheory=$li->arParam;
            foreach($arEnumTheory as $eTheory){
                if($eTheory["VALUE"]==$item[0]){
                    $PROP["THEORY"] = array("VALUE"=>$eTheory["ID"]);
                }
            }

        }
    }
$PROP["FEATURE"] = array("VALUE"=>array("TYPE"=>"HTML", "TEXT"=>$_POST["cont_Фича_(особенность)"]));
$PROP["EXER_CNT"] = $_POST["cont_Количество_упражнений"];

    $arLimit=explode(";", $_POST["st_Ограничения:_Возрастное_ограничение"]);
    foreach($arLimit as $Limit){
        $item=explode("|", $Limit);
        $li->code="books";
        $li->nameKey="OGRANICHENIYA";
        if($li->enumIdLib()){
            $arEnumLimit=$li->arParam;
            foreach($arEnumLimit as $eLimit){
                if($eLimit["VALUE"]==$item[0]){
                    $PROP["OGRANICHENIYA"] = array("VALUE"=>$eLimit["ID"]);
                }
            }
        }
    }



    $PROP["MARK_TEXT"] = array("VALUE"=>array("TYPE"=>"HTML", "TEXT"=>$_POST["st_Маркетинг:__Аннотация"]));

    $arLang=explode(";", $_POST["cont_Required_for_Promotion:__Язык"]);
    foreach($arLang as $lang){
        $item=explode("|", $lang);
        $li->code="books";
        $li->nameKey="LANG";
        if($li->enumIdLib()){
            $arEnumLang=$li->arParam;
            foreach($arEnumLang as $eLang){
                if($eLang["VALUE"]==$item[0]){
                    $PROP["LANG"][] = array("VALUE"=>$eLang["ID"]);
                }
            }
        }
    }

//$PROP["PROP_16"] = "";//Область применения


$PROP["PROP_29"] = $_POST["st_Идентификатор_GUID"];//st.Идентификатор GUID


    $arContType=explode(";", $_POST["st_Хранилище:_Тип_контента"]);
    foreach($arContType as $ContType){
        $item=explode("|", $ContType);
        $li->code="books";
        $li->nameKey="CONTENT_TYPE";
        if($li->enumIdLib()){
            $arEnumContType=$li->arParam;
            foreach($arEnumContType as $eContType){
                if($eContType["VALUE"]==$item[0]){
                    $PROP["CONTENT_TYPE"] = array("VALUE"=>$eContType["ID"]);
                }
            }

        }
    }

$PROP["PROP_55"] = $_POST["st_Поставщик:__Уникальный_индентификатор_контента"];//st.Поставщик:  Уникальный индентификатор контента

$PROP["END_LICENSE"] = $_POST["st_Срок_действия_лицензии"];//st.Срок действия лицензии
    $PROP["HIT"] = array("VALUE"=>"");
    $arHit=explode(";", $_POST["st_Оценка"]);
    foreach($arHit as $hit){
        $item=explode("|", $hit);
        $li->code="books";
        $li->nameKey="HIT";
        if($li->enumIdLib()){
            $arEnumHit=$li->arParam;
            foreach($arEnumHit as $eHit){
                if($eHit["VALUE"]=="Обычный")$defHit=$eHit["ID"];
                if($eHit["VALUE"]==$item[0]){
                    $PROP["HIT"] = array("VALUE"=>$eHit["ID"]);
                }
            }

        }
    }
    if(count($PROP["HIT"])<=0)$PROP["HIT"] = array("VALUE"=>$defHit);

if(strlen($_POST["screenshot_ids"])>0){
    $arScreens=explode(",", $_POST["screenshot_ids"]);
    foreach($arScreens as $scr){
        $PROP["SCREEN_IDS"][] = array("VALUE"=>$scr);
    }
}

$PROP["DEMO_LINK"] = $_POST["st_Стартовый_файл_(демо)"];//Демо-виджет


    $arCont=explode("\n",trim($_POST["cont_TOC"],"\n"));
    $PROP["CONTENT"] = array("VALUE"=>array("TYPE"=>"HTML", "TEXT"=>"<ul><li>".implode("</li><li>",$arCont)."</li></ul>"));

    $arPlatform=explode(";", $_POST["st_Поставщик:_Платформа"]);
    foreach($arPlatform as $Platform){
        $item=explode("|", $Platform);
        $li->code="books";
        $li->nameKey="PLATFORM";
        if($li->enumIdLib()){
            $arEnumPlatform=$li->arParam;
            foreach($arEnumPlatform as $ePlatform){
                if($ePlatform["VALUE"]=="Windows")$idWin=$ePlatform["ID"];
                if($ePlatform["VALUE"]==$item[0]){
                    $PROP["PLATFORM"][] = array("VALUE"=>$ePlatform["ID"]);
                }
            }

        }
    }
    if(count($PROP["PLATFORM"])<=0){
        $PROP["PLATFORM"][] = array("VALUE"=>$idWin);
    }

if(strlen(trim($_POST["st_Стартовый_файл_(демо)"]))>0)$PROP["ONLOAD"] = "Y";
    else $PROP["ONLOAD"] = "";
$PROP["SHORT_NAME"] = $_POST["st_Краткое_наименование"];
$PROP["RAND"] = $_POST["rating_order"];

$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => $_POST["st_Полное_наименование"],
    "ACTIVE"         => "N",            // активен
    "DETAIL_TEXT"    => $_POST["st_Поставщик:__Аннотация"]
);
    if($_POST["cont_Контроль_качества"]=="Готов к публикации" && $_POST["st_Подготовка_к_продаже"]=="Готов к публикации")
        $arLoadProductArray["ACTIVE"]="Y";

    $li->code="books";
    $li->nameKey="PROPERTY_CID";
    $li->key=$_POST["cont_ID"];
    if($PRODUCT_ID = $li->getIdLib(false)) {
        $arLoadProductArray["ID"]=$PRODUCT_ID;
        $arTmp=$li->arParam;
        $IBLOCK_ID=$arTmp["IBLOCK_ID"];
        //сохранить все заполненные поля типа PROPERTY_SORT* - привязка к лендингам
            $resp = CIBlockElement::GetProperty($IBLOCK_ID, $PRODUCT_ID, array("sort"=>"asc"), array("CODE" => "SORT%", "EMPTY"=>"N"));
            while ($obp = $resp->GetNext())
            {
                $arLoadProductArray['PROPERTY_VALUES'][$obp["NAME"]]=$obp["VALUE"];

            }

    }
    else {
        $arLoadProductArray["ID"]=0;
        $arTmp=$li->arParam;
        $arLoadProductArray["IBLOCK_ID"]=$arTmp["IBLOCK_ID"];
    }

    $li->arParam=$arLoadProductArray;
    $elementId=$li->saveIdLib();
    //уcтановить цену из $_POST["st_Required_for_publishing:__Отпускная_цена"]
    CPrice::SetBasePrice($elementId, $_POST["st_Required_for_publishing:__Отпускная_цена"], 'RUB');
}
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/debug_import_prop.txt", $elementId.print_r($arLoadProductArray, true));