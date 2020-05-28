<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$intElementID = intval($arParams["ELEMENT_ID"]);
$arDef=$arResult["SET_ITEMS"]["DEFAULT"];

$arStr=explode("&amp;quot;", htmlentities ($arDef["course"]["NAME"]));
$titleTableOffer=$arStr[0].' <span style="color: #eb5600">"'.$arStr[1].'"</span>'.$arStr[2];

$priceFullInt=intval(str_replace(' ', '',$arResult["SET_ITEMS"]["PRICE"]));
$priceOptInt=$priceFullInt-$arDef["vip"]["PRICE_VALUE"];
$priceSimpleInt=$priceOptInt-$arDef["curator"]["PRICE_VALUE"];

$sumBonus=0;
foreach($arParams["PROP_BONUS"] as $bonus){
    $sumBonus+=$bonus["COST"]["VALUE"];
}
$sumCostMax=$arDef["course"]["COST"]+$arDef["curator"]["COST"]+$arDef["vip"]["COST"]+$sumBonus;
$sumCostOpt=$arDef["course"]["COST"]+$arDef["curator"]["COST"]+$sumBonus;
$sumCostSimple=$arDef["course"]["COST"]+$sumBonus;




?>
<div id="clients-testmonials" class="flat-section" data-scroll-index="3">
<div class="section-content">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="section-title text-center">
        <h2>Наши предложения</h2>
        <p>
            Три пакета - три предложения для разных возможностей и желаний.
        </p>
    </div>
</div>
<div class="col-md-12">
    <div class="testmonials-slider">
        <ul class="owl-carousel">
            <li>
                <div class="slide">
                    <div class="testmonial-single-2">
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Максимум”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$arResult["SET_ITEMS"]["PRICE"]?></span>*</span></span>
                        <div class="ts-content colored">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <?=$titleTableOffer?> (доступ на <?=$arDef["vip"]["ACCESS"]["ACCESS_TEXT"]?>)<br>
                                        <?=$arDef["course"]["PREVIEW_TEXT"]?>
                                    </td>
                                    <td><?=$arDef["course"]["COST"]?> р.</td>
                                </tr>
                                <tr>
                                    <td>Практика (можно воспользоваться бесконечное число раз)</td>
                                    <td>
                                        Бесценно
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Кураторство:<br>
                                        <?=$arDef["curator"]["PREVIEW_TEXT"]?><br>
                                        <span style="color: #eb5600"><?=$arDef["vip"]["PREVIEW_TEXT"]?></span> (на время доступа)
                                    </td>
                                    <td><?=$arDef["curator"]["COST"]+$arDef["vip"]["COST"]?> р.</td>
                                </tr>
                                <?$k=0;foreach($arParams["PROP_BONUS"] as $bonus):$k++;?>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус <?=$k?>.</span> <?=$bonus["NAME"]?></td>
                                    <td><?=$bonus["COST"]["VALUE"]?> р.</td>
                                </tr>
                                <?endforeach;?>
                            </table>
                        </div>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit"><?=$sumCostMax?> рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> <?=$sumCostMax-$priceFullInt?> рублей!</span></h5>
                            <!--<div><a class="btn scroll-top large colorful hover-dark" href="#">Записаться сейчас</a></div>-->
                        </div>
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Максимум”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$arResult["SET_ITEMS"]["PRICE"]?></span>*</span></span>
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1" novalidate="true" style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <select size="1" name="paket"  placeholder="Выберите пакет" style="border: solid 1px grey;">
                                    <option selected value="1">Максимум</option>
                                </select>
                                <input type="email" placeholder="Ваш email" name="EMAIL" style="border: solid 1px grey;">
                                <input type="submit" class="form-control" value="Записаться сейчас" onclick="return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide">
                    <div class="testmonial-single-2">
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Оптимальный”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$priceOptInt?> руб.</span>*</span></span>
                        <div class="ts-content colored">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <?=$titleTableOffer?> (доступ на <?=$arDef["curator"]["ACCESS"]["ACCESS_TEXT"]?>)<br>
                                        <?=$arDef["course"]["PREVIEW_TEXT"]?>
                                    </td>
                                    <td><?=$arDef["course"]["COST"]?> р.</td>
                                </tr>
                                <tr>
                                    <td>Практика (можно воспользоваться бесконечное число раз)</td>
                                    <td>
                                        Бесценно
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Кураторство:<br>
                                        <?=$arDef["curator"]["PREVIEW_TEXT"]?>
                                    </td>
                                    <td><?=$arDef["curator"]["COST"]?> р.</td>
                                </tr>
                                <?$k=0;foreach($arParams["PROP_BONUS"] as $bonus):$k++;?>
                                    <tr>
                                        <td><span style="color: #eb5600">Бонус <?=$k?>.</span> <?=$bonus["NAME"]?></td>
                                        <td><?=$bonus["COST"]["VALUE"]?> р.</td>
                                    </tr>
                                <?endforeach;?>
                            </table>
                        </div>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit"><?=$sumCostOpt?> рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> <?=$sumCostOpt-$priceFullInt?> рублей!</span></h5>
                            <!--<div><a class="btn scroll-top large colorful hover-dark" href="#">Записаться сейчас</a></div>-->
                        </div>
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Оптимальный”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$priceOptInt?>руб.</span>*</span></span>
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1" novalidate="true" style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <select size="1" name="paket"  placeholder="Выберите пакет" style="border: solid 1px grey;">
                                    <option selected value="2">Оптимальный</option>
                                </select>
                                <input type="email" placeholder="Ваш email" name="EMAIL" style="border: solid 1px grey;">
                                <input type="submit" class="form-control" value="Записаться сейчас" onclick="return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide">
                    <div class="testmonial-single-2">
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Простой”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$priceSimpleInt?> руб.</span>*</span></span>
                        <div class="ts-content colored">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <?=$titleTableOffer?> (доступ на <?=$arDef["course"]["ACCESS"]["ACCESS_TEXT"]?>)<br>
                                        <?=$arDef["course"]["PREVIEW_TEXT"]?>
                                    </td>
                                    <td><?=$arDef["course"]["COST"]?> р.</td>
                                </tr>
                                <tr>
                                    <td>Практика (можно воспользоваться бесконечное число раз)</td>
                                    <td>
                                        Бесценно
                                    </td>
                                </tr>
                                <?$k=0;foreach($arParams["PROP_BONUS"] as $bonus):$k++;?>
                                    <tr>
                                        <td><span style="color: #eb5600">Бонус <?=$k?>.</span> <?=$bonus["NAME"]?></td>
                                        <td><?=$bonus["COST"]["VALUE"]?> р.</td>
                                    </tr>
                                <?endforeach;?>
                            </table>
                        </div>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit"><?=$sumCostSimple?> рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> <?=$sumCostSimple-$priceFullInt?> рублей!</span></h5>
                            <!--<div><a class="btn scroll-top large colorful hover-dark" href="#">Записаться сейчас</a></div>-->
                        </div>
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Простой”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600"><?=$priceSimpleInt?> руб.</span>*</span></span>
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1" novalidate="true" style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <select size="1" name="paket"  placeholder="Выберите пакет" style="border: solid 1px grey;">
                                    <option selected value="3">Простой</option>
                                </select>
                                <input type="email" placeholder="Ваш email" name="EMAIL" style="border: solid 1px grey;">
                                <input type="submit" class="form-control" value="Записаться сейчас" onclick="return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>

