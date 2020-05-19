<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <!-- Начало блока с фильтром для пункта Обучение -->
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
<?foreach($arResult["ITEMS"] as $arItem):

    if ($arItem['CODE'] == 'ITEM_TYPE'){
        foreach($arItem['VALUES'] as $bxid=>$typeItem){
            if($_POST['target']=='section-study'&&$typeItem['VALUE']=='Обучение'||$_POST['target']=='section-developing'&&$typeItem['VALUE']=='Развитие'||$_POST['target']=='section-entertainment'&&$typeItem['VALUE']=='Развлечение'){
                ?><input id="type_item" type="hidden" value="Y" bxid="<?=$bxid?>" name="<?=$typeItem['CONTROL_NAME']?>"><?
            }
        }
    }

    if ($arItem['CODE'] == 'CLASS'){
        $arClass=array();
        foreach($arItem['VALUES'] as $bxid=>$classItem){
            if(substr_count($classItem['VALUE'],"лет")==0 && substr_count($classItem['VALUE'],"года")==0) {$classItem['BXID']=$bxid; $arClass[]=$classItem;}
        }
    }

    if ($arItem['CODE'] == 'YEAR'){
        $arYear=array();
        foreach($arItem['VALUES'] as $bxid=>$yearItem){
            if(strlen(trim($yearItem['VALUE']))>0) { $yearItem['BXID']=$bxid; $arYear[]=$yearItem; }
        }
    }
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
    if ($arItem['CODE'] == 'PROP_16'){
        $arUglub=array();
        foreach($arItem['VALUES'] as $bxid=>$uglubItem){
            if(strlen(trim($uglubItem['VALUE']))>0) {
                $uglubItem['BXID']=$bxid; $arUglub[]=$uglubItem;
            }
        }
    }
    if ($arItem['CODE'] == 'PLATFORM'){
        $arOS=array();
        foreach($arItem['VALUES'] as $bxid=>$osItem){
            if(strlen(trim($osItem['VALUE']))>0)  { $osItem['BXID']=$bxid;  $arOS[$osItem['VALUE']]=$osItem; }
        }
    }
    if ($arItem['CODE'] == 'ED_TYPE'){
        $arED=array('');
        foreach($arItem['VALUES'] as $bxid=>$edItem){
            if(strlen(trim($edItem['VALUE']))>0) {
                $edItem['BXID']=$bxid;
                if(trim($edItem['VALUE'])=='Учебник') $arED[0]=$edItem;
                else $arED[]=$edItem;
            }
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
                                  <li class="filter-inner-item" bxid="<?=$subjItem['BXID']?>" name="<?=$subjItem['CONTROL_NAME']?>"><?=$subjItem['VALUE']?></li>
                            <?endforeach?>
                </ul>
            </dd>
        </dl>
        </div>
        <?if($_POST['target']!='section-entertainment'):?>
        <div class="subjects-outer-wrap expandable">
            <dl class="language">
            <dt class="filter-subtitle">
                <a href="#" class="filter-subtitle-switcher">Иностранные языки</a>
            </dt>
            <dd class="filter-content">
                <ul class="filter-inner-list">
                        <?foreach($arLang as $l_item):?>
                            <li class="filter-inner-item" bxid="<?=$l_item['BXID']?>" name="<?=$l_item['CONTROL_NAME']?>"><?=$l_item['VALUE']?></li>
                        <?endforeach?>
                </ul>
            </dd>
        </dl>
    </div>
        <?endif?>
   </div>
    <div class="age-class">
        <dl class="age">
            <dt class="filter-subtitle">Возраст</dt>
            <dd class="filter-content">
                <ul class="filter-ages-list">
                    <?$s_count=1;foreach($arYear as $age):?>
                    <li class="filter-ages-item">
                        <input type="checkbox" name="<?=$age['CONTROL_NAME']?>" value="Y" id="checkboxG<?=$s_count?>" class="css-checkbox"  bxid="<?=$age['BXID']?>"/>
                        <label for="checkboxG<?=$s_count?>" class="css-label radGroup1">
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
                        <label for="checkbox<?=$s_count?>" class="css-label radGroup1">
                            <span class="label-inner-text"><?=str_replace(" класс", "", $class['VALUE'])?></span>
                        </label>
                    </li>
                    <?$s_count++;endforeach?>
                </ul>
            </dd>
        </dl>
    </div>



    <div class="subfilter">
        <dl class="platform">
            <dt class="filter-subtitle">Платформа</dt>
            <dd class="filter-content">
                <ul class="filter-inner-list">
                    <li class="filter-inner-item mac-p" name="<?=$arOS['MacOS']['CONTROL_NAME']?>" bxid="<?=$arOS['MacOS']['BXID']?>">MacOS</li>
                    <li class="filter-inner-item android-p" name="<?=$arOS['Android']['CONTROL_NAME']?>" bxid="<?=$arOS['Android']['BXID']?>">Android</li>
                    <li class="filter-inner-item win-p" name="<?=$arOS['Windows']['CONTROL_NAME']?>" bxid="<?=$arOS['Windows']['BXID']?>">Windows</li>
                    <li class="filter-inner-item ios-p" name="<?=$arOS['iOS']['CONTROL_NAME']?>" bxid="<?=$arOS['iOS']['BXID']?>">iOS</li>
                </ul>
            </dd>
        </dl>
        <dl class="material-type" style="width: 590px;">
            <dt class="filter-subtitle">Тип</dt>
            <dd class="filter-content">
                <ul class="filter-inner-list">
                    <?foreach($arED as $edItem):?>
                        <li class="filter-inner-item"  bxid="<?=$edItem['BXID']?>" name="<?=$edItem['CONTROL_NAME']?>"><?=$edItem['VALUE']?></li>
                    <?endforeach?>
                </ul>
            </dd>
        </dl>
        <dl class="price">
            <dt class="filter-subtitle">Цена</dt>
            <dd class="filter-content">
                <div class="price-wrap">
                    <fieldset class="price-field-wrap">
                        <label class="price-field-text" for="pricefrom">от</label>
                        <input type="text" class="price-field" name="<?=$arResult["ITEMS"]['BASE']['VALUES']['MIN']['CONTROL_NAME']?>" id="pricefrom" value="<?=$_POST[$arResult["ITEMS"]['BASE']['VALUES']['MIN']['CONTROL_NAME']]?>"
                               onkeyup="return(update(this,true))"
                               onkeydown="return(update(this,false))">
                    </fieldset>
                    <fieldset class="price-field-wrap">
                        <label class="price-field-text" for="priceto">до</label>
                        <input type="text" class="price-field" name="<?=$arResult["ITEMS"]['BASE']['VALUES']['MAX']['CONTROL_NAME']?>" id="priceto" value="<?=$_POST[$arResult["ITEMS"]['BASE']['VALUES']['MAX']['CONTROL_NAME']]?>"
                               onkeyup="return(update(this,true))"
                               onkeydown="return(update(this,false))">
                    </fieldset>
                </div>
                <button type="submit" class="btn-control show-btn">показать</button>
            </dd>
        </dl>
    </div>
</form>
</div>
