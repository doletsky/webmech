<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?>
<main class="p-4 flex-fill">
    <?$APPLICATION->IncludeComponent(
        "bitrix:learning.course.list",
        "",
        Array(
            "SORBY" => "SORT",
            "SORORDER" => "ASC",
            "COURSE_DETAIL_TEMPLATE" => "course/index.php?COURSE_ID=#COURSE_ID#&INDEX=Y",
            "CHECK_PERMISSIONS" => "Y",
            "COURSES_PER_PAGE" => "20",
            "SET_TITLE" => "Y"
        )
    );?>
</main>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>