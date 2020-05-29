<?php
//регистрация лида в системе
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
        //получаем группу лида и курса
        //получаем id группы ЛИДЫ, Студенты и КУРС
//        $rsLids = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'lids'));
//        $arLids=$rsLids->Fetch();
//        $rsStud = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'students'));
//        $arStud=$rsStud->Fetch();
//        $rsCourse = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => $_REQUEST['COURSE']));
//        $arCourse=$rsCourse->Fetch();
        //проверяем, есть ли такой пользователь в системе
//        global $USER;
//        $filter = Array("EMAIL" => $_REQUEST['EMAIL']);
//        $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
//        if($arUser = $rsUsers->Fetch()) {
//            //есть такой, проверяем группы
//            $arGroups = CUser::GetUserGroup($arUser["ID"]);
//            if(in_array($arStud["ID"],$arGroups)){
//                //уже обучается
//                if(in_array($arCourse["ID"],$arGroups)){
                    //уже оплатил этот курс
                    //письмо с уведомлением и ссылкой в ЛК,
                    //промо предложением и ссылкой на восстановление пароля
//                }
//            }
//
//        }else{
//            //готовим $checkword
//            echo "<br>ch: "; echo $checkword = randString(8);
//            echo "<br>sl: "; echo$salt = randString(8);
//            //создаем лида
//            $user = new CUser;
//            $arFields = Array(
//                "EMAIL"             => $_REQUEST['EMAIL'],
//                "LOGIN"             => $_REQUEST['EMAIL'],
//                "LID"               => "s1",
//                "ACTIVE"            => "Y",
//                "GROUP_ID"          => array($arLids["ID"]),
//                "CHECKWORD"         => $salt.md5($salt.$checkword),
//                "PASSWORD"          => "!Aa123456",
//                "CONFIRM_PASSWORD"  => "!Aa123456"
//            );
//
//            echo "<br>md: "; echo $arFields["CHECKWORD"];echo "<br>";
//            $ID = $user->Add($arFields);
//            if (intval($ID) > 0)
//            {
//                echo "Пользователь успешно добавлен.";
//                //добавим CHECKWORD
//                $strSql = "UPDATE b_user SET ".
//                    "	CHECKWORD = '".$salt.md5($salt.$checkword)."', ".
//                    "	CHECKWORD_TIME = ".$DB->CurrentTimeFunction().", ".
//                    "	LID = '".$DB->ForSql('s1', 2)."' ".
//                    "WHERE ID = '".$ID."'".
//                    "	AND (EXTERNAL_AUTH_ID IS NULL OR EXTERNAL_AUTH_ID='') ";
//
//                $DB->Query($strSql, false, "FILE: ".__FILE__."<br> LINE: ".__LINE__);
//                //письмо с приглашением в личный кабинет
//                //промо предложением и предложением оплатить курс $arCourse["ID"]
//                //ОТПРАВИТЬ В ПИСЬМЕ $checkword
//                $event = new CEvent;
//                $arPFields = Array(
//                    "COURSE_NAME" => $arCourse["NAME"],
//                    "USER_CHECKWORD" => $checkword,
//                    "USER_LOGIN"=>$_REQUEST['EMAIL'],
//                    "USER_EMAIL"=>$_REQUEST['EMAIL']
//                );
//                $event->Send("COURSE_SUBSCRIBE", "s1", $arPFields);
//                //создаем служебные элементы и разделы ИБ
//                //1.Тему форума для чата
//                CModule::IncludeModule("forum");
//                $topic_id=CForumTopic::Add(
//                    array(
//                        'TITLE' => $_REQUEST['EMAIL'],
//                        'USER_START_NAME' => $_REQUEST['EMAIL'],
//                        "LAST_POSTER_NAME" => 'Администратор',
//                        'FORUM_ID' => FORUM_CHAT_ID
//                    )
//                );
//                //1.2 Приветственное сообщение
//                $arMFields = Array(
//                    "POST_MESSAGE" => "Здравствуйте! Здесь вы можете задавать любые вопросы.",
//                    "USE_SMILES" =>  "N",
//                    "APPROVED" => "Y",
//                    "AUTHOR_NAME" => "Администратор",
//                    "AUTHOR_ID" => 1,
//                    "FORUM_ID" => FORUM_CHAT_ID,
//                    "TOPIC_ID" => $topic_id,
//                    "NEW_TOPIC" => "Y"
//                );
//                $mess_id = CForumMessage::Add($arMFields);
//                //2 Раздел статистики
//                CModule::IncludeModule("iblock");
//                $bs = new CIBlockSection;
//                $arSFields = Array(
//                    "ACTIVE" => "Y",
//                    "IBLOCK_ID" => STAT_IBLOCK_ID,
//                    "NAME" => $_REQUEST['EMAIL'],
//                );
//                    $statSecId = $bs->Add($arSFields);
//                //3 Раздел расчетов
//                $bc = new CIBlockSection;
//                $arCFields = Array(
//                    "ACTIVE" => "Y",
//                    "IBLOCK_ID" => CALC_IBLOCK_ID,
//                    "NAME" => $_REQUEST['EMAIL'],
//                );
//                $calcSecId = $bc->Add($arCFields);
//                //4 Раздел документов
//                $bd = new CIBlockSection;
//                $arDFields = Array(
//                    "ACTIVE" => "Y",
//                    "IBLOCK_ID" => DOCS_IBLOCK_ID,
//                    "NAME" => $_REQUEST['EMAIL'],
//                );
//                $docsSecId = $bd->Add($arDFields);
//                //5. Получим ID курса
//                $arFilter = Array(
//                    "IBLOCK_ID"=>COURSE_IBLOCK_ID,
//                    "ACTIVE"=>"Y",
//                    "CODE"=>$_REQUEST["COURSE"]
//                );
//                $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);
//                $ar_fields = $res->GetNext();
//                $course_id = $ar_fields["ID"];
//
//                //6. Главный елемент Лида
//                $el = new CIBlockElement;
//
//                $PROP = array(
//                    "142"=> $ID,
//                    "143"=>$topic_id,
//                    "144"=>$statSecId,
//                    "145"=>$course_id,
//                    "147"=>$calcSecId,
//                    "148"=>$docsSecId
//                );
//
//                $arLoadProductArray = Array(
//                    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
//                    "IBLOCK_ID"      => MAIN_IBLOCK_ID,
//                    "PROPERTY_VALUES"=> $PROP,
//                    "NAME"           => $_REQUEST['EMAIL'],
//                    "ACTIVE"         => "Y"            // активен
//                );
//
//                $PRODUCT_ID = $el->Add($arLoadProductArray);
//                COption::SetOptionInt("iblock", "main_eid_for_uid_".$ID, $PRODUCT_ID);
//            }
//            else
//            {
//                echo $user->LAST_ERROR;
//            }
//
//        }
//
$_SESSION["lid"]["email"]=$_REQUEST['EMAIL'];
$_SESSION["lid"]["packet"]=$_REQUEST['packet'];
$_SESSION["lid"]["new"]=1;
?>
<pre><?print_r($_REQUEST)?></pre>