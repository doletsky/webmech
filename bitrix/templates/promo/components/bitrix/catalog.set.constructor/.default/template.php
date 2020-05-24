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
$arPrice=array(
    "BASE"   => $arParams["PRICE"],
    "SIMPLE" => ""
);
$arCost=array();
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
                                        <?$arStr=explode("&amp;quot;", htmlentities ($arResult["SET_ITEMS"]["DEFAULT"]["course"]["NAME"]))?>
                                        <?=$arStr[0].' <span style="color: #eb5600">"'.$arStr[1].'"</span>'.$arStr[2]?><br>
                                        <?=$arResult["SET_ITEMS"]["DEFAULT"]["course"]["PREVIEW_TEXT"]?>
                                    </td>
                                    <td><?=$arResult["SET_ITEMS"]["DEFAULT"]["course"]["COST"]?> р.</td>
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
                                        <?=$arResult["SET_ITEMS"]["DEFAULT"]["curator"]["PREVIEW_TEXT"]?><br>
                                        <span style="color: #eb5600"><?=$arResult["SET_ITEMS"]["DEFAULT"]["vip"]["PREVIEW_TEXT"]?></span> (до 3 мес.)
                                    </td>
                                    <td><?=$arResult["SET_ITEMS"]["DEFAULT"]["curator"]["COST"]+$arResult["SET_ITEMS"]["DEFAULT"]["vip"]["COST"]?> р.</td>
                                </tr>
                                <?$sumBonus=0;$k=0;foreach($arParams["PROP_BONUS"] as $bonus):$k++;?>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус <?=$k?>.</span> <?=$bonus["NAME"]?></td>
                                    <td><?=$bonus["COST"]["VALUE"]?> р.</td>
                                </tr>
                                <?$sumBonus+=$bonus["COST"]["VALUE"];endforeach;?>
                            </table>
                        </div>
                        <?
                        $sumCost=$arParams["PRICE"]+$arResult["SET_ITEMS"]["DEFAULT"]["course"]["COST"]+$arResult["SET_ITEMS"]["DEFAULT"]["curator"]["COST"]+$arResult["SET_ITEMS"]["DEFAULT"]["vip"]["COST"]+$sumBonus;
                        ?>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit"><?=$sumCost?> рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> <?=$sumCost-intval($arResult["SET_ITEMS"]["PRICE"])?> рублей!</span></h5>
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
                                <input type="hidden" name="COURSE" value="kak_zakazat_sayt">
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
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Достигатор”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600">19&nbsp000&nbspруб.</span>*</span></span>
                        <div class="ts-content colored">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        Курс <span style="color: #eb5600">“Как бесплатно обучиться веб-разработке”</span> (доступ на 2 мес.)<br>
                                        видео и конспекты уроков<br>
                                        инструкции и рекомендации
                                    </td>
                                    <td>90000 р.</td>
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
                                        - проверка д/з и комментариями<br>
                                        - пояснения по модулю<br>
                                        - чат с куратором ежедневно<br>
                                    </td>
                                    <td>40000 р.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 1.</span> Список востребованных специальностей</td>
                                    <td>5000 р.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 2.</span> Как получить работу без опыта</td>
                                    <td>15000 р.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 3.</span> Поиск информации в интернете</td>
                                    <td>15000 р.</td>
                                </tr>
                            </table>
                        </div>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit">165000 рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> 146000 рублей!</span></h5>
                            <!--<div><a class="btn scroll-top large colorful hover-dark" href="#">Записаться сейчас</a></div>-->
                        </div>
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Достигатор”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600">19&nbsp000&nbspруб.</span>*</span></span>
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1" novalidate="true" style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <input type="hidden" name="COURSE" value="kak_zakazat_sayt">
                                <select size="1" name="paket"  placeholder="Выберите пакет" style="border: solid 1px grey;">
                                    <option selected value="2">Достигатор</option>
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
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Информ”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600">11&nbsp000&nbspруб.</span>*</span></span>
                        <div class="ts-content colored">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        Курс <span style="color: #eb5600">“Как бесплатно обучиться веб-разработке”</span> (доступ на 2 мес.)<br>
                                        видео и конспекты уроков<br>
                                        инструкции и рекомендации
                                    </td>
                                    <td>90000&nbspр.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 1.</span> Список востребованных специальностей</td>
                                    <td>5000 р.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 2.</span> Как получить работу без опыта</td>
                                    <td>15000 р.</td>
                                </tr>
                                <tr>
                                    <td><span style="color: #eb5600">Бонус 3.</span> Поиск информации в интернете</td>
                                    <td>15000 р.</td>
                                </tr>
                            </table>
                        </div>
                        <div class="ts-person" style="text-align: center">
                            <h5>*Суммарная ценность пакета <span style="color: #eb5600; font-size: inherit">105000 рублей.</span>  Экономия<span style="color: #eb5600; font-size: inherit"> 94000 рублей!</span></h5>
                            <!--<div><a class="btn scroll-top large colorful hover-dark" href="#">Записаться сейчас</a></div>-->
                        </div>
                        <span class="quote-sign colored">Пакет <span style="color: #eb5600">“Информ”</span> <span style="font-size: 70%; float: right">Стоимость: <span style="color: #eb5600">11&nbsp000&nbspруб.</span>*</span></span>
                        <form class="signup-form anim-movebottom-seq" data-opacity-value="1" novalidate="true" style="opacity: 0;">
                            <!--<img src="images/signup-form.png" alt="">-->
                            <div class="sf1-notifications">
                                <div class="sf1-notifications-content"></div>
                            </div>
                            <div class="form-group">
                                <input class="signup_detect" type="hidden">
                                <input type="hidden" name="COURSE" value="kak_zakazat_sayt">
                                <select size="1" name="paket"  placeholder="Выберите пакет" style="border: solid 1px grey;">
                                    <option selected value="3">Информ</option>
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
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-php"></i>
                                        <!--<img src="images/php.png" alt="">-->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-css3"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-javascript"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-html5"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-python"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-less"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-sass"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-mysql"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-java"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-w3c"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-git"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-bootstrap"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-code"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-jquery"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-android"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-swift"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-apple"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-symfony"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-laravel"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-angular"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="slide">
                                    <div class="client-single"><i class="devicons devicons-nodejs"></i></div>
                                </div>
                            </li>
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
                        <h3 id="table-send" data-scroll-index="4"><span class="colored">Курс-онлайн.</span> "Как <span class="colored">бесплатно</span> обучиться
                            <span style="color: #eb5600">высокооплачиваемой</span> профессии веб-разработчика и начать зарабатывать."</h3>
                        <table class="colored" style="width: 100%;">
                            <tr style="color: #eb5600;font-weight: 700;font-size: 150%">
                                <td class="colored" style="width: 40%">Пакет</td><td style="width: 20%">Максимум</td><td>Достигатор</td><td>Информ</td>
                            </tr>
                            <tr>
                                <td>
                                    Курс <span style="color: #eb5600">“Как бесплатно обучиться веб-разработке”</span>
                                </td>
                                <td>(доступ на 3 мес.)</td>
                                <td>(доступ на 2 мес.)</td>
                                <td>(доступ на 2 мес.)</td>
                            </tr>
                            <tr>
                                <td>Практика</td>
                                <td>+</td>
                                <td>+</td>
                                <td>Нет</td>
                            </tr>
                            <tr>
                                <td>Кураторство - проверка д/з и комментариями,<br>
                                    пояснения по модулю, чат с куратором ежедневно
                                </td>
                                <td>+ индивидуальная поддержка поддержка в выполнении составленного плана</span> (до 3 мес.)</td>
                                <td>+</td>
                                <td>Нет</td>
                            </tr>
                            <tr>
                                <td><span style="color: #eb5600">Бонус 1.</span> Список востребованных специальностей</td>
                                <td>+</td>
                                <td>+</td>
                                <td>+</td>
                            </tr>
                            <tr>
                                <td><span style="color: #eb5600">Бонус 2.</span> Как получить работу без опыта</td>
                                <td>+</td>
                                <td>+</td>
                                <td>метод. пособие</td>
                            </tr>
                            <tr>
                                <td><span style="color: #eb5600">Бонус 3.</span> Поиск информации в интернете</td>
                                <td>+</td>
                                <td>+</td>
                                <td>метод. пособие</td>
                            </tr>
                            <tr style="font-weight: 700;font-size: 150%">
                                <td></td>
                                <td>37 000 руб.</td>
                                <td>19 000 руб.</td>
                                <td>11 000 руб.</td>
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
                                <input type="hidden" name="COURSE" value="kak_zakazat_sayt">
                                <select size="1" name="paket"  placeholder="Выберите пакет">
                                    <option selected="true" disabled="disabled">Выберите пакет</option>
                                    <option value="1">Максимум</option>
                                    <option value="2">Достигатор</option>
                                    <option value="3">Информ</option>
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
<?
if(0):
$this->setFrameMode(true);

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);

