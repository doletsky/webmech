<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult)?></pre>
<!-- Начало блока с фильтром для пункта Обучение -->
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

        if ($arItem['CODE'] == 'CLASS'){
            $arClass=array();$arYear=array();
            foreach($arItem['VALUES'] as $bxid=>$classItem){
                if(substr_count($classItem['VALUE'],"лет")==0 && substr_count($classItem['VALUE'],"год")==0) {$classItem['BXID']=$bxid; $arClass[]=$classItem;}
                else {$classItem['BXID']=$bxid; $arYear[]=$classItem;}
            }
        }
        if ($arItem['CODE'] == 'YEAR'){
            $arYear=array();
            foreach($arItem['VALUES'] as $bxid=>$yearItem){
                if(strlen(trim($yearItem['VALUE']))>0) {$yearItem['BXID']=$bxid; $arYear[]=$yearItem;}
            }
        }

    endforeach;?>
    <div class="age-class">
        <dl class="age">
            <dt class="filter-subtitle">Возраст</dt>
            <dd class="filter-content">
                <ul class="filter-ages-list">
                    <?$s_count=1;foreach($arYear as $age):?>
                        <li class="filter-ages-item">
                            <input type="checkbox" name="<?=$age['CONTROL_NAME']?>" value="Y" id="checkboxG<?=$s_count?>" class="css-checkbox" packet="true"  bxid="<?=$age['BXID']?>"/>
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
                            <input type="checkbox" name="<?=$class['CONTROL_NAME']?>" value="Y" id="checkbox<?=$s_count?>" class="css-checkbox" packet="true" bxid="<?=$class['BXID']?>"/>
                            <label for="checkbox<?=$s_count?>" class="css-label radGroup1">
                                <span class="label-inner-text"><?=str_replace(" класс", "", $class['VALUE'])?></span>
                            </label>
                        </li>
                        <?$s_count++;endforeach?>
                </ul>
            </dd>
        </dl>
    </div>



</form>

