<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�������");
$APPLICATION->SetPageProperty("title","�������");
$APPLICATION->SetPageProperty("description","���� ��������");
$APPLICATION->SetPageProperty("keywords","���� ��������");
?>
     <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."catalog/indexs.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>