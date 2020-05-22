<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"",
	Array(
		"PATH_TO_ORDER" => "/personal/cart/order.php",
		"HIDE_COUPON" => "N",
		"COLUMNS_LIST" => array("NAME", "DISCOUNT", "DELETE", "PRICE", "SUM", "PROPERTY_COURSE_ID"),
		"PRICE_VAT_SHOW_VALUE" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"ACTION_VARIABLE" => "action"
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


BX.message({
setItemAdded2Basket: 'Набор был добавлен в корзину',
setButtonBuyName: 'Перейти в корзину',
setButtonBuyUrl: '/personal/cart/basket.php',
setIblockId: '31',
setOffersCartProps: []	});

BX.ready(function(){
catalogSetDefaultObj_32205 = new catalogSetConstructDefault(
['32205','32207','32208'],
'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default/ajax.php',
'RUB',
's1',
'32205',
'/upload/resize_cache/iblock/592/150_180_1/592d8989718e6507874bd4efa1b6a302.jpeg',
{'32205':'1','32207':'1','32208':'1'}		);
});

if (!window.arSetParams)
{
window.arSetParams = [{'32205' : {'AJAX_PATH':'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default/ajax.php','SITE_ID':'s1','CURRENT_TEMPLATE_PATH':'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default','MESS':{'CATALOG_SET_POPUP_TITLE':'Добавьте аксессуар в набор','CATALOG_SET_POPUP_DESC':'Перетащите любой товар с помощью мышки в пустое поле или просто нажмите на него','CATALOG_SET_BUY':'Купить','CATALOG_SET_SUM':'Итого','CATALOG_SET_DISCOUNT':'Скидка','CATALOG_SET_WITHOUT_DISCOUNT':'Цена без скидки'},'ELEMENT':{'ID':'32205','~ID':'32205','NAME':'Треннинг &quot;Порядок на столе&quot;','~NAME':'Треннинг \"Порядок на столе\"','CODE':'trenning_poryadok_na_stole','~CODE':'trenning_poryadok_na_stole','IBLOCK_ID':'31','~IBLOCK_ID':'31','IBLOCK_SECTION_ID':'','~IBLOCK_SECTION_ID':'','DETAIL_PAGE_URL':'/catalog/trenning_poryadok_na_stole/','~DETAIL_PAGE_URL':'/catalog/trenning_poryadok_na_stole/','PREVIEW_PICTURE':'54299','~PREVIEW_PICTURE':'54299','DETAIL_PICTURE':{'src':'/upload/resize_cache/iblock/592/150_180_1/592d8989718e6507874bd4efa1b6a302.jpeg','width':'150','height':'86','size':'14078'},'~DETAIL_PICTURE':'','PREVIEW_TEXT':'Навести и поддерживать порядок на столе - способ проверить свою самоорганизацию.','~PREVIEW_TEXT':'Навести и поддерживать порядок на столе - способ проверить свою самоорганизацию.','PREVIEW_TEXT_TYPE':'text','~PREVIEW_TEXT_TYPE':'text','LANG_DIR':'/','~LANG_DIR':'/','EXTERNAL_ID':'32205','~EXTERNAL_ID':'32205','IBLOCK_TYPE_ID':'learning','~IBLOCK_TYPE_ID':'learning','IBLOCK_CODE':'trainings','~IBLOCK_CODE':'trainings','IBLOCK_EXTERNAL_ID':'','~IBLOCK_EXTERNAL_ID':'','LID':'s1','~LID':'s1','CATALOG_PRICE_ID_1':'1','~CATALOG_PRICE_ID_1':'1','CATALOG_GROUP_ID_1':'1','~CATALOG_GROUP_ID_1':'1','CATALOG_PRICE_1':'1.00','~CATALOG_PRICE_1':'1.00','CATALOG_CURRENCY_1':'RUB','~CATALOG_CURRENCY_1':'RUB','CATALOG_QUANTITY_FROM_1':'','~CATALOG_QUANTITY_FROM_1':'','CATALOG_QUANTITY_TO_1':'','~CATALOG_QUANTITY_TO_1':'','CATALOG_GROUP_NAME_1':'цена','~CATALOG_GROUP_NAME_1':'цена','CATALOG_CAN_ACCESS_1':'Y','~CATALOG_CAN_ACCESS_1':'Y','CATALOG_CAN_BUY_1':'Y','~CATALOG_CAN_BUY_1':'Y','CATALOG_EXTRA_ID_1':'','~CATALOG_EXTRA_ID_1':'','CATALOG_QUANTITY':'0','~CATALOG_QUANTITY':'0','CATALOG_QUANTITY_RESERVED':'0','~CATALOG_QUANTITY_RESERVED':'0','CATALOG_QUANTITY_TRACE':'N','~CATALOG_QUANTITY_TRACE':'N','CATALOG_QUANTITY_TRACE_ORIG':'D','~CATALOG_QUANTITY_TRACE_ORIG':'D','CATALOG_CAN_BUY_ZERO':'Y','~CATALOG_CAN_BUY_ZERO':'Y','CATALOG_CAN_BUY_ZERO_ORIG':'D','~CATALOG_CAN_BUY_ZERO_ORIG':'D','CATALOG_NEGATIVE_AMOUNT_TRACE':'Y','~CATALOG_NEGATIVE_AMOUNT_TRACE':'Y','CATALOG_NEGATIVE_AMOUNT_ORIG':'D','~CATALOG_NEGATIVE_AMOUNT_ORIG':'D','CATALOG_SUBSCRIBE':'Y','~CATALOG_SUBSCRIBE':'Y','CATALOG_SUBSCRIBE_ORIG':'D','~CATALOG_SUBSCRIBE_ORIG':'D','CATALOG_AVAILABLE':'Y','~CATALOG_AVAILABLE':'Y','CATALOG_WEIGHT':'0','~CATALOG_WEIGHT':'0','CATALOG_WIDTH':'0','~CATALOG_WIDTH':'0','CATALOG_LENGTH':'0','~CATALOG_LENGTH':'0','CATALOG_HEIGHT':'0','~CATALOG_HEIGHT':'0','CATALOG_MEASURE':'','~CATALOG_MEASURE':'','CATALOG_VAT':'0.00','~CATALOG_VAT':'0.00','CATALOG_VAT_INCLUDED':'N','~CATALOG_VAT_INCLUDED':'N','CATALOG_PRICE_TYPE':'S','~CATALOG_PRICE_TYPE':'S','CATALOG_RECUR_SCHEME_TYPE':'D','~CATALOG_RECUR_SCHEME_TYPE':'D','CATALOG_RECUR_SCHEME_LENGTH':'0','~CATALOG_RECUR_SCHEME_LENGTH':'0','CATALOG_TRIAL_PRICE_ID':'','~CATALOG_TRIAL_PRICE_ID':'','CATALOG_WITHOUT_ORDER':'N','~CATALOG_WITHOUT_ORDER':'N','CATALOG_SELECT_BEST_PRICE':'Y','~CATALOG_SELECT_BEST_PRICE':'Y','CATALOG_PURCHASING_PRICE':'0.00','~CATALOG_PURCHASING_PRICE':'0.00','CATALOG_PURCHASING_CURRENCY':'RUB','~CATALOG_PURCHASING_CURRENCY':'RUB','CATALOG_TYPE':'1','~CATALOG_TYPE':'1','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'1','PRICE_PRINT_DISCOUNT_VALUE':'1 р.','PRICE_VALUE':'1','PRICE_PRINT_VALUE':'1 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_DISCOUNT_PERCENT':'0','CAN_BUY':true},'SET_ITEMS':{'DEFAULT':[{'ID':'32207','NAME':'Кураторство','DETAIL_PAGE_URL':'/learning/detail.php?ID=32207','DETAIL_PICTURE':'','PREVIEW_PICTURE':'','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'8','PRICE_PRINT_DISCOUNT_VALUE':'8 р.','PRICE_VALUE':'8','PRICE_PRINT_VALUE':'8 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_CONVERT_DISCOUNT_VALUE':'8','PRICE_CONVERT_VALUE':'8'},{'ID':'32208','NAME':'Индивидуальная поддержка ','DETAIL_PAGE_URL':'/learning/detail.php?ID=32208','DETAIL_PICTURE':'','PREVIEW_PICTURE':'','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'18','PRICE_PRINT_DISCOUNT_VALUE':'18 р.','PRICE_VALUE':'18','PRICE_PRINT_VALUE':'18 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_CONVERT_DISCOUNT_VALUE':'18','PRICE_CONVERT_VALUE':'18'}],'OTHER':[],'PRICE':'27 р.','OLD_PRICE':'0','PRICE_DISCOUNT_DIFFERENCE':'0'},'DEFAULT_SET_IDS':['32205','32207','32208'],'ITEMS_RATIO':{'32205':'1','32207':'1','32208':'1'}}}];
}
else
{
window.arSetParams.push({'32205' : {'AJAX_PATH':'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default/ajax.php','SITE_ID':'s1','CURRENT_TEMPLATE_PATH':'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default','MESS':{'CATALOG_SET_POPUP_TITLE':'Добавьте аксессуар в набор','CATALOG_SET_POPUP_DESC':'Перетащите любой товар с помощью мышки в пустое поле или просто нажмите на него','CATALOG_SET_BUY':'Купить','CATALOG_SET_SUM':'Итого','CATALOG_SET_DISCOUNT':'Скидка','CATALOG_SET_WITHOUT_DISCOUNT':'Цена без скидки'},'ELEMENT':{'ID':'32205','~ID':'32205','NAME':'Треннинг &quot;Порядок на столе&quot;','~NAME':'Треннинг \"Порядок на столе\"','CODE':'trenning_poryadok_na_stole','~CODE':'trenning_poryadok_na_stole','IBLOCK_ID':'31','~IBLOCK_ID':'31','IBLOCK_SECTION_ID':'','~IBLOCK_SECTION_ID':'','DETAIL_PAGE_URL':'/catalog/trenning_poryadok_na_stole/','~DETAIL_PAGE_URL':'/catalog/trenning_poryadok_na_stole/','PREVIEW_PICTURE':'54299','~PREVIEW_PICTURE':'54299','DETAIL_PICTURE':{'src':'/upload/resize_cache/iblock/592/150_180_1/592d8989718e6507874bd4efa1b6a302.jpeg','width':'150','height':'86','size':'14078'},'~DETAIL_PICTURE':'','PREVIEW_TEXT':'Навести и поддерживать порядок на столе - способ проверить свою самоорганизацию.','~PREVIEW_TEXT':'Навести и поддерживать порядок на столе - способ проверить свою самоорганизацию.','PREVIEW_TEXT_TYPE':'text','~PREVIEW_TEXT_TYPE':'text','LANG_DIR':'/','~LANG_DIR':'/','EXTERNAL_ID':'32205','~EXTERNAL_ID':'32205','IBLOCK_TYPE_ID':'learning','~IBLOCK_TYPE_ID':'learning','IBLOCK_CODE':'trainings','~IBLOCK_CODE':'trainings','IBLOCK_EXTERNAL_ID':'','~IBLOCK_EXTERNAL_ID':'','LID':'s1','~LID':'s1','CATALOG_PRICE_ID_1':'1','~CATALOG_PRICE_ID_1':'1','CATALOG_GROUP_ID_1':'1','~CATALOG_GROUP_ID_1':'1','CATALOG_PRICE_1':'1.00','~CATALOG_PRICE_1':'1.00','CATALOG_CURRENCY_1':'RUB','~CATALOG_CURRENCY_1':'RUB','CATALOG_QUANTITY_FROM_1':'','~CATALOG_QUANTITY_FROM_1':'','CATALOG_QUANTITY_TO_1':'','~CATALOG_QUANTITY_TO_1':'','CATALOG_GROUP_NAME_1':'цена','~CATALOG_GROUP_NAME_1':'цена','CATALOG_CAN_ACCESS_1':'Y','~CATALOG_CAN_ACCESS_1':'Y','CATALOG_CAN_BUY_1':'Y','~CATALOG_CAN_BUY_1':'Y','CATALOG_EXTRA_ID_1':'','~CATALOG_EXTRA_ID_1':'','CATALOG_QUANTITY':'0','~CATALOG_QUANTITY':'0','CATALOG_QUANTITY_RESERVED':'0','~CATALOG_QUANTITY_RESERVED':'0','CATALOG_QUANTITY_TRACE':'N','~CATALOG_QUANTITY_TRACE':'N','CATALOG_QUANTITY_TRACE_ORIG':'D','~CATALOG_QUANTITY_TRACE_ORIG':'D','CATALOG_CAN_BUY_ZERO':'Y','~CATALOG_CAN_BUY_ZERO':'Y','CATALOG_CAN_BUY_ZERO_ORIG':'D','~CATALOG_CAN_BUY_ZERO_ORIG':'D','CATALOG_NEGATIVE_AMOUNT_TRACE':'Y','~CATALOG_NEGATIVE_AMOUNT_TRACE':'Y','CATALOG_NEGATIVE_AMOUNT_ORIG':'D','~CATALOG_NEGATIVE_AMOUNT_ORIG':'D','CATALOG_SUBSCRIBE':'Y','~CATALOG_SUBSCRIBE':'Y','CATALOG_SUBSCRIBE_ORIG':'D','~CATALOG_SUBSCRIBE_ORIG':'D','CATALOG_AVAILABLE':'Y','~CATALOG_AVAILABLE':'Y','CATALOG_WEIGHT':'0','~CATALOG_WEIGHT':'0','CATALOG_WIDTH':'0','~CATALOG_WIDTH':'0','CATALOG_LENGTH':'0','~CATALOG_LENGTH':'0','CATALOG_HEIGHT':'0','~CATALOG_HEIGHT':'0','CATALOG_MEASURE':'','~CATALOG_MEASURE':'','CATALOG_VAT':'0.00','~CATALOG_VAT':'0.00','CATALOG_VAT_INCLUDED':'N','~CATALOG_VAT_INCLUDED':'N','CATALOG_PRICE_TYPE':'S','~CATALOG_PRICE_TYPE':'S','CATALOG_RECUR_SCHEME_TYPE':'D','~CATALOG_RECUR_SCHEME_TYPE':'D','CATALOG_RECUR_SCHEME_LENGTH':'0','~CATALOG_RECUR_SCHEME_LENGTH':'0','CATALOG_TRIAL_PRICE_ID':'','~CATALOG_TRIAL_PRICE_ID':'','CATALOG_WITHOUT_ORDER':'N','~CATALOG_WITHOUT_ORDER':'N','CATALOG_SELECT_BEST_PRICE':'Y','~CATALOG_SELECT_BEST_PRICE':'Y','CATALOG_PURCHASING_PRICE':'0.00','~CATALOG_PURCHASING_PRICE':'0.00','CATALOG_PURCHASING_CURRENCY':'RUB','~CATALOG_PURCHASING_CURRENCY':'RUB','CATALOG_TYPE':'1','~CATALOG_TYPE':'1','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'1','PRICE_PRINT_DISCOUNT_VALUE':'1 р.','PRICE_VALUE':'1','PRICE_PRINT_VALUE':'1 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_DISCOUNT_PERCENT':'0','CAN_BUY':true},'SET_ITEMS':{'DEFAULT':[{'ID':'32207','NAME':'Кураторство','DETAIL_PAGE_URL':'/learning/detail.php?ID=32207','DETAIL_PICTURE':'','PREVIEW_PICTURE':'','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'8','PRICE_PRINT_DISCOUNT_VALUE':'8 р.','PRICE_VALUE':'8','PRICE_PRINT_VALUE':'8 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_CONVERT_DISCOUNT_VALUE':'8','PRICE_CONVERT_VALUE':'8'},{'ID':'32208','NAME':'Индивидуальная поддержка ','DETAIL_PAGE_URL':'/learning/detail.php?ID=32208','DETAIL_PICTURE':'','PREVIEW_PICTURE':'','PRICE_CURRENCY':'RUB','PRICE_DISCOUNT_VALUE':'18','PRICE_PRINT_DISCOUNT_VALUE':'18 р.','PRICE_VALUE':'18','PRICE_PRINT_VALUE':'18 р.','PRICE_DISCOUNT_DIFFERENCE_VALUE':'0','PRICE_DISCOUNT_DIFFERENCE':'0 р.','PRICE_CONVERT_DISCOUNT_VALUE':'18','PRICE_CONVERT_VALUE':'18'}],'OTHER':[],'PRICE':'27 р.','OLD_PRICE':'0','PRICE_DISCOUNT_DIFFERENCE':'0'},'DEFAULT_SET_IDS':['32205','32207','32208'],'ITEMS_RATIO':{'32205':'1','32207':'1','32208':'1'}}});
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
titleBar: {content: BX.create("span", {html: "<div>Собери собственный набор</div>"})},
content: '<div style="width:250px;height:250px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default/images/wait.gif"/></span></div>',
events: {
onAfterPopupShow: function()
{
BX.ajax.post(
'/bitrix/templates/forque/components/bitrix/catalog.set.constructor/.default/popup.php',
{
lang: BX.message('LANGUAGE_ID'),
site_id: BX.message('SITE_ID') || '',
arParams:curSetParams,
theme: 'blue'
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

