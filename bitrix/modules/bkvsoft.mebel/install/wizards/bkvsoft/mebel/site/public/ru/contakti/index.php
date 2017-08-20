<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("title","Контакты");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");
?>
  <!-- CONTAINER -->
        <article class="container map">
            <div id="map">
            <?
    $APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
	"INIT_MAP_TYPE" => "MAP",
	"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.741459219199164;s:10:\"yandex_lon\";d:37.6234387633413;s:12:\"yandex_scale\";i:14;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.62498371573387;s:3:\"LAT\";d:55.74007923332384;s:4:\"TEXT\";s:16:\"Мы находимся тут\";}}}",
	"MAP_WIDTH" => "100%",
	"MAP_HEIGHT" => "500",
	"CONTROLS" => array(
	),
	"OPTIONS" => array(
	),
	"MAP_ID" => ""
	),
	false
);  ?>     <!-- /.container -->

        <!-- CONTAINER -->
        <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/kontakti.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
        
        <!-- /.container -->

        <!-- CONTAINER -->
        <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/kontakti.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
        <article class="container m-center inforow">
        <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/obratnaya_svyaz.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
            
            <div class="col-sm-6">
            <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"",
	Array(
    "AJAX_MODE" => "Y",  // режим AJAX
"AJAX_OPTION_SHADOW" => "N", // затемнять область
"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента.
"AJAX_OPTION_STYLE" => "Y", // подключать стили
"AJAX_OPTION_HISTORY" => "N",
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => "info@mail.ru",
		"REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE"),
		"EVENT_MESSAGE_ID" => array("7")
	)
);?>

            </div>
        </article>
        <!-- /.container -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>