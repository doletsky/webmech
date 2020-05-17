<?php
/**
 * class CReferer
 */
namespace inXL
{
    class CReferer
    {
        public static function IsEmptyReferer ()
        {
            global $APPLICATION;

            $referer = $APPLICATION->get_cookie('REFERER');

            return ($referer == '') ? true : false;
        }

        public static function SetReferer ($referer)
        {
            global $APPLICATION;

            $APPLICATION->set_cookie('REFERER', $referer);
        }

        public static function GetReferer ()
        {
            global $APPLICATION;

            $referer = $APPLICATION->get_cookie('REFERER');

            return ($referer == '') ? false : urldecode($referer);
        }

        public static function WriteRefererToUser ($userId)
        {
            if (self::IsEmptyReferer())
            {
                return;
            }

            $dateTime = new \DateTime('now');
            $arUser = \CUser::GetById($userId)->Fetch();
            $tmpUser = new \CUser();
            $arOrigin = $arUser['UF_ORIGIN'];
            $arOrigin[] = $dateTime->format('Y-m-d H:i:s') . ' :: ' . self::GetReferer();
            return $tmpUser->Update($arUser['ID'], array('UF_ORIGIN' => $arOrigin));
        }

        public static function CheckAndWriteOrigin ($userId)
        {
            if (self::IsEmptyReferer() || self::IsSetOrigin($userId))
            {
                return;
            }

            \CModule::IncludeModule('iblock');
            $tmpUser = new \CUser();
            $dbIBOrigin = \CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'ACTIVE_DATE' => 'Y'
                ),
                false,
                false,
                array('ID', 'PROPERTY_URL_MASK')
            );
            $originId = false;
            while ($arIBOrigin = $dbIBOrigin->Fetch())
            {
                $urlMask = $arIBOrigin['PROPERTY_URL_MASK_VALUE'];
                if (mb_strpos(self::GetReferer(), $urlMask) !== false)
                {
                    $originId = $arIBOrigin['ID'];
                    break;
                }
            }

            if ($originId !== false)
            {
                $tmpUser->Update($userId, array('UF_IB_ORIGIN' => $originId));
            }

            return;
        }

        public static function IsSetOrigin ($userId)
        {
            $arUser = \CUser::GetById($userId)->Fetch();
            $originId = $arUser['UF_IB_ORIGIN'];

            return ((int) $originId > 0) ? true : false;

        }

        public static function WriteRefererToOrder ($orderId)
        {
            if (self::IsEmptyReferer() || !\CModule::IncludeModule('sale') || !\CModule::IncludeModule('iblock'))
            {
                return;
            }
            //Записываем URL
            if ($arProp = \CSaleOrderProps::GetList(array(), array('CODE' => 'ORDER_REFERER'))->Fetch()) {
                \CSaleOrderPropsValue::Add(array(
                    'NAME' => $arProp['NAME'],
                    'CODE' => $arProp['CODE'],
                    'ORDER_PROPS_ID' => $arProp['ID'],
                    'ORDER_ID' => $orderId,
                    'VALUE' => self::GetReferer(),
                ));
            }

            $dbIBOrigin = \CIBlockElement::GetList(
                array(),
                array(
                    'ACTIVE' => 'Y',
                    'ACTIVE_DATE' => 'Y'
                ),
                false,
                false,
                array('ID', 'PROPERTY_URL_MASK', 'NAME')
            );
            $originName = false;
            while ($arIBOrigin = $dbIBOrigin->Fetch())
            {
                $urlMask = $arIBOrigin['PROPERTY_URL_MASK_VALUE'];
                if (mb_strpos(self::GetReferer(), $urlMask) !== false)
                {
                    $originName = $arIBOrigin['NAME'];
                    break;
                }
            }

            if ($originName !== false)
            {
                if ($arProp = \CSaleOrderProps::GetList(array(), array('CODE' => 'ORDER_ORIGIN'))->Fetch()) {
                    \CSaleOrderPropsValue::Add(array(
                        'NAME' => $arProp['NAME'],
                        'CODE' => $arProp['CODE'],
                        'ORDER_PROPS_ID' => $arProp['ID'],
                        'ORDER_ID' => $orderId,
                        'VALUE' => $originName,
                    ));
                }
            }
        }
    }
}