<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<!--DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head-->
<?
//$APPLICATION->AddHeadString('<script type="text/javascript" src="/bitrix/js/main/core/core.js?'.SM_VERSION.'"></script>');

//$APPLICATION->AddHeadString('<link rel="icon" type="image/x-icon" href="/favicon.ico" />');

//$APPLICATION->AddHeadString('<meta property="og:title" content="Индигос" />');
//$APPLICATION->AddHeadString('<meta property="og:type" content="website" />');
//$APPLICATION->AddHeadString('<meta property="og:url" content="http://www.indigos.ru" />');
//$APPLICATION->AddHeadString('<meta property="og:image" content="http://www.indigos.ru/images/girl.png" />');
//$APPLICATION->AddHeadString('<meta property="og:description" content="Магазин образовательного контента «Индигос»" />');
//$APPLICATION->SetAdditionalCSS("/bitrix/templates/.default/styles.css");
//$APPLICATION->AddHeadString('<link rel="stylesheet" href="/bitrix/templates/new-indigos/css/login.css">');
//$APPLICATION->AddHeadString('<link rel="stylesheet" href="/bitrix/templates/new-indigos/css/main.css">');
?>
    <!--title><?//$APPLICATION->ShowTitle()?></title-->

<?//$APPLICATION->ShowPanel();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сам себе унивеситет - самообразование в сфере IT для заработка.</title>
    <link href="<?=SITE_TEMPLATE_PATH?>/css/animate.min.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/linearicons.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/dataTables.bootstrap4.min.css" rel="stylesheet" media="none" onload="if(media!=&apos;all&apos;)media=&apos;all&apos;">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/theme-green.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/styles.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/banner_ssu.css" rel="stylesheet">
    <?$APPLICATION->ShowHead();?>
