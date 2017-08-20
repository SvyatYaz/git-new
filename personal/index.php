<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
$APPLICATION->SetPageProperty("title","Личный кабинет");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");

?>
<?
global $USER;
if ($USER->IsAuthorized()){
?> 
 <div class="container m-center">
            <div class="col-sm-5 col-sm-offset-1">
                <?
                $APPLICATION->IncludeFile(
                    SITE_DIR."include/zdravstvuyte_parsonal.php",
                    Array(),
                    Array("MODE"=>"html")
                );?>
            </div>
            <div class="col-sm-5"> 
            <?
            $APPLICATION->IncludeFile(
                SITE_DIR."include/iz_vashem.php",
                Array(),
                Array("MODE"=>"html")
            );?>
                
            </div>
        </div>
        <!-- /.container -->
        <div class="table-responsive">
            <table class="table shop_table">
                <thead><?
            $APPLICATION->IncludeFile(
                SITE_DIR."include/zakaz_data_status_itogi.php",
                Array(),
                Array("MODE"=>"html")
            );?>
                
                </thead>
                <tbody>
                 <?
                CModule::IncludeModule('iblock');
                $key = 0;
                $arFilter = Array("IBLOCK_CODE"=>"zakazi", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'INCLUDE_SUBSECTIONS'=>'Y', 'PROPERTY_IDUSER'=>$USER->GetID() );
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
                while ($ob = $res->GetNextElement())
                {
                    $arr = $ob->GetFields();
                    $arr["PROPERTIES"] = $ob->GetProperties();
                ?>

                   <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/ed.na.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                    
                <?}?>        
                </tbody>
            </table>
        </div>

        <!-- CONTAINER -->
        <article class="container bg-default inforow m-center">
            <div class="col-sm-3 col-sm-offset-1">
              <?
            $APPLICATION->IncludeFile(
                SITE_DIR."include/esli_u_vas_ostalis.php",
                Array(),
                Array("MODE"=>"html")
            );?>
                
            </div>
            
            <?/*
            <div class="col-sm-3 col-sm-offset-1">
                <h4>BILLING</h4>
                <p><a href="billing_address.html" class="text-primary">Edit</a></p>
                <address>
                    <p>Richard Flowers <br/>
                        Company, LLC</p>
                    <p>Main Piccadilly <br/>
                        Street London <br/>
                        21 Piccadilly <br/>
                        London W1J 0BH <br/>
                        United Kingdom</p>
                    <p><a href="mailto:info@samplesamp.com">info@samplesamp.com</a> <br/>
                        +44 20 7734 8000</p>
                </address>
            </div>
            */?>
            
            <?/*
            <div class="col-sm-3">
                <h4>shipping</h4>
                <p><a href="shipping_address.html" class="text-primary">Edit</a></p>
                <address>
                    <p>Richard Flowers <br/>
                        Company, LLC</p>
                    <p>Main Piccadilly <br/>
                        Street London <br/>
                        21 Piccadilly <br/>
                        London W1J 0BH <br/>
                        United Kingdom</p>
                </address>
            </div>
            */?>
        </article>


<?}else{?>  
<?
            $APPLICATION->IncludeFile(
                SITE_DIR."include/dlya_vhoda.php",
                Array(),
                Array("MODE"=>"html")
            );?>

<?}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>