<?php
$arResult['PREMISSION']=0;
$UserGroup= $USER->GetUserGroupArray();
foreach($arResult["DISPLAY_PROPERTIES"]["USER_GROUP_ID"]["VALUE"] as $gid){
    $rsGroup = CGroup::GetByID($gid);
    $arGroup = $rsGroup->Fetch();
    if($arGroup["STRING_ID"]=="promo") $arResult['PREMISSION']=1;
    if(in_array($arGroup["ID"],$UserGroup)) $arResult['PREMISSION']=1;
}
