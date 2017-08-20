<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("магазин много мебели");
$APPLICATION->SetPageProperty("title","магазин много мебели");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");
?>


        <article class="text-section text-quote clearfix m-center inforow">
            <section>
                <div class="col-sm-1 no-padding">
                    <div class="icon icon-xs" data-icon=""></div>
                </div>
                <div class="col-sm-8">
                    <blockquote>
                    <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/vhod_na_sait.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                    
                    
<?
global $USER;
if ($USER->IsAuthorized()){
?> 
  <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/vi_uge_pereyti.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>

<?}else{?>


           <?$APPLICATION->IncludeComponent(
   "bitrix:system.auth.form",
   "",
   Array(
      "REGISTER_URL" => "",
      "PROFILE_URL" => "",
      "SHOW_ERRORS" => "Y"
   )
     );?>   
     
                  
<?}?>
                    </blockquote>
                </div>
            </section>
        </article>
        
        
        
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>