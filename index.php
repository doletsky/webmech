<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//$APPLICATION->SetTitle("Индигос.ru — магазин образовательного контента");
?>


                    <div class="row mt-1 mb-3">
                        <div class="col-xl-9 col-md-6 pb-3 wow fadeIn">
                            <div class="card banner_1 shadow-sm h-100">
                                <div class="card-body p-xl-3 p-2 d-flex flex-column">
                                    <h4 class="font-weight-light mb-3">Visits</h4>
                                    <div class="my-auto p-1 py-2">
                                        <?if(0):?>
                                        “Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet consectetur adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?”
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 pb-3 wow fadeIn">
                            <div class="card shadow-sm h-100">
                                <div class="card-body p-xl-3 p-2 d-flex flex-column">
                                    <h4 class="font-weight-light">
                                        <div class="float-right dropdown show"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="lnr lnr-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                            </div>
                                        </div>
                                        Devices
                                    </h4>
                                    <div class="my-auto p-1">
                                        <canvas class="mx-auto p-2" id="chPie"></canvas>
                                    </div>
                                    <table class="table table-hover table-sm d-xl-table d-md-none d-sm-table mb-0 text-uppercase small">
                                        <tr>
                                            <td>Desktop</td>
                                            <td>52%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-light border">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>40%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-primary">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Tablet</td>
                                            <td>15%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-dark">&#xA0;</span></h5></td>
                                        </tr>
                                        <tr>
                                            <td>Unknown</td>
                                            <td>5%</td>
                                            <td><h5 class="mb-0 text-right"><span class="badge badge-pill bg-secondary">&#xA0;</span></h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                <h4 class="font-weight-light mb-0">Новые статьи</h4>
                            </div>
                            <?if(0):?>
                            <div class="row pt-3">
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <span class="anchor" id="card_feature"></span>
                                    <div class="card wow fadeIn shadow-sm">
                                        <div class="card-img-top card-img-top-300 card-zoom">
                                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/mtn_1.png" class="mx-auto img-fluid rounded-top d-block">
                                        </div>
                                        <div class="card-body pt-4">
                                            <h6 class="text-uppercase small">Call to Action</h6>
                                            <h3 class="card-title">Not What You Expect</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?endif;?>
                            <?$APPLICATION->IncludeComponent("bitrix:news.list","main_page",Array(
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "AJAX_MODE" => "Y",
                                    "IBLOCK_TYPE" => "articles",
                                    "IBLOCK_ID" => "30",
                                    "NEWS_COUNT" => "3",
                                    "SORT_BY1" => "ID",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER2" => "ASC",
                                    "FILTER_NAME" => "",
                                    "FIELD_CODE" => Array("ID","DETAIL_PICTURE"),
                                    "PROPERTY_CODE" => Array("SUBTITLE"),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "SET_TITLE" => "N",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "CACHE_FILTER" => "Y",
                                    "CACHE_GROUPS" => "Y",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "PAGER_TITLE" => "Новости",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => "",
                                    "PAGER_DESC_NUMBERING" => "Y",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "Y",
                                    "SET_STATUS_404" => "Y",
                                    "SHOW_404" => "Y",
                                    "MESSAGE_404" => "",
                                    "PAGER_BASE_LINK" => "",
                                    "PAGER_PARAMS_NAME" => "arrPager",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => ""
                                )
                            );?>
                        </div>
                    </div>



<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>