$intElementID = intval($arParams["ELEMENT_ID"]);
$countDefSetItems = count($arResult["SET_ITEMS"]["DEFAULT"]);
$blockWidth = 87/(1+$countDefSetItems);
?>
<div class="bx_item_set_hor_container_big <? echo $templateData['TEMPLATE_CLASS']; ?>">
	<span class="bx_item_section_name_gray"><?=GetMessage("CATALOG_SET_BUY_SET")?></span>

	<div class="bx_item_set_hor">
		<div class="bx_item_set_hor_item plus" style="width:<?=$blockWidth?>%;" data-price="<?=$arResult["ELEMENT"]["PRICE_DISCOUNT_VALUE"]?>" data-old-price="<?=$arResult["ELEMENT"]["PRICE_VALUE"]?>" data-discount-diff-price="<?=$arResult["ELEMENT"]["PRICE_DISCOUNT_DIFFERENCE_VALUE"]?>">
			<div class="bx_item_set_img_container">
				<?if ($arResult["ELEMENT"]["DETAIL_PICTURE"]["src"]):?>
					<a class="<?=($arResult["ELEMENT"]["DETAIL_PICTURE"]["width"] >= $arResult["ELEMENT"]["DETAIL_PICTURE"]["height"]) ? "bx_kit_img_landscape" : "bx_kit_img_portrait"?>" href="<?=$arResult["ELEMENT"]["DETAIL_PAGE_URL"]?>" style="background-image: url('<?=$arResult["ELEMENT"]["DETAIL_PICTURE"]["src"]?>');"></a>
				<?else:?>
					<a href="<?=$arResult["ELEMENT"]["DETAIL_PAGE_URL"]?>" style="background-image: url('<?=$this->GetFolder();?>/images/no_foto.png')"></a>
				<?endif?>
			</div>
			<a class="bx_item_set_linkitem" href="<?=$arResult["ELEMENT"]["DETAIL_PAGE_URL"]?>"><?=$arResult["ELEMENT"]["NAME"]?> <br /><br />
				<span class="bx_item_set_price"><strong><?=$arResult["ELEMENT"]["PRICE_PRINT_DISCOUNT_VALUE"]?></strong></span>
				<?if (!($arResult["ELEMENT"]["PRICE_VALUE"] == $arResult["ELEMENT"]["PRICE_DISCOUNT_VALUE"])):?><span class="bx_item_set_price old"><strong><?=$arResult["ELEMENT"]["PRICE_PRINT_VALUE"]?></strong></span><?endif?>
			</a>
			<div style="clear: both;"></div>
		</div>

		<?foreach($arResult["SET_ITEMS"]["DEFAULT"] as $key => $arItem):?>
			<div class="bx_item_set_hor_item <?if ($key<$countDefSetItems-1) echo "plus"; else echo "equally"?> bx_default_set_items"
				style="width:<?=$blockWidth?>%;"
				data-price="<?=(($arItem["PRICE_CONVERT_DISCOUNT_VALUE"]) ? $arItem["PRICE_CONVERT_DISCOUNT_VALUE"] : $arItem["PRICE_DISCOUNT_VALUE"])?>"
				data-old-price="<?=(($arItem["PRICE_CONVERT_VALUE"]) ? $arItem["PRICE_CONVERT_VALUE"] : $arItem["PRICE_VALUE"])?>"
				data-discount-diff-price="<?=(($arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"]) ? $arItem["PRICE_CONVERT_DISCOUNT_DIFFERENCE_VALUE"] : $arItem["PRICE_DISCOUNT_DIFFERENCE_VALUE"])?>">
				<div class="bx_item_set_img_container">
					<?if ($arItem["DETAIL_PICTURE"]["src"]):?>
						<a class="<?=($arItem["DETAIL_PICTURE"]["width"] >= $arItem["DETAIL_PICTURE"]["height"]) ? "bx_kit_img_landscape" : "bx_kit_img_portrait"?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background-image: url('<?=$arItem["DETAIL_PICTURE"]["src"]?>');"></a>
					<?else:?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="background-image: url('<?=$this->GetFolder();?>/images/no_foto.png')"></a>
					<?endif?>
				</div>
				<a class="bx_item_set_linkitem" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?><br /><br />
					<span class="bx_item_set_price"><strong><?=$arItem["PRICE_PRINT_DISCOUNT_VALUE"]?></strong></span>
					<span  class="bx_item_set_price old" <?if ($arItem["PRICE_VALUE"] == $arItem["PRICE_DISCOUNT_VALUE"]):?>style="display:none"<?endif?>><strong><?=$arItem["PRICE_PRINT_VALUE"]?></strong></span>
				</a>
				<div class="bx_item_set_del" onclick="catalogSetDefaultObj_<? echo $intElementID; ?>.DeleteItem(this.parentNode, '<?=$arItem["ID"]?>')"></div>
				<div style="clear: both;"></div>
			</div>
		<?endforeach?>

		<div class="bx_item_set_hor_item result">
			<span class="bx_item_set_result_block">
				<span class="bx_item_set_current_price"><?=$arResult["SET_ITEMS"]["PRICE"]?></span>
				<?if ($arResult["SET_ITEMS"]["OLD_PRICE"]):?>
				<br/><span class="bx_item_set_old_price"><?=$arResult["SET_ITEMS"]["OLD_PRICE"]?></span>
				<?endif?>
				<?if ($arResult["SET_ITEMS"]["PRICE_DISCOUNT_DIFFERENCE"]):?>
				<br/><span class="bx_item_set_economy_price"><?=GetMessage("CATALOG_SET_DISCOUNT_DIFF", array("#PRICE#" => $arResult["SET_ITEMS"]["PRICE_DISCOUNT_DIFFERENCE"]))?></span>
				<?endif?>
			</span>
			<a href="javascript:void(0)" onclick="catalogSetDefaultObj_<? echo $intElementID; ?>.Add2Basket();" class="bx_bt_button_type_2 bx_medium"><?=GetMessage("CATALOG_SET_BUY")?></a>
		</div>

		<div style="clear: both;"></div>
	</div>
	<a class="bx_item_set_creator_link" href="javascript:void(0)" onclick="OpenCatalogSetPopup('<?=$intElementID?>');"><?=GetMessage("CATALOG_SET_CONSTRUCT")?></a>
