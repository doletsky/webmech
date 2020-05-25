<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <section id="banner" class="rounded-bottom" data-scroll-index="0">
        <div class="banner-parallax">
            <div class="bg-element" data-stellar-background-ratio="0.2"
                 style="background-image: url(<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>); background-position: 50% 0%;"></div>
            <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <div class="overlay-colored" data-bg-color="#000" data-bg-color-opacity="0.3"
                 style="background-color: rgba(0, 0, 0, 0.3);"></div>
            <div class="slide-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="banner-center-box text-white">
                                <h1 class="anim-movebottom-seq" data-opacity-value="1" style="opacity: 0;">
                                    <?
                                        $arName=explode(" ",trim($arResult["NAME"]));
                                        $arGreen=explode(", ",$arResult["PROPERTIES"]["GREEN_WORDS"]["VALUE"]);
                                        $arOrange=explode(", ",$arResult["PROPERTIES"]["ORANGE_WORDS"]["VALUE"]);
                                        foreach($arGreen as $numWordG){$arName[$numWordG-1]='<span class="colored">'.$arName[$numWordG-1].'</span>';}
                                        foreach($arOrange as $numWordO){$arName[$numWordO-1]='<span style="color: #eb5600">'.$arName[$numWordO-1].'</span>';}
                                        $strName=implode(" ",$arName);
                                    ?>
                                    <?=$strName;?>
                                </h1>
                                <div class="description anim-movebottom-seq" data-opacity-value="0.7"
                                     style="opacity: 0;">
                                    <?=$arResult["PREVIEW_TEXT"];?>
                                </div><br>
                                <div class="hm-content">
                                    <a class="header-btn scroll-to btn small colorful hover-white" href="#table-send">Записаться сейчас</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator-bottom"></div>
        </div>
    </section>
    <section id="content">
    <div id="content-wrap">
    <div id="fun-facts" class="flat-section" data-scroll-index="1">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Что даст курс?</h2>
                            <p>
                                <?
                                $arBold=explode(", ",$arResult["PROPERTIES"]["BOLD_DETAIL_WORDS"]["VALUE"]);
                                $arStrDetail=explode(PHP_EOL,trim($arResult["DETAIL_TEXT"]));
                                $corr=1;
                                foreach($arStrDetail as $key=>$strD){
                                    $arDetail=explode(" ",trim($strD));
                                    foreach($arDetail as $wNum=>$wDetail){
                                        if(in_array($wNum+$corr,$arBold)){
                                            $arDetail[$wNum]='<b>'.trim($arDetail[$wNum]).'</b>';
                                        }
                                    }
                                    $corr+=count($arDetail);
                                    $arStrDetail[$key]=implode(" ",$arDetail);
                                }
                                $strDetail=implode('<br>',$arStrDetail);
                                ?>
                                <?=$strDetail?>
                            </p>
                        </div>
                    </div>

                    <?if(strlen($arResult["PROPERTIES"]["IT_FOR"]["VALUE"])>0):?>
                    <div id="prima-video" class="flat-section">
                        <div class="section-content" style="padding: 40px 0;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="section-title text-center">
                                            <h2>Для кого этот курс.</h2>
                                            <p>30 секунд о том, что ценного в этом курсе и кому он может быть полезен.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="video-preview">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?endif?>

                    <?if(is_array($arResult["PROPERTIES"]["NUMS"]["VALUE"])&&!empty($arResult["PROPERTIES"]["NUMS"]["VALUE"])):?>
                    <div class="col-md-12">

                        <div class="fun-facts-boxes">
                            <?
                            foreach($arResult["PROPERTIES"]["NUMS"]["VALUE"] as $nums):
                                $arNum=explode("_",$nums);
                                ?>
                            <div class="box-counter anim-movebottom-seq text-center" data-opacity-value="1" style="opacity: 0; transform: translate(0px, 30px);">
                                <div class="bc-content">
                                    <h1>
                                        <span class="counter-stats">
                                            <?
                                            $c=0;
                                            do{
                                                if($c>0) echo "</span>";
                                            ?>
                                                <span class="digit">
                                                    <span class="digit-value"><?=$arNum[0]{$c}?></span>
                                                    <div class="counter-animator" data-value="<?=$arNum[0]{$c}?>">
                                                        <ul>
                                                            <li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
                                                        </ul>
                                                    </div>
                                            <?$c++;}
                                            while(is_numeric($arNum[0]{$c}))?>
                                                </span>
                                                <div class="main"><?=substr($arNum[0],0,$c);?></div><?=substr($arNum[0],$c);?>
                                        </span>
                                    </h1>
                                    <h5><?=$arNum[1]?></h5>
                                </div>
                            </div>
                            <?endforeach?>
                        </div>
                    </div>
                <?endif?>
                </div>
            </div>
        </div>
    </div>

    <div id="service-features" class="parallax-section" data-scroll-index="1" data-parallax-bg-img="img-37.jpg"
         data-stellar-background-ratio="0.2"
         style="background-image: url(<?=$arResul['DETAIL_PICTURE']['SRC']?>); background-position: 50% 50%;">
        <div class="overlay-colored" data-bg-color="#000" data-bg-color-opacity="0.4"
             style="background-color: rgba(0, 0, 0, 0.4);"></div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <?$col_cnt=0;?>
                    <?foreach($arResult["PROPERTIES"]["BENEFITS"]["ADV"] as $benefit):$col_cnt++;?>
                    <div class="col-md-4">
                        <div class="box-info box-info-1 text-white mb-md-50 anim-scaledown-seq"
                             data-opacity-value="1" style="opacity: 0; transform: scale(0.8, 0.8);">
                            <div class="box-icon icon x2 colorful-icon mr-20"><i class="<?=$benefit['ICON_CLASS']['VALUE']?>"></i>
                            </div>
                            <div class="box-content">
                                <h4 class="capitalized"><?=$benefit["NAME"]?></h4>
                                <p>
                                    <?=$benefit["PREVIEW_TEXT"]?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?if($col_cnt==3) echo "</div><div class='row'>";?>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </div>
