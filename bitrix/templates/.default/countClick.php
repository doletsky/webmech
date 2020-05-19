<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
file_put_contents($_SERVER['DOCUMENT_ROOT']."/logs/dump_session.txt", print_r($_SESSION, true).print_r($_COOKIE, true));
if(array_key_exists('in_basket', $_SESSION)){
    if($_SESSION['in_basket']==3)
        echo '0';
    else {
        $_SESSION['in_basket']++;
        echo $_SESSION['in_basket'];
    }
}else{
    echo $_SESSION['in_basket']=1;
}
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>