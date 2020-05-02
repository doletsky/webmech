<?if($APPLICATION->GetCurDir()=='/lk/' && !$USER->IsAuthorized()) LocalRedirect('/');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title><?$APPLICATION->ShowTitle()?></title>
<meta http-equiv="Content-Type" content="text/xml; charset=windows-1251" />
<link href="/promo/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/promo/js/jquery-2.2.3.min.js"></script>
<?$APPLICATION->ShowHead();?>

</head>

<body>
<?
if ($USER->IsAdmin())$APPLICATION->ShowPanel();
?>
<div class="section-content mfp-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a class="logo-header">
                    <span class="pull-right">ONLINE</span>
                    <h4><span class="colored">PRACTICUM</span></h4>
                </a>
                <div class="clearfix"></div>
                <hr>
                <div>
                    <h2><span class="colored"><?$APPLICATION->ShowTitle()?></span></h2>
