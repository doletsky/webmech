<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult)?></pre>
<div class="section-body">
    <form id="filter-body" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?=$APPLICATION->GetCurDir()?>" method="post">
    <input type='hidden' value='Y' name='set_filter'>
    <?
    foreach($_POST as $varName=>$get){
        if($get=="Y"||$varName=='target') echo "<input type='hidden' value='".$get."' name='".$varName."'>";
    }
    ?>

    <?
    $subjCount=1;
    ?>
        <input id="section" type="hidden" value="Y" bxid="<?=$_REQUEST['SECTION_ID']?>" name="SECTION_ID">
<?foreach($arResult["ITEMS"] as $arItem):


    if ($arItem['CODE'] == 'AGE'){
        $arClass=array(
            "1 класс" => array("VALUE"=>"1 класс","CONTROL_NAME" => ""),
            "2 класс" => array("VALUE"=>"2 класс","CONTROL_NAME" => ""),
            "3 класс" => array("VALUE"=>"3 класс","CONTROL_NAME" => ""),
            "4 класс" => array("VALUE"=>"4 класс","CONTROL_NAME" => ""),
            "5 класс" => array("VALUE"=>"5 класс","CONTROL_NAME" => ""),
            "6 класс" => array("VALUE"=>"6 класс","CONTROL_NAME" => ""),
            "7 класс" => array("VALUE"=>"7 класс","CONTROL_NAME" => ""),
            "8 класс" => array("VALUE"=>"8 класс","CONTROL_NAME" => ""),
            "9 класс" => array("VALUE"=>"9 класс","CONTROL_NAME" => ""),
            "10 класс" => array("VALUE"=>"10 класс","CONTROL_NAME" => ""),
            "11 класс" => array("VALUE"=>"11 класс","CONTROL_NAME" => "")
        );
        $arYear=array(
            "1 год" => array("VALUE"=>"1 год","CONTROL_NAME" => ""),
            "2 года" => array("VALUE"=>"2 года","CONTROL_NAME" => ""),
            "3 года" => array("VALUE"=>"3 года","CONTROL_NAME" => ""),
            "4 года" => array("VALUE"=>"4 года","CONTROL_NAME" => ""),
            "5 лет" => array("VALUE"=>"5 лет","CONTROL_NAME" => ""),
            "6 лет" => array("VALUE"=>"6 лет","CONTROL_NAME" => "")
        );
        foreach($arItem['VALUES'] as $bxid=>$classItem){
            if(substr_count($classItem['VALUE'],"лет")==0 && substr_count($classItem['VALUE'],"года")==0) {$classItem['BXID']=$bxid; $arClass[$bxid]=$classItem;}
            else {$classItem['BXID']=$bxid; $arYear[$bxid]=$classItem;}
        }
    }
?><pre><?//print_r($arClass)?></pre><?
    if ($arItem['CODE'] == 'SUBJECT'){
        $arSubj=array();
        foreach($arItem['VALUES'] as $bxid=>$subjItem){
            if(substr_count($subjItem['VALUE'],"кий")==0 && !in_array($subjItem['VALUE'], array('Иврит', 'Хинди', 'Эсперанто'))):
                $subjItem['BXID']=$bxid;
                $arSubj[]=$subjItem;
            else:
                $lang=str_replace(" язык", "", $subjItem);
                $lang['BXID']=$bxid;
                if($lang['VALUE']=='Английский')$arLang[]=$lang;
                elseif($lang['VALUE']=='Немецкий')$arLang[]=$lang;
                elseif($lang['VALUE']=='Французский')$arLang[]=$lang;
                elseif($lang['VALUE']=='Испанский')$arLang[]=$lang;
                elseif ($lang['VALUE']!='Русский')$arLang[]=$lang;
                else array_unshift($arSubj, $lang);
            endif;
        }
    }



