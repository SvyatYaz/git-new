<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("магазин много мебели");
$APPLICATION->SetPageProperty("title","магазин много мебели");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");
?>
      <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/indexs.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>



 <article class="container bg-warning padding-x2 m-center">
<div class="col-sm-4 col-sm-offset-1">
    <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/indexs_text.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>

</article>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>