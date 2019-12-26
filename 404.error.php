<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
//@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty('title', "Страница не найдена");
?>
    <div class="w1000">
        <div class="message_page">
            <div class="message_box">
                <div class="message_box_h h_404">404!</div>
                <div class="message_box_sh">Страница не найдена</div>
                <div class="message_box_t">Возможно, вы перешли по неработающей ссылке или неверно ввели адрес. Проверьте адрес или перейдите на главную страницу.</div>
                <div class="message_box_bl">
                    <a href="/" class="message_box_back">Вернуться на главную</a>
                </div>
            </div>
        </div>

    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>