<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//Не менять без включения мозга!!! По Error 404 в заголовке страницы работает Google Tag Manager
$APPLICATION->SetPageProperty('title', "Страница не найдена (Error 404)");
?>
    <main class="p-4 flex-fill d-flex">
        <div class="row flex-fill align-items-center text-center">
            <div class="col">
                <h1 class="display-1 font-weight-bold mb-0">404<br><span class="lnr lnr-paw"></span></h1>
                <h6 class="text-uppercase">Страница не найдена</h6>
                <p class="text-muted">
                    Такой страницы не существует. <br>
                    Попробуйте воспользоваться поиском по сайту.
                </p>
                <a href="/" class="btn btn-lg btn-primary">Главная</a>
            </div>
        </div>
    </main>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>