<?php

/**
 * Class AgentDownloadReminder
 *
 * Класс выполняет поиск пользователей, которым необходимо выслать письмо с напоминанием о необходимости скачать программу INDIGOS.
 * Поиск осуществляется по пользовательскому свойству UF_MAIL_DOWNLOAD, после успешной отправки сообщения галочка со свойства снимается.
 *
 * Пример использования AgentDownloadReminder::sendReminder();
 *
 * @author Шубский Артем <artem-s86@yandex.ru>
 *
 * @version 1.0
 */
class AgentDownloadReminder
{
    /**
     * Функция для отправки e-mail'ов всем пользователям, которые не оплатили свой заказ.
     * Кроме того, функция проверяет наличие переданного статуса и в случае отсутсвия, создает его.
     * Создание заказа работает только если установленно 2 языка русский и английский. Иначе необходимо создать статус вручную.
     *
     * @return string Название функции для Bitrix - агентов
     */
    public static function sendReminder()
    {
        self::doSendEmail();

        return "AgentDownloadReminder::sendReminder();";
    }

    /**
     * Выполняет отправку e-mail'ов всем пользователям у кого в профиле выставлена галочка по отправке .
     */
    public static function doSendEmail()
    {
        $arUsers = self::getUserList();

        $event = new CEvent();
        foreach ($arUsers as $arUser)
        {
            $arFieldsForSend = self::getFieldsForMessage($arUser);
            if ($arFieldsForSend)
            {
                $messId = $event->Send('DOWNLOAD_REMINDER', 's1', $arFieldsForSend);

                if ($messId > 0)
                {
                    self::removeNeedSendMailForDownloadPointer( $arUser );
                }
            }
        }
    }

    /**
     * Выполняет поиск активных пользователей, которым надо выслать напоминание о скачивании программы.
     *
     * @return array Список пользователей, которым надо отправить сообщения
     */
    private static function getUserList()
    {
        $dbUsers = CUser::GetList(
            ($by="SORT"),
            ($order="ASC"),
            array(
                'UF_MAIL_DOWNLOAD' => '1',
                'ACTIVE' => 'Y'
            ),
            array(
                'FIELDS' => array(
                    'ID',
                    'EMAIL'
                )
            )
        );

        $arUsers = array();
        while ($arUser = $dbUsers->Fetch())
        {
            $arUsers[] = $arUser;
        }

        return $arUsers;
    }

    /**
     * Возвращает поля для передачи в шаблон сообщения
     *
     * @param $arUser массив c данными пользователя
     * @return array массив с полями для сообщения в случае если оплаченного заказа пользователя не найдено вернет false
     */
    private static function getFieldsForMessage( $arUser )
    {
        CModule::IncludeModule('sale');
        $arFields = array();

        $arOrder = CSaleOrder::GetList(
            array(),
            array(
                'PAYED' => 'Y',
                'USER_ID' => $arUser['ID']
            ),
            false,
            false,
            array('ID')
        )->Fetch();

        if (!$arOrder)
        {
            return false;
        }

        $arBasketItem = CSaleBasket::GetList(
            array()
            , array('ORDER_ID'=>$arOrder['ID'])
            , false
            , false
            , array('NAME', 'DETAIL_PAGE_URL')
        )->Fetch();

        $arFields['EMAIL'] = $arUser['EMAIL'];
        $arFields['NAME'] = $arBasketItem['NAME'];
        $arFields['PRODUCT_LINK'] = $arBasketItem['DETAIL_PAGE_URL'];

        return $arFields;
    }

    /**
     * Функция снимает галочку о необходимости отправить напоминание о скачивании программы
     *
     * @param $arUser массив с данными пользователя
     */
    private  static function removeNeedSendMailForDownloadPointer( $arUser )
    {
        $user = new CUser;
        $user->Update($arUser['ID'], array('UF_MAIL_DOWNLOAD' => null));
    }
} 