</div>

<?
$popupParams["AJAX_PATH"] = $this->GetFolder()."/ajax.php";
$popupParams["SITE_ID"] = SITE_ID;
$popupParams["CURRENT_TEMPLATE_PATH"] = $this->GetFolder();
$popupParams["MESS"] = array(
	"CATALOG_SET_POPUP_TITLE" => GetMessage("CATALOG_SET_POPUP_TITLE"),
	"CATALOG_SET_POPUP_DESC" => GetMessage("CATALOG_SET_POPUP_DESC"),
	"CATALOG_SET_BUY" => GetMessage("CATALOG_SET_BUY"),
	"CATALOG_SET_SUM" => GetMessage("CATALOG_SET_SUM"),
	"CATALOG_SET_DISCOUNT" => GetMessage("CATALOG_SET_DISCOUNT"),
	"CATALOG_SET_WITHOUT_DISCOUNT" => GetMessage("CATALOG_SET_WITHOUT_DISCOUNT"),
);
$popupParams["ELEMENT"] = $arResult["ELEMENT"];
$popupParams["SET_ITEMS"] = $arResult["SET_ITEMS"];
$popupParams["DEFAULT_SET_IDS"] = $arResult["DEFAULT_SET_IDS"];
$popupParams["ITEMS_RATIO"] = $arResult["ITEMS_RATIO"];
?>
<script type="text/javascript">
	BX.message({
		setItemAdded2Basket: '<?=GetMessageJS("CATALOG_SET_ADDED2BASKET")?>',
		setButtonBuyName: '<?=GetMessageJS("CATALOG_SET_BUTTON_BUY")?>',
		setButtonBuyUrl: '<?=$arParams["BASKET_URL"]?>',
		setIblockId: '<?=$arParams["IBLOCK_ID"]?>',
		setOffersCartProps: <?=CUtil::PhpToJSObject($arParams["OFFERS_CART_PROPERTIES"])?>
	});

	BX.ready(function(){
		catalogSetDefaultObj_<?=$intElementID; ?> = new catalogSetConstructDefault(
			<?=CUtil::PhpToJSObject($arResult["DEFAULT_SET_IDS"])?>,
			'<? echo $this->GetFolder(); ?>/ajax.php',
			'<?=$arResult["ELEMENT"]["PRICE_CURRENCY"]?>',
			'<?=SITE_ID?>',
			'<?=$intElementID?>',
			'<?=($arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] ? $arResult["ELEMENT"]["DETAIL_PICTURE"]["src"] : $this->GetFolder().'/images/no_foto.png')?>',
			<?=CUtil::PhpToJSObject($arResult["ITEMS_RATIO"])?>
		);
	});

	if (!window.arSetParams)
	{
		window.arSetParams = [{'<?=$intElementID?>' : <?echo CUtil::PhpToJSObject($popupParams)?>}];
	}
	else
	{
		window.arSetParams.push({'<?=$intElementID?>' : <?echo CUtil::PhpToJSObject($popupParams)?>});
	}

	function OpenCatalogSetPopup(element_id)
	{
		if (window.arSetParams)
		{
			for(var obj in window.arSetParams)
			{
				if (window.arSetParams.hasOwnProperty(obj))
				{
					for(var obj2 in window.arSetParams[obj])
					{
						if (window.arSetParams[obj].hasOwnProperty(obj2))
						{
							if (obj2 == element_id)
								var curSetParams = window.arSetParams[obj][obj2]
						}
					}
				}
			}
		}

		BX.CatalogSetConstructor =
		{
			bInit: false,
			popup: null,
			arParams: {}
		};
		BX.CatalogSetConstructor.popup = BX.PopupWindowManager.create("CatalogSetConstructor_"+element_id, null, {
			autoHide: false,
			offsetLeft: 0,
			offsetTop: 0,
			overlay : true,
			draggable: {restrict:true},
			closeByEsc: false,
			closeIcon: { right : "12px", top : "10px"},
			titleBar: {content: BX.create("span", {html: "<div><?=GetMessage("CATALOG_SET_POPUP_TITLE_BAR")?></div>"})},
			content: '<div style="width:250px;height:250px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
			events: {
				onAfterPopupShow: function()
				{
					BX.ajax.post(
						'<? echo $this->GetFolder(); ?>/popup.php',
						{
							lang: BX.message('LANGUAGE_ID'),
							site_id: BX.message('SITE_ID') || '',
							arParams:curSetParams,
							theme: '<? echo $arParams['TEMPLATE_THEME']; ?>'
						},
						BX.delegate(function(result)
						{
							this.setContent(result);
							BX("CatalogSetConstructor_"+element_id).style.left = (window.innerWidth - BX("CatalogSetConstructor_"+element_id).offsetWidth)/2 +"px";
							var popupTop = document.body.scrollTop + (window.innerHeight - BX("CatalogSetConstructor_"+element_id).offsetHeight)/2;
							BX("CatalogSetConstructor_"+element_id).style.top = popupTop > 0 ? popupTop+"px" : 0;
						},
						this)
					);
				}
			}
		});

		BX.CatalogSetConstructor.popup.show();
	}
</script>
<?endif?>

<pre><?print_r($arResult["SET_ITEMS"]["DEFAULT"])?></pre>
<pre><?print_r($arParams)?></pre>