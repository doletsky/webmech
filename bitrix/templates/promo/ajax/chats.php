<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("forum");
$arTopic = CForumTopic::GetByID($_REQUEST["tid"]);

$ar=array(
    'new_mess'=>'0'
);
$log['cnt']=$arTopic["POSTS"]+1;
if($_REQUEST["count"]!=$arTopic["POSTS"]+1){
    //добавились сообщения
    $arMess=array();
    $db_res = CForumMessage::GetList(array("POST_DATE"=>"ASC"), array("TOPIC_ID"=>$_REQUEST["tid"]));
    while ($res = $db_res->Fetch())
    {
        $me='';
        $author='Куратор ';
        if($USER->GetID()==$res["AUTHOR_ID"]){
            $me='chat-message-me';
            $author='Я ';
        }
        $arMess[]=array(
            "id"=>$res["ID"],
            "data"=>$res["POST_DATE"],
            "post"=>mb_convert_encoding($res["POST_MESSAGE"], "utf-8", "windows-1251"),
            "me"=>$me,
            "author"=>$author
        );

    }
    $ar=array(
        'log'=>$log,
        'new_mess'=>'1',
        'html_mess'=>$arMess
    );
}

echo json_encode( $ar );