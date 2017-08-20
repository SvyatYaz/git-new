<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
$APPLICATION->SetPageProperty("title","Каталог");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");
?>
     <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."catalog/indexs.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>