<?php
//����������� ���� � �������
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
        //�������� ������ ���� � �����
        //�������� id ������ ����, �������� � ����
        $rsLids = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'lids'));
        $arLids=$rsLids->Fetch();
        $rsStud = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => 'students'));
        $arStud=$rsStud->Fetch();
        $rsCourse = CGroup::GetList ($by = "c_sort", $order = "asc", Array ("STRING_ID" => $_REQUEST['COURSE']));
        $arCourse=$rsCourse->Fetch();
        //���������, ���� �� ����� ������������ � �������
        global $USER;
        $filter = Array("EMAIL" => $_REQUEST['EMAIL']);
        $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
        if($arUser = $rsUsers->Fetch()) {
            //���� �����, ��������� ������
            $arGroups = CUser::GetUserGroup($arUser["ID"]);
            if(in_array($arStud["ID"],$arGroups)){
                //��� ���������
                if(in_array($arCourse["ID"],$arGroups)){
                    //��� ������� ���� ����
                    //������ � ������������ � ������� � ��,
                    //����� ������������ � ������� �� �������������� ������
                }
            }

        }else{
            //������� $checkword
            echo "<br>ch: "; echo $checkword = randString(8);
            echo "<br>sl: "; echo$salt = randString(8);
            //������� ����
            $user = new CUser;
            $arFields = Array(
                "EMAIL"             => $_REQUEST['EMAIL'],
                "LOGIN"             => $_REQUEST['EMAIL'],
                "LID"               => "s1",
                "ACTIVE"            => "Y",
                "GROUP_ID"          => array($arLids["ID"]),
                "CHECKWORD"         => $salt.md5($salt.$checkword),
                "PASSWORD"          => "!Aa123456",
                "CONFIRM_PASSWORD"  => "!Aa123456"
            );

            echo "<br>md: "; echo $arFields["CHECKWORD"];echo "<br>";
            $ID = $user->Add($arFields);
            if (intval($ID) > 0)
            {
                echo "������������ ������� ��������.";
                //������� CHECKWORD
                $strSql = "UPDATE b_user SET ".
                    "	CHECKWORD = '".$salt.md5($salt.$checkword)."', ".
                    "	CHECKWORD_TIME = ".$DB->CurrentTimeFunction().", ".
                    "	LID = '".$DB->ForSql('s1', 2)."' ".
                    "WHERE ID = '".$ID."'".
                    "	AND (EXTERNAL_AUTH_ID IS NULL OR EXTERNAL_AUTH_ID='') ";

                $DB->Query($strSql, false, "FILE: ".__FILE__."<br> LINE: ".__LINE__);
                //������ � ������������ � ������ �������
                //����� ������������ � ������������ �������� ���� $arCourse["ID"]
                //��������� � ������ $checkword
                $event = new CEvent;
                $arPFields = Array(
                    "COURSE_NAME" => $arCourse["NAME"],
                    "USER_CHECKWORD" => $checkword,
                    "USER_LOGIN"=>$_REQUEST['EMAIL'],
                    "USER_EMAIL"=>$_REQUEST['EMAIL']
                );
                $event->Send("COURSE_SUBSCRIBE", "s1", $arPFields);
                //������� ��������� �������� � ������� ��
                //1.���� ������ ��� ����
                CModule::IncludeModule("forum");
                $topic_id=CForumTopic::Add(
                    array(
                        'TITLE' => $_REQUEST['EMAIL'],
                        'USER_START_NAME' => $_REQUEST['EMAIL'],
                        "LAST_POSTER_NAME" => '�������������',
                        'FORUM_ID' => FORUM_CHAT_ID
                    )
                );
                //1.2 �������������� ���������
                $arMFields = Array(
                    "POST_MESSAGE" => "������������! ����� �� ������ �������� ����� �������.",
                    "USE_SMILES" =>  "N",
                    "APPROVED" => "Y",
                    "AUTHOR_NAME" => "�������������",
                    "AUTHOR_ID" => 1,
                    "FORUM_ID" => FORUM_CHAT_ID,
                    "TOPIC_ID" => $topic_id,
                    "NEW_TOPIC" => "Y"
                );
                $mess_id = CForumMessage::Add($arMFields);
                //2 ������ ����������
                CModule::IncludeModule("iblock");
                $bs = new CIBlockSection;
                $arSFields = Array(
                    "ACTIVE" => "Y",
                    "IBLOCK_ID" => STAT_IBLOCK_ID,
                    "NAME" => $_REQUEST['EMAIL'],
                );
                    $statSecId = $bs->Add($arSFields);
                //3 ������ ��������
                $bc = new CIBlockSection;
                $arCFields = Array(
                    "ACTIVE" => "Y",
                    "IBLOCK_ID" => CALC_IBLOCK_ID,
                    "NAME" => $_REQUEST['EMAIL'],
                );
                $calcSecId = $bc->Add($arCFields);
                //4 ������ ����������
                $bd = new CIBlockSection;
                $arDFields = Array(
                    "ACTIVE" => "Y",
                    "IBLOCK_ID" => DOCS_IBLOCK_ID,
                    "NAME" => $_REQUEST['EMAIL'],
                );
                $docsSecId = $bd->Add($arDFields);
                //5. ������� ID �����
                $arFilter = Array(
                    "IBLOCK_ID"=>COURSE_IBLOCK_ID,
                    "ACTIVE"=>"Y",
                    "CODE"=>$_REQUEST["COURSE"]
                );
                $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);
                $ar_fields = $res->GetNext();
                $course_id = $ar_fields["ID"];

                //6. ������� ������� ����
                $el = new CIBlockElement;

                $PROP = array(
                    "142"=> $ID,
                    "143"=>$topic_id,
                    "144"=>$statSecId,
                    "145"=>$course_id,
                    "147"=>$calcSecId,
                    "148"=>$docsSecId
                );

                $arLoadProductArray = Array(
                    "IBLOCK_SECTION_ID" => false,          // ������� ����� � ����� �������
                    "IBLOCK_ID"      => MAIN_IBLOCK_ID,
                    "PROPERTY_VALUES"=> $PROP,
                    "NAME"           => $_REQUEST['EMAIL'],
                    "ACTIVE"         => "Y"            // �������
                );

                $PRODUCT_ID = $el->Add($arLoadProductArray);
                COption::SetOptionInt("iblock", "main_eid_for_uid_".$ID, $PRODUCT_ID);
            }
            else
            {
                echo $user->LAST_ERROR;
            }

        }


?><pre><?print_r($arResult)?></pre>