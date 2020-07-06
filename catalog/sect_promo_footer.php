<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<footer id="footer-mini">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form id="feedback" class="feedback">
                    <div class="feedback_title"><h2 class="white">Остались вопросы?</h2></div>
                    <input class="feedback_addres" type="text" name="addres" placeholder="Куда Вам ответить?">
                    <textarea class="feedback_qwest" name="qwest" placeholder="Ваш вопрос."></textarea>
                    <input class="feedback_detect" type="hidden">
                    <input type="button" class="feedback_button btn colorful" name="button" value="Отправить">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyrights-message text-white">2020 © <strong>Сам себе университет</strong>. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
<?
//очистка корзины
if (CModule::IncludeModule("sale"))
{
    CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
}
?>