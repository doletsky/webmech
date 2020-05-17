<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
Cmodule::IncludeModule('catalog');

if($_REQUEST['catalog_start'] =='Y'){
//инициализируем список для деактивации остальных после обновления
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/catElListUpdate.txt", '');
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/import_from_1c.txt",'');
    //блокируем кнопку Оформить TODO
    COption::SetOptionInt("sale", "block_buttom_order", 0);
}
elseif($_REQUEST['catalog_end'] == 'Y'){
//сброс всех элементов, не входящих в список обновления
    $elList=file_get_contents($_SERVER['DOCUMENT_ROOT']."/logs/catElListUpdate.txt");
    $arElList=explode(',',$elList);
    $arFilter = Array(
        "IBLOCK_ID"=>24,
        "!ID"=>$arElList
    );
    $resElList = CIBlockElement::GetList(Array(), $arFilter);
    while($obElList = $resElList->GetNext())
    {
        $arQFields = array('QUANTITY' => 0);
        CCatalogProduct::Update($obElList['ID'], $arQFields);
    }
    //разблокировить кнопку Оформить TODO
    COption::SetOptionInt("sale", "block_buttom_order", 1);
}
else
{
    //проверяем - существует ли в каталоге импортируемый товар
    $arChFilter = Array(
        "IBLOCK_ID"=>24
    );
    $arChSelect=array(
        "ID", "IBLOCK_ID", "NAME", "PROPERTY_*", "CATALOG_GROUP_1", "CATALOG_QUANTITY"
    );
    if(strlen(trim($_REQUEST["articul"]))>0){
        //если у товара артикул не пустой
        $arChFilter["PROPERTY_ARTICLE"]=$_REQUEST["articul"];
    }
    else
    {
        $arChFilter["NAME"]=iconv('windows-1251', 'utf-8', $_REQUEST["name"]);
    }

    $resChList = CIBlockElement::GetList(Array(), $arChFilter, false, false, $arChSelect);
    if($obChList = $resChList->GetNextElement())
    {
        //если товар существует в каталоге
        //проверяем - обновить или нет
        $_REQUEST["price"]=$arFieldsChList['CATALOG_PRICE_1'];//отладочная строка - ИСПРАВИТЬ!!! TODO
        $arFieldsChList = $obChList->GetFields();
        $arPropsChList = $obChList->GetProperties();
        if($arPropsChList['ID_1C']['VALUE']!=$_REQUEST["id"]
            || $arPropsChList['WEIGHT']['VALUE']!=$_REQUEST["weight"]
            || $arPropsChList['VOLUME']['VALUE']!=$_REQUEST["volume"]
            || $arFieldsChList['CATALOG_QUANTITY']!=$_REQUEST["quantity"]
            || $arFieldsChList['CATALOG_PRICE_1']!=$_REQUEST["price"]){
            //надо обновить

            //обновляем свойства
            $el = new CIBlockElement;

            $PROP = array();
            foreach($arPropsChList as $key=>$val){
                $PROP[$key]=$val["VALUE"];
            }

            $PROP["ID_1C"] = $_REQUEST["id"];
            $PROP["VOLUME"] = $_REQUEST["volume"];
            $PROP["WEIGHT"] = $_REQUEST["weight"];

            $arUpLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_ID"      => 24,
                "PROPERTY_VALUES"=> $PROP,
                "NAME"           => iconv('windows-1251', 'utf-8', $_REQUEST["name"])
            );
            $res = $el->Update($arFieldsChList['ID'], $arUpLoadProductArray);

            //обновляем цену и количество
            $arPFields=array(
                "PRODUCT_ID" => $arFieldsChList['ID'],
                "CATALOG_GROUP_ID" => "1",
                "PRICE" => $_REQUEST["price"],
                "CURRENCY" => "RUB"
            );
            CPrice::Update("1", $arPFields);

            $arQFields = array('QUANTITY' => $_REQUEST["quantity"]);
            CCatalogProduct::Update($arFieldsChList['ID'], $arQFields);

            $idInList=$arFieldsChList['ID'];
        }

    }
    elseif(0)//новый товар пока не добавляем
    {

        //если товар не существует - добавляем в каталог
        $el = new CIBlockElement;

        $PROP = array();
        $PROP["ID_1C"] = $_REQUEST["id"];
        $PROP["VOLUME"] = $_REQUEST["volume"];
        $PROP["WEIGHT"] = $_REQUEST["weight"];
        $PROP["ARTICLE"] = $_REQUEST["articul"];

        $arLoadProductArray = Array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => 148, //для stage раздел DEBUG - временный раздел для новых товаров до определения
            "IBLOCK_ID"      => 24,
            "PROPERTY_VALUES"=> $PROP,
            "NAME"           => iconv('windows-1251', 'utf-8', $_REQUEST["name"]),
            "ACTIVE"         => "Y"
        );

        $PRODUCT_ID = $el->Add($arLoadProductArray);
        //добавляем цену и количество
        if(!array_key_exists("price",$_REQUEST)){$_REQUEST["price"]=0;}
            $arPFields=array(
                "PRODUCT_ID" => $PRODUCT_ID,
                "CATALOG_GROUP_ID" => "1",
                "PRICE" => $_REQUEST["price"],
                "CURRENCY" => "RUB"
            );
            CPrice::Add($arPFields);



        $arQFields = array("ID" => $PRODUCT_ID,'QUANTITY' => $_REQUEST["quantity"]);
        $flag=CCatalogProduct::Add($arQFields);
        $strFLog=file_get_contents($_SERVER['DOCUMENT_ROOT']."/logs/import_from_1c.txt");
        file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/import_from_1c.txt", $strFLog.print_r(array_merge(array('time'=>ConvertTimeStamp(time(),'FULL'),'ID'=>$PRODUCT_ID,'flagQuantity'=>$flag),$_REQUEST), true));
        $idInList=$PRODUCT_ID;

    }
    //добавляем id товара в список для деактивации остальных
    $elList=file_get_contents($_SERVER['DOCUMENT_ROOT']."/logs/catElListUpdate.txt");
    $elList.=','.$idInList;
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/catElListUpdate.txt", $elList);
}



$USER->Logout();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>