<?if(strlen($arResult["PROPERTIES"]["METHOD"]["VALUE"])>0):?>
    <div id="watch-video" class="flat-section">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Методика курса</h2>
                            <p>
                                35 секунд о методике и результатах курса.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="video-preview">
                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endif?>
    <div id="clients-testmonials-plan" class="flat-section" data-scroll-index="2">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>План обучения</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testmonials-slider">
                            <div class="slide">
                                <div class="testmonial-single-2">
                                    <?foreach($arResult["PROPERTIES"]["PLAN"]["ADV"] as $mdl):?>
                                    <div class="quote-sign colored"><?=preg_replace("/\. /", ". <span style='color: #eb5600'>", $mdl["NAME"],1);?></span></div>
                                    <div class="ts-content">
                                        <?=str_replace("Результат модуля:", "<span class='colored'>Результат модуля:</span>", $mdl["PREVIEW_TEXT"]);?><br>
                                    </div>
                                    <?endforeach?>
                                    <br><br>
                                    <?
                                    $bon_cnt=0;
                                    foreach($arResult["PROPERTIES"]["BONUS"]["ADV"] as $bonus):
                                        $bon_cnt++;
                                        ?>
                                    <div class="quote-sign" style="color: #eb5600">
                                        Бонус <?=$bon_cnt?>.<br>
                                        <span class="colored"><?=$bonus["NAME"]?></span>
                                    </div>
                                    <div class="ts-content">
                                        <?=$bonus["PREVIEW_TEXT"]?>
                                        <br>
                                    </div>
                                    <?endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?if(strlen($arResult["PROPERTIES"]["ADD"]["VALUE"])>0):?>
    <div id="watch-video" class="flat-section">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Watch Our Video</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                                Ipsum has
                                <br>
                                been standard dummy text ever since the 1500s
                            </p>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1">
                        <div class="video-preview">
                            <div class="fluid-width-video-wrapper" style="padding-top: 49.7354%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?endif?>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.set.constructor",
        ".default",
        array(
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "ELEMENT_ID" => $arResult["ID"],
            "COLORED_NAME" => $strName,
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "BASKET_URL" => $arParams["BASKET_URL"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "PROP_BRAND" => $arResult["PROPERTIES"]["BRANDS"]["VALUE"],
            "PROP_BONUS" => $arResult["PROPERTIES"]["BONUS"]["ADV"],
            "PRICE"     =>  $arResult["CATALOG_PRICE_1"]
        ),
        $component,
        array("HIDE_ICONS" => "Y")
    );?>


    </div>
    </section>