</head>
<body class="navbar-expand-lg faster" data-wow-delay="300ms" data-spy="scroll" data-target="#sm" data-offset="60">
<div class="container-fluid fixed-top bg-primary" id="topnav">
    <div class="row collapse no-gutters d-flex h-100 position-relative sidebar-collapse">
        <div class="col-3 pr-4 w-sidebar navbar-collapse collapse d-none d-lg-flex">
            <input class="form-control form-control-sm border-0 font-weight-light rounded-pill" type="text" placeholder="search...">
        </div>
        <div class="col">
            <nav class="navbar navbar-dark navbar-expand px-lg-1">
                <a data-toggle="collapse" href="#" data-target=".sidebar-collapse" class="navbar-brand mr-3" aria-expanded="true">
                    <span class="h4 align-middle mb-0"><span class="lnr lnr-menu"></span></span>
                </a>
                <a class="title-name" href="#" title="Сам себе унивеситет" aria-expanded="false"><span class="lnr lnr-graduation-hat text-white"></span></a>
                <a class="navbar-brand" href="/" title="Home">Сам себе унивеситет</a>
                <ul class="navbar-nav ml-auto mr-2">
                    <li class="nav-item dropdown position-static mr-1">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mega
                        </a>
                        <ul class="dropdown-menu w-100 shadow-lg animate-grow-in border-0" id="navbarDropdownMega">
                            <li class="px-3 pt-2">
                                <div class="row py-2">
                                    <div class="col-md-6 col-lg-3 pb-2">
                                        <div class="card h-100">
                                            <div class="card-body p-2 d-flex flex-column justify-content-center">
                                                <div class="d-flex p-1 align-items-center">
                                                    <div class="flex-shrink-1">
                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/profile_1.png" class="img-fluid rounded-circle avatar" style="height: 35px;">
                                                    </div>
                                                    <div class="flex-grow-1 p-2">
                                                        Mark Jones
                                                    </div>
                                                </div>
                                                <div class="d-flex p-1 align-items-center">
                                                    <div class="flex-shrink-1">
                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/profile_2.png" class="img-fluid rounded-circle avatar" style="height: 35px;">
                                                    </div>
                                                    <div class="flex-grow-1 p-2">
                                                        Randy Philips
                                                    </div>
                                                </div>
                                                <div class="d-flex p-1 align-items-center">
                                                    <div class="flex-shrink-1">
                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/profile_3.png" class="img-fluid rounded-circle avatar" style="height: 35px;">
                                                    </div>
                                                    <div class="flex-grow-1 p-2">
                                                        Amy Rice
                                                    </div>
                                                </div>
                                                <div class="d-flex p-1 align-items-center">
                                                    <div class="flex-shrink-1">
                                                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/profile_4.png" class="img-fluid rounded-circle avatar" style="height: 35px;">
                                                    </div>
                                                    <div class="flex-grow-1 p-2">
                                                        Anjay Sinhg
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 pb-2">
                                        <div class="card rounded-lg h-100">
                                            <div class="card-body py-3 d-flex flex-column">
                                                <h6 class="text-uppercase small">New Customer</h6>
                                                <h4 class="mb-0 text-info text-truncate">Austin Farnum</h4>
                                                <p class="mt-1 text-truncate">Fort Knox, TX 28192</p>
                                                <h3 class="mb-0 mt-auto">$197.55</h3>
                                                <div>Total items: 3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 pb-2 text-center">
                                        <form>
                                            <div class="position-relative form-group">
                                                <input name="name" id="textname1" placeholder="Name" type="text" class="form-control">
                                            </div>
                                            <div class="position-relative form-group">
                                                <input name="email" id="exampleEmail2" placeholder="Email" type="email" class="form-control">
                                            </div>
                                            <div class="position-relative form-group">
                                                <textarea name="text" id="exampleText2" placeholder="Message" class="form-control"></textarea>
                                            </div>
                                            <button class="btn btn-primary float-right" type="button">Submit</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6 col-lg-3 pb-2">
                                        <div class="card rounded-lg h-100">
                                            <div class="card-body py-3 d-flex flex-column">
                                                <h6 class="text-uppercase small">More</h6>
                                                <p>Add any content that is needed here to inspire the audience and spark the conversation. Format this in a responsive way to works across all devices.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link py-0 text-truncate" data-toggle="dropdown">
                                <span class="align-middle" data-toggle="tooltip" data-placement="left" title="You are logged in">
                                    Robojo
                                </span>
                            <img alt="avatar" src="<?=SITE_TEMPLATE_PATH?>/assets/m20.jpg" class="avatar mx-1 ml-0 rounded-circle bg-white shadow-sm">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3 border-light shadow text-uppercase animate-grow-in">
                            <a class="dropdown-item px-3" href="#profile" data-target="#modalProfile" data-toggle="modal"><span class="lnr lnr-user"></span> Profile</a>
                            <a class="dropdown-item px-3" href="./inbox.html">
                                <span class="lnr lnr-inbox"></span> Inbox <span class="badge badge-primary badge-pill font-weight-light align-middle mb-1 pt-0" title="notify count"><small>3</small></span>
                            </a>
                            <a class="dropdown-item px-3" href="#edit" data-target="#modalProfile" data-toggle="modal"><span class="lnr lnr-cog"></span> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item px-3" href="#modalSmall" data-target="#modalSmall" data-toggle="modal"><span class="lnr lnr-exit"></span> Logout</a>
                            <a class="dropdown-item px-3 font-weight-bold" href="//themes.guide" target="_new" rel="nofollow">About Forque</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid h-100 px-0">
    <div class="row collapse no-gutters d-flex h-100 position-relative sidebar-collapse">
        <div class="col-3 p-0 h-100 w-sidebar navbar-collapse collapse d-none d-lg-flex sidebar-collapse sidebar">
            <!-- fixed sidebar -->
            <?$APPLICATION->IncludeComponent(
                "forque:menu",
                "vertical",
                Array(
                    "ROOT_MENU_TYPE" => "top",
                    "MAX_LEVEL" => "1",
                    "USE_EXT" => "N",
                    "DELAY" => "Y",
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array()
                )
            );?>
        </div>
        <div class="col p-0 d-flex flex-column">