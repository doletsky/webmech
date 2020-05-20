<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?><?
$Sum = CSalePaySystemAction::GetParamValue("SHOULD_PAY");
$ShopID = CSalePaySystemAction::GetParamValue("SHOP_ID");
$customerNumber = CSalePaySystemAction::GetParamValue("ORDER_ID");
$orderDate = CSalePaySystemAction::GetParamValue("ORDER_DATE");
$orderNumber = CSalePaySystemAction::GetParamValue("ORDER_ID");
$Sum = number_format($Sum, 2, ',', '');
?>
<font class="tablebodytext">
Сумма к оплате: <b><?=$Sum?> р.</b><br />
<br />

</font>

<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
    <input type="hidden" name="receiver" value="<?=$ShopID?>">
    <input type="hidden" name="formcomment" value="Сам себе университет">
    <input type="hidden" name="short-dest" value="Тренниг 'Порядок на столе' ">
    <input type="hidden" name="label" value="<?=$orderNumber?>">
    <input type="hidden" name="quickpay-form" value="donate">
    <input type="hidden" name="targets" value="транзакция <?=$orderNumber?>">
    <input type="hidden" name="sum" value="<?=$Sum?>" data-type="number">
    <input type="hidden" name="comment" value="">
    <input type="hidden" name="need-fio" value="false">
    <input type="hidden" name="need-email" value="false">
    <input type="hidden" name="need-phone" value="false">
    <input type="hidden" name="need-address" value="false">
    <label><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
    <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
    <input type="submit" value="Перевести">
</form>