<?$arResult['USER']=CUser::GetByID($USER->GetID())->Fetch();?>
    <div class="basketbox_wrapper">
        <div class="basketbox_bg"></div>
        <div class="basketbox">
            <div class="basketbox_header">
                <div class="basketbox_header_logo">Ваша Корзина</div>
                <div class="basketbox_header_close"><img alt="" src="/img/basket/basket_close.png"></div>
            </div>
            <div class="basketbox_content">
                <div class="basketbox_content_topline">
                    <div class="basketbox_content_topline_totalprice">
                        <span class="basketbox_content_topline_totalprice_label">Итого:</span>
                        <span class="basketbox_content_topline_totalprice_count"><span>9375</span>р.</span>
                    </div>
                    <a class="basketbox_content_topline_button" href="/personal/login.php?checkout=Y">Оформить заказ</a>
                    <div class="basketbox_box_send">
                        <div class="basketbox_order_to_print">Распечатать</div><div class="basketbox_order_to_email">Отправить на e-mail</div>
                        <div class="basketbox_order_to_email_for_send">
                            <div class="basketbox_order_to_email_for_send_close">+</div>
                            Введите адрес получателя<br>
                            <input id="user_email_add" type="email" value="<?=$arResult['USER']['EMAIL']?>" /><br>
                            <div class="basketbox_order_to_email_send_send">Отправить</div>
                        </div>
                    </div>
                </div><!-- end .basketbox_content_topline -->
                <div class="basketbox_content_items_wrapper">
                    <div class="basketbox_content_items">

                    </div>
                </div><!-- end .basketbox_content_items_wrapper -->
                <div class="basketbox_content_preloader">
                    <img alt="" src="images/basket/preloader.png">
                </div>
                <div class="basketbox_content_message">
                    Товаров в корзине нет
                </div>
            </div><!-- end .basketbox_content -->
            <div class="basketbox_footer">
                <ul>
                    <li><img class="webmoney" alt="" src="/img/basket/webmoney.png"></li>
                    <li><img class="yandex" alt="" src="/img/basket/yandex.png"></li>
                    <li><img class="qiwi" alt="" src="/img/basket/qiwi.png"></li>
                    <li><img class="cards" alt="" src="/img/basket/cards.png"></li>
                </ul>
            </div><!-- end .basketbox_footer -->
        </div><!-- end .basketbox -->
    </div>