<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?> 

<!DOCTYPE html>
<html>
<head>
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <link href="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/css/style.css" rel="stylesheet">
    
<script src="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/js/jquery-2.1.1.min.js"></script>
<script src="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/js/bootstrap.min.js"></script>
<script src="/bitrix/templates/<? echo SITE_TEMPLATE_ID ?>/js/jquery.plugins.js"></script>


    
</head>
<body class="home">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header container">
        <div class="row">
            <div class="col-xs-3">
                <a href="<?echo SITE_DIR?>" class="logo">
                 <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/logo.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
               </a>
            </div>
            <div class="col-xs-9">
                <!-- Lang -->
                <nav class="lang pull-right">
                    <ul>
                        <li class="active"><a href="<?echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>">RU</a></li>
                        <li><a class="" href="http://translate.google.ru/translate?hl=ru&sl=auto&tl=en&u=<?echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>">END</a></li>
                    </ul>
                </nav>

                <!-- Mainmenu -->
                <nav class="navbar mainmenu pull-right">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <button type="button" class="pclose" data-toggle="collapse" data-target="#navbar-collapse"></button>
                        <ul class="nav navbar-nav pull-right">
                            <?$APPLICATION->IncludeComponent(
                            	"bitrix:menu",
                            	"top",
                            	Array(
                            		"ROOT_MENU_TYPE" => "top",
                            		"MENU_CACHE_TYPE" => "A",
                            		"MENU_CACHE_TIME" => "3600",
                            		"MENU_CACHE_USE_GROUPS" => "Y",
                            		"MENU_CACHE_GET_VARS" => array(""),
                            		"MAX_LEVEL" => "2",
                            		"CHILD_MENU_TYPE" => "left",
                            		"USE_EXT" => "N",
                            		"DELAY" => "N",
                            		"ALLOW_MULTI_SELECT" => "N"
                            	)
                            );?>
                        </ul>
                    </div>
                </nav>
                <!-- /.mainmenu -->
            </div>
        </div>
        <div class="row">
        
        
            <div class="col-sm-3 cart-list text-right pull-right" id="minibasket">
                
            </div>
    
            <div class="col-sm-5">
                <h1><?$APPLICATION->ShowTitle()?></h1>
            </div>
            
            <div class="col-sm-4">
            <?
global $USER;
if ($USER->IsAuthorized()){
?> 
<?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/zdravstvuyte.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/lichniy_kabinet.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                
<?}else{?>
    <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/voyti_registrachia.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
<?}?>
            </div>
        </div>
    </header>
    <!-- /.header -->

    <!-- CONTENT -->
    <div class="content container">