<div id="our-clients" class="flat-section" data-scroll-index="3">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-">
                    <div class="clients-slider">
                        <ul class="owl-carousel owl-loaded owl-drag">
                            <?foreach($arParams["PROP_BRAND"] as $classBrand):?>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="<?=$classBrand?>"></i></div>
                                </div>
                            </li>
                            <?endforeach?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cta-title-1" class="flat-section">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-cta text-center">
                        <h3 id="table-send" data-scroll-index="4"><span class="colored">Курс-онлайн.</span> "<?=htmlspecialchars_decode($arParams["COLORED_NAME"])?>"</h3>
                        <table class="colored" style="width: 100%;">
                            <tr style="color: #eb5600;font-weight: 700;font-size: 150%">
                                <td class="colored" style="width: 40%">Пакет</td><td style="width: 20%">Максимум</td><td>Оптимальный</td><td>Простой</td>
                            </tr>
                            <tr>
                                <td>
                                   <?=$titleTableOffer?>
                                </td>
                                <td>(доступ на <?=$arDef["vip"]["ACCESS"]["ACCESS_TEXT"]?>)</td>
                                <td>(доступ на <?=$arDef["curator"]["ACCESS"]["ACCESS_TEXT"]?>)</td>
                                <td>(доступ на <?=$arDef["course"]["ACCESS"]["ACCESS_TEXT"]?>)</td>
                            </tr>
                            <tr>
                                <td>Практика</td>
                                <td>+</td>
                                <td>+</td>
                                <td>Нет</td>
                            </tr>
                            <tr>
                                <td>Кураторство - <?=$arDef["curator"]["PREVIEW_TEXT"]?></td>
                                <td>+<br><span style="color: #eb5600"><?=$arDef["vip"]["PREVIEW_TEXT"]?></span></td>
                                <td>+</td>
                                <td>Нет</td>
                            </tr>
                            <?$k=0;foreach($arParams["PROP_BONUS"] as $bonus):$k++;?>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус <?=$k?>.</span> <?=$bonus["NAME"]?></td>
                                    <td>+</td>
                                    <td>+</td>
                                    <td><?if(!$bonus["MAN"]["VALUE"]):?>+<?else:echo $bonus["MAN"]["VALUE"]; endif?></td>
                                </tr>
                            <?endforeach;?>
                            <tr style="font-weight: 700;font-size: 150%">
                                <td></td>
                                <td><?=$priceFullInt?> руб.</td>
                                <td><?=$priceOptInt?> руб.</td>
                                <td><?=$priceSimpleInt?> руб.</td>
                            </tr>
                        </table>
                        <!--<a class="btn large colorful hover-dark" data-scroll-nav="3"-->
                        <!--href="#clients-testmonials">Записаться сейчас</a>-->
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1"
                              novalidate="true"
                              style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <select size="1" name="paket"  placeholder="Выберите пакет">
                                    <option selected="true" disabled="disabled">Выберите пакет</option>
                                    <option value="1">Максимум</option>
                                    <option value="2">Оптимальный</option>
                                    <option value="3">Простой</option>
                                </select>
                                <input type="email" placeholder="Ваш email" name="EMAIL">
                                <input type="submit" class="form-control" value="Записаться сейчас"
                                       onclick="return false;">
                            </div>
                        </form>
                        <img class="shape-1 anim-moveleft-seq" src="<?=SITE_TEMPLATE_PATH?>/images/cta-title-shape-1.png"
                             alt="" data-move-duration="2000" data-opacity-value="1"
                             style="opacity: 0; transform: translate(-30px, 0px);">
                        <img class="shape-2 anim-moveright-seq" src="<?=SITE_TEMPLATE_PATH?>/images/cta-title-shape-2.png"
                             alt="" data-move-duration="2000" data-opacity-value="1"
                             style="opacity: 0; transform: translate(30px, 0px);">
                        <img class="shape-3 anim-moveleft-seq" src="<?=SITE_TEMPLATE_PATH?>/images/cta-title-shape-3.png"
                             alt="" data-move-duration="2000" data-opacity-value="1"
                             style="opacity: 0; transform: translate(-30px, 0px);">
                        <img class="shape-4 anim-moveright-seq" src="<?=SITE_TEMPLATE_PATH?>/images/cta-title-shape-4.png"
                             alt="" data-move-duration="2000" data-opacity-value="1"
                             style="opacity: 0; transform: translate(30px, 0px);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    BX.message({
        setItemAdded2Basket: '<?=GetMessageJS("CATALOG_SET_ADDED2BASKET")?>',
        setButtonBuyName: '<?=GetMessageJS("CATALOG_SET_BUTTON_BUY")?>',
        setButtonBuyUrl: '<?=$arParams["BASKET_URL"]?>',
        setIblockId: '<?=$arParams["IBLOCK_ID"]?>',
        setOffersCartProps: <?=CUtil::PhpToJSObject($arParams["OFFERS_CART_PROPERTIES"])?>
    });

    BX.ready(function(){
        catalogSetDefaultObj_vip = new catalogSetConstructDefault(
            <?=CUtil::PhpToJSObject($arResult["DEFAULT_SET_IDS"]["vip"])?>,
            '<? echo $this->GetFolder(); ?>/ajax.php',
            '<?=$arResult["ELEMENT"]["PRICE_CURRENCY"]?>',
            '<?=SITE_ID?>',
            '<?=$intElementID?>',
            '<?=($arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] ? $arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] : $this->GetFolder().'/images/no_foto.png')?>',
            <?=CUtil::PhpToJSObject($arResult["ITEMS_RATIO"]["vip"])?>
        );
        catalogSetDefaultObj_curator = new catalogSetConstructDefault(
            <?=CUtil::PhpToJSObject($arResult["DEFAULT_SET_IDS"]["curator"])?>,
            '<? echo $this->GetFolder(); ?>/ajax.php',
            '<?=$arResult["ELEMENT"]["PRICE_CURRENCY"]?>',
            '<?=SITE_ID?>',
            '<?=$intElementID?>',
            '<?=($arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] ? $arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] : $this->GetFolder().'/images/no_foto.png')?>',
            <?=CUtil::PhpToJSObject($arResult["ITEMS_RATIO"]["curator"])?>
        );
        catalogSetDefaultObj_course = new catalogSetConstructDefault(
            <?=CUtil::PhpToJSObject($arResult["DEFAULT_SET_IDS"]["course"])?>,
            '<? echo $this->GetFolder(); ?>/ajax.php',
            '<?=$arResult["ELEMENT"]["PRICE_CURRENCY"]?>',
            '<?=SITE_ID?>',
            '<?=$intElementID?>',
            '<?=($arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] ? $arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] : $this->GetFolder().'/images/no_foto.png')?>',
            <?=CUtil::PhpToJSObject($arResult["ITEMS_RATIO"]["course"])?>
        );
    });

</script>