endforeach;
        ?>
    <div class="subjects">
        <div class="subjects-outer-wrap<?if($_POST['target']!='section-entertainment'):?> expandable active<?endif?>">
            <dl class="subject" <?if($_POST['target']=='section-entertainment'):?>style="width: 100%;"<?endif?>>
            <dt class="filter-subtitle">
                <?if($_POST['target']!='section-study'):?>
                    <a href="#" class="filter-subtitle-switcher">Темы</a>
               <?else:?>
                    <a href="#" class="filter-subtitle-switcher">Предмет</a>
               <?endif?>
            </dt>
            <dd class="filter-content">
                <ul class="filter-inner-list">
                            <?foreach($arSubj as $subjItem):?>
                                  <li class="filter-inner-item" bxid="<?=htmlentities($subjItem['BXID'], ENT_QUOTES,'UTF-8')?>" name="<?=$subjItem['CONTROL_NAME']?>"><?=$subjItem['VALUE']?></li>
                            <?endforeach?>
                </ul>
            </dd>
        </dl>
        </div>
   </div>
    <div class="age-class">
        <dl class="age">
            <dt class="filter-subtitle">Возраст</dt>
            <dd class="filter-content">
                <ul class="filter-ages-list">
                    <?$s_count=1;foreach($arYear as $age):?>
                    <li class="filter-ages-item">
                        <input type="checkbox" name="<?=$age['CONTROL_NAME']?>" value="Y" id="checkboxG<?=$s_count?>" class="css-checkbox"  bxid="<?=$age['BXID']?>"/>
                        <label for="checkboxG<?=$s_count?>" class="css-label radGroup1<?if(strlen($age['CONTROL_NAME'])==0) echo ' no-click';?>">
                            <span class="label-inner-text"><?=$age['VALUE']?></span>
                        </label>
                    </li>
                    <?$s_count++;endforeach?>
                </ul>
            </dd>
        </dl><dl class="grade">
            <dt class="filter-subtitle">Класс</dt>
            <dd class="filter-content">
                <ul class="filter-ages-list">
                    <?foreach($arClass as $class):?>
                    <li class="filter-ages-item">
                        <input type="checkbox" name="<?=$class['CONTROL_NAME']?>" value="Y" id="checkbox<?=$s_count?>" class="css-checkbox"  bxid="<?=$class['BXID']?>"/>
                        <label for="checkbox<?=$s_count?>" class="css-label radGroup1<?if(strlen($class['CONTROL_NAME'])==0) echo ' no-click';?>">
                            <span class="label-inner-text"><?=str_replace(" класс", "", $class['VALUE'])?></span>
                        </label>
                    </li>
                    <?$s_count++;endforeach?>
                </ul>
            </dd>
        </dl>
    </div>



    <div class="subfilter">
        <dl class="price">
            <dt class="filter-subtitle" style="float: left;padding-top: 5px;">Цена</dt>
            <dd class="filter-content">
                <div class="price-wrap">
                    <fieldset class="price-field-wrap">
                        <label class="price-field-text" for="pricefrom">от</label>
                        <input type="text" class="price-field" name="<?=$arResult["ITEMS"]['BASE']['VALUES']['MIN']['CONTROL_NAME']?>" id="pricefrom" value="<?=$_POST[$arResult["ITEMS"]['BASE']['VALUES']['MIN']['CONTROL_NAME']]?>"
                               onkeyup="return(update(this,true,1))"
                               onkeydown="return(update(this,false,1))">
                    </fieldset>
                    <fieldset class="price-field-wrap">
                        <label class="price-field-text" for="priceto">до</label>
                        <input type="text" class="price-field" name="<?=$arResult["ITEMS"]['BASE']['VALUES']['MAX']['CONTROL_NAME']?>" id="priceto" value="<?=$_POST[$arResult["ITEMS"]['BASE']['VALUES']['MAX']['CONTROL_NAME']]?>"
                               onkeyup="return(update(this,true,1))"
                               onkeydown="return(update(this,false,1))">
                    </fieldset>
                </div>
                <button type="submit" class="btn-control show-btn offcont">показать</button>
            </dd>
        </dl>
    </div>
</form>
</div>
