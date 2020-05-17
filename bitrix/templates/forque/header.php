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
                <a class="icons" href="#" title="Сам себе унивеситет" aria-expanded="false"><span class="icon-graduation icons text-white"></span></a>
                <a class="navbar-brand" href="/" title="Home">Сам себе унивеситет</a>
<!--                <div class="dropdown-menu border-light shadow text-uppercase animate-grow-in">-->
<!--                    <a class="dropdown-item px-3" href="../" target="_new">Home</a>-->
<!--                    <span class="dropdown-item-text small text-uppercase text-muted px-3">Versions</span>-->
<!--                    <a class="dropdown-item px-3" href="../static" target="_new">jQuery</a>-->
<!--                    <a class="dropdown-item px-3" href="../react" target="_new">React</a>-->
<!--                    <a class="dropdown-item px-3" href="../vue" target="_new">Vue</a>-->
<!--                </div>-->
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
            <div class="navbar navbar-dark d-block bg-dark text-white position-fixed h-100 align-self-start w-sidebar shadow-sm p-0 pt-2 pb-4 text-uppercase" id="sidebar">
                <button data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-brand my-1 mr-3 float-right p-0 d-inline-block d-lg-none btn btn-link">
                    <span class="h4 align-middle mb-0"><span class="lnr lnr-menu"></span></span>
                </button>
                <div class="nav flex-column flex-wrap" id="menu1">
                    <a href="./#" class="nav-link ripple" aria-expanded="true" data-toggle="collapse" data-target="#demo1"><i class="icon-speedometer icons"></i> Dashboards</a>
                    <div class="collapse show" data-parent="#menu1" id="demo1">
                        <div class="nav flex-column flex-wrap text-truncate">
                            <a href="./" class="nav-link">Dashboard 1</a>
                            <a href="./dashboard2.html" class="nav-link" title="Default">Dashboard 2</a>
                            <a href="./dashboard3.html" class="nav-link">Dashboard 3</a>
                            <a href="./dashboard4.html" class="nav-link">Dashboard 4</a>
                            <a href="./dashboard5.html" class="nav-link">Dashboard 5</a>
                        </div>
                    </div>
                    <a href="./charts.html" class="nav-link"><i class="icon-chart icons"></i> Charts</a>
                    <a href="./report.html" class="nav-link"><i class="icon-docs icons"></i> Reports</a>
                    <a href="#submenu1" class="nav-link ripple" data-toggle="collapse" aria-expanded="false"><i class="icon-plus icons"></i> More</a>
                    <div class="collapse" data-parent="#menu1" id="submenu1">
                        <div class="nav flex-column flex-wrap">
                            <a href="#" class="nav-link" data-target="#subsubmenu" data-toggle="collapse" aria-expanded="false">Sub level 1</a>
                            <div class="collapse" data-parent="#submenu1" id="subsubmenu">
                                <div class="nav flex-column flex-wrap text-truncate">
                                    <a href="#" class="nav-link pl-4">Subsub item 1</a>
                                    <a href="#" class="nav-link pl-4">Subsub item 2</a>
                                </div>
                            </div>
                            <a href="#" class="nav-link">Sub level 2</a>
                        </div>
                    </div>
                </div>
                <div class="nav flex-column text-truncate">
                    <a href="./inbox.html" class="nav-link"><i class="icon-drawer icons"></i> Inbox</a>
                    <a href="./kanban.html" class="nav-link"><i class="icon-notebook icons"></i> Kanban</a>
                    <a href="#profile" data-target="#modalProfile" data-toggle="modal" class="nav-link"><i class="icon-mustache icons"></i> Profile</a>
                </div>
                <div class="nav flex-column flex-wrap text-truncate" id="menu3">
                    <a href="./icons.html" class="nav-link"><i class="icon-puzzle icons"></i> Icons</a>
                    <a href="./cards.html" class="nav-link"><i class="icon-doc icons"></i> Cards</a>
                    <a href="#" class="nav-link ripple" aria-expanded="false" data-toggle="collapse" data-target="#elements"><span><i class="icon-layers icons"></i> Elements</span></a>
                    <div class="collapse" data-parent="#menu3" id="elements">
                        <div class="nav flex-column text-truncate">
                            <a class="nav-link" href="./elements.html#alerts">Alerts</a>
                            <a class="nav-link" href="./elements.html#badges">Badges</a>
                            <a class="nav-link" href="./elements.html#breadcrumbs">Breadcrumbs</a>
                            <a class="nav-link" href="./elements.html#buttons">Buttons</a>
                            <a class="nav-link" href="./elements.html#colors">Colors</a>
                            <a class="nav-link" href="./elements.html#jumbotron">Jumbotron</a>
                            <a class="nav-link" href="./elements.html#lists">Lists</a>
                            <a class="nav-link" href="./elements.html#modals">Modals</a>
                            <a class="nav-link" href="./elements.html#progress">Progress</a>
                            <a class="nav-link" href="./elements.html#sliders">Slider</a>
                            <a class="nav-link" href="./elements.html#tables">Tables</a>
                            <a class="nav-link" href="./elements.html#tabs">Tabs</a>
                            <a class="nav-link" href="./elements.html#typo">Typography</a>
                        </div>
                    </div>
                    <a href="./forms.html" class="nav-link" data-target="#forms"><span><i class="icon-note icons"></i> Forms</span></a>
                    <div class="collapse" data-parent="#menu3" id="forms">
                        <div class="nav flex-column text-truncate">
                            <a class="nav-link" href="./forms.html#formLogin">Login</a>
                            <a class="nav-link" href="./forms.html#formRegister">Sign-up</a>
                            <a class="nav-link" href="./forms.html#formChangePassword">Password</a>
                            <a class="nav-link" href="./forms.html#formResetPassword">Reset</a>
                            <a class="nav-link" href="./forms.html#formPayment">Payment</a>
                            <a class="nav-link" href="./forms.html#formUserEdit">User</a>
                            <a class="nav-link" href="./forms.html#formContact">Contact</a>
                            <a class="nav-link" href="./forms.html#formComplex">Complex</a>
                        </div>
                    </div>
                    <a href="#" class="nav-link ripple" aria-expanded="false" data-toggle="collapse" data-target="#pages"><span><i class="icon-docs icons"></i> Pages</span></a>
                    <div class="collapse" data-parent="#menu3" id="pages">
                        <div class="nav flex-column text-truncate">
                            <a class="nav-link" href="./artwork.html">Artwork</a>
                            <a class="nav-link" href="#modalLogin" data-toggle="modal">Login Modal</a>
                            <a class="nav-link" href="./timeline.html">Timeline</a>
                            <a class="nav-link" href="./faq.html">FAQ</a>
                            <a class="nav-link" href="./pricingtables.html">Pricing</a>
                            <a class="nav-link" href="./error_404.html">Error 404</a>
                            <a class="nav-link" href="./error_500.html">Error 500</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0 d-flex flex-column">