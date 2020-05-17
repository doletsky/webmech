<?php
/**
 * Class AgentSendReminder
 *
 * Клас осуществляет выборку всех заказов, не оплаченых более 12 часов и высылает сообщение о брошенной корзине.
 * Посе чего выстаялется статус заказа "Ожидается оплата. Выслано напоминание."
 * Требуется предустановленный шаблон ORDER_REMINDER и подключенный модуль sale
 *
 * @author Шубский Артем <artem-s86@yandex.ru>
 *
 * @version 1.0
 */

class AgentSendReminder {

    /**
     * Функция для отправки e-mail'ов всем пользователям, которые не оплатили свой заказ.
     * Кроме того, функция проверяет наличие переданного статуса и в случае отсутсвия, создает его.
     * Создание заказа работает только если установленно 2 языка русский и английский. Иначе необходимо создать статус вручную.
     *
     * @param $status код статуса который определяет что письмо уже было отправлено
     * @return string Название функции для Bitrix - агентов
     */
    public static function sendReminder( $status = 'R' )
    {
        if (self::checkOrderStatus($status))
        {
            self::doSendEmail($status);
        }

        return "AgentSendReminder::sendReminder();";
    }

    /**
     * Проверяет наличие статуса заказа и в случае необходимости создает его
     *
     * @param $status статус заказа для проверки, в случае отсутсвия будет создан статус с таким кодом
     * @return bool true если статус заказа существует, иначе false
     */
    private static function checkOrderStatus( $status )
    {
        $arStatus = CSaleStatus::GetByID($status);

        if ($arStatus)
        {
            return true;
        }
        else
        {
            $arStatusFields = array(
                'ID' => $status
                , 'SORT' => 100
                , 'LANG' => array(
                    array(
                            'LID' => 'ru'
                        , 'NAME' => 'Ожидается оплата, выслано напоминание.'
                        , 'DESCRIPTION' => 'Заказ еще не оплачен, пользователю на e-mail выслано напоминание об оплате.'
                    ),
                    array(
                            'LID' => 'en'
                        , 'NAME' => 'Expected to pay, sent a reminder.'
                        , 'DESCRIPTION' => 'Order has not been paid, the user on the e-mail sent a reminder for payment.'
                    )
                )
            );

            return (CSaleStatus::Add($arStatusFields)) ? true : false;
        }


    }

    /**
     * Выполняет отправку e-mail'ов всем пользователям кто бросил корзину.
     *
     * @param $status статус, который будет установлен заказу после отсылки сообщения
     */
    private static function doSendEmail( $status )
    {
        //создаем пустой объект пользователя что-бы не ругались функции битрикса
        $GLOBALS['USER'] = new CUser();

        global $DB;

        $arOrders = self::getValidOrderList($status);

        $event = new CEvent();
        foreach ($arOrders as $arOrder)
        {
            $arFieldsForSend = self::getFieldsForMessage($arOrder);
            $messId = $event->Send('ORDER_REMINDER', 's1', $arFieldsForSend);

            if ($messId > 0 && !empty($status))
            {
                $arFields = array(
                    "STATUS_ID" => $status,
                    "=DATE_STATUS" => $DB->GetNowFunction(),
                    "EMP_STATUS_ID" => false
                );

                CSaleOrder::Update($arOrder['ID'], $arFields);
            }
        }

    }

    /**
     * Получает список всех неоплаченных заказов, с момента оформления которых прошло более 12 часов и еще не высылались e-mail'ы
     * Письмо высылается только по последнему заказу, если у пользователя нет ни одного оплаченного заказа
     *
     * @param $status статус заказа, при котором считается что письмо уже высылалось
     *
     * @return array Массив с заказами или false если заказов нету.
     */
    private static function getValidOrderList( $status )
    {
        global $DB;

        $dateTime = new DateTime('now');
        $dateTime->modify('-12 h');
        $dbOrders = CSaleOrder::GetList(
            array(),
            array(
                'ACTIVE' => 'Y'
                , '<=DATE_INSERT' => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), $dateTime->getTimestamp())
                , 'PAYED' => 'N'
                , '!STATUS_ID' => array('F', $status)
            ),
            false,
            false,
            array('ID', 'USER_ID')
        );
        while ($arOrder = $dbOrders->Fetch())
        {
            $arUsers[ $arOrder['USER_ID'] ] = $arOrder['USER_ID'];
        }

        $dbOrders = CSaleOrder::GetList(
            array(),
            array(
                'USER_ID' => $arUsers,
                'ACTIVE' => 'Y',
                'STATUS_ID' => array('F', $status)
            ),
            false,
            false,
            array('ID', 'USER_ID')
        );
        while ($arPayedOrders = $dbOrders->Fetch())
        {
            unset($arUsers[ $arPayedOrders['USER_ID'] ]);
        }

        $dbOrders = CSaleOrder::GetList(
            array(),
            array(
                'USER_ID' => $arUsers
                , 'ACTIVE' => 'Y'
                , '<=DATE_INSERT' => date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), $dateTime->getTimestamp())
                , 'PAYED' => 'N'
                , '!STATUS_ID' => array('F', $status)
            ),
            false,
            false,
            array(
                'ID'
                , 'LID'
                , 'USER_EMAIL'
                , 'DATE_INSERT'
                , 'USER_ID'
            )
        );
        $arOrders = array();
        while ($arOrder = $dbOrders->Fetch())
        {
            $arOrders[ $arOrder['USER_ID'] ] = $arOrder;
        }
        
        return empty($arOrders) ? false : $arOrders;
    }

    /**
     * Возвращает поля для передачи в шаблон сообщения
     *
     * @param $arOrder массив заказа
     * @return array массив с полями для сообщения
     */

    private static function getFieldsForMessage( $arOrder )
    {
        CModule::IncludeModule('iblock');
        CModule::IncludeModule('sale');
        $arFields = array();

        $arFields['CART_HTML'] = "";
        $arFields['EMAIL'] = $arOrder['USER_EMAIL'];
        $arFields['DATE'] = $arOrder['DATE_INSERT'];
        $arFields['ID'] = $arOrder['ID'];
        $arFields['DOMAIN_NAME'] = $_SERVER["HTTP_HOST"];

        $res = CSaleBasket::GetList(
            array()
            , array('ORDER_ID'=>$arOrder['ID'])
            , false
            , false
            , array('PRODUCT_ID')
        );
        $arItemIds = array();
        while ($arBasketItem = $res->Fetch()){
            $arItemIds[] = $arBasketItem['PRODUCT_ID'];
        }

        $res = CIBlockElement::GetList(array(), array("ID" => $arItemIds), false, false, array("ID", "IBLOCK_ID", "NAME", "DETAIL_TEXT", "PROPERTY_CLASS.NAME", "PROPERTY_SUBJECT.NAME", "PROPERTY_CID", "DETAIL_PICTURE"));
        while ($arItem = $res->Fetch()){

            if ($arItem['PROPERTY_CID_VALUE']){
                $img = LINK_PREVIEW . $arItem['PROPERTY_CID_VALUE'] . '_logo-s.png';
            }
            else{
                $img = CFile::GetPath($arItem['DETAIL_PICTURE']);
            }
            var_dump($img);
            if (($arItem['PROPERTY_CLASS_NAME']) && $arItem['PROPERTY_SUBJECT_NAME']){
                $classSubject = $arItem['PROPERTY_SUBJECT_NAME']." - ".$arItem['PROPERTY_CLASS_NAME'];
            }
            else{
                $classSubject = $arItem['PROPERTY_SUBJECT_NAME'].$arItem['PROPERTY_CLASS_NAME'];
            }
            $arFields['CART_HTML'] .= <<<EOD
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border:1px solid #DDDDDD; font-size:0;">
    <tbody>
        <tr>
            <td width="10" height="10">&nbsp;</td>
            <td width="12" height="10">&nbsp;</td>
            <td width="10" height="10">&nbsp;</td>
            <td width="710" height="10">&nbsp;</td>
            <td width="10" height="10">&nbsp;</td>
        </tr>
        <tr>
            <td width="10">&nbsp;</td>
            <td width="114">
                <img src="{$img}" width="112" height="112" alt="{$arItem['NAME']}" style="border:1px solid #6B7CCC;">
            </td>
            <td width="10">&nbsp;</td>
            <td width="708">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tbody><tr>
                        <td width="710" height="32" style="color:#5d76cb; font-size:15px; font-family:Arial;border-bottom: 1px solid #dddddd;">
                            <strong>{$arItem['NAME']}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width="710" height="44">
                            <strong style="color:#635dac; font-size:12px; font-family:Arial;">{$classSubject}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td width="710" height="40" style="color:#343434; font-size:11px;font-family:Arial;">{$arItem['DETAIL_TEXT']}</td>
                    </tr>
                </tbody></table>
            </td>
            <td width="10">&nbsp;</td>
        </tr>
        <tr>
            <td width="10" height="10">&nbsp;</td>
            <td width="12" height="10">&nbsp;</td>
            <td width="10" height="10">&nbsp;</td>
            <td width="710" height="10">&nbsp;</td>
            <td width="10" height="10">&nbsp;</td>
        </tr>
    </tbody>
</table>
<table cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="16">&nbsp;</td></tr></tbody></table>
EOD;

        }
        return $arFields;
    }
}