<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
$APPLICATION->SetPageProperty("title","Корзина");
$APPLICATION->SetPageProperty("description","Наша компания");
$APPLICATION->SetPageProperty("keywords","Наша компания");
CModule::IncludeModule("iblock");
session_start();
    if($_GET["pr"] == 'ok'){
        foreach ($_GET["kolvo"] as $id => $kolvo){
        $_SESSION["zakaz"][$id]["kolvo"] = $kolvo["0"];
        } 
    }
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/lang/ru/header.php");
?>

<style>
.ink{
    background-clip: padding-box;
    background-color: #f5f5f5;
    border-radius: 3px;
    color: #383838;
    display: block;
    font-size: 19px;
    font-weight: 400;
    height: 49px;
    letter-spacing: 0.04em;
    line-height: 49px;
    overflow: hidden;
    padding: 0 0 0 18px;
    position: relative;
    text-decoration: none;
    white-space: nowrap;
    border: none;
    width: 100%;
    color: black;
}

.ink::-webkit-input-placeholder {color:black;}
.ink::-moz-placeholder          {color:black;}/* Firefox 19+ */
.ink:-moz-placeholder           {color:black;}/* Firefox 18- */
.ink:-ms-input-placeholder      {color:black;}

.dd:-ms-input-placeholder      {color:black;}
.dd::-webkit-input-placeholder {color:black;}
.dd::-moz-placeholder          {color:black;}/* Firefox 19+ */
.dd:-moz-placeholder           {color:black;}/* Firefox 18- */
</style>



        <div class="container no-padding-top">
        
        <?if(count($_SESSION["zakaz"]) > 0){?>
       <form class="form-inline" method="get" action="">
            <div class="table-responsive">
            
           
                <table class="table shop_table cart text-center">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-left"><?=$MESS["PRODUKTI"]?></th>
                        <th class="text-center"><?=$MESS["CENA"]?></th>
                        <th class="text-center"><?=$MESS["KOLLICESTVO"]?></th>
                        <th class="text-center"><?=$MESS["ITOGO"]?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    
                      
                    <?
                    $obshcena = '';
                    foreach ($_SESSION["zakaz"] as $key => $element){
                    $res = CIBlockElement::GetByID($element['idelementa']);
                    $ar_res = $res->GetNext();
                           $cena  = '';
                           $cena = str_replace(" ","",$element['cena']);
                           $cena = (int)$cena * (int)$element['kolvo'];
                           $obshcena = (int)$obshcena + (int)$cena;
                    ?>
                    
                    <tr>
                        <td class="product-thumbnail text-left">
                            <a href="<?=$ar_res["DETAIL_PAGE_URL"]?>"><img src="<?=$arImagesPath = CFile::GetPath($ar_res['PREVIEW_PICTURE']);?>" alt=""></a>
                        </td>
                        <td class="product-name text-left">
                            <a href="<?=$ar_res["DETAIL_PAGE_URL"]?>"><?=$ar_res["NAME"]?></a>
                        </td>
                        <td>
                            <div class="product-price">&#8381; <?=$element['cena']?></div>
                        </td>
                        <td class="product-quantity">
                            <a href="" class="minus disabled">-</a>
                            <input name="kolvo[<?=$element['idelementa']?>]" type="text" value="<?=$element['kolvo']?>">
                            <a href="" class="plus">+</a>
                        </td>
                        <td class="product-subtotal">&#8381; <?=$cena?></td>
                        <td class="product-remove text-center">
                           <a style="display: block; width: 100px;"><?=$MESS["UDALIT"]?></a>
                        </td>
                       
                    </tr>
        
                    
                   <?}?>
            
                    </tbody>
                </table>
            </div>
            <div class="coupon bg-info text-left m-center clearfix">
              
                <input type="hidden" value="ok" name="pr" />
                    <button class="btn btn-default" type="submit"><?=$MESS["PERESHETAT_KORZINU"]?></button>
            
            </div>
        </div>
            </form>
            
          
        <!-- /.container -->
        


        <!-- CONTAINER -->
 <form action="" method="POST" id="addzakaz">
        <div class="container no-padding-top inforow m-center">
            <div class="col-md-5 col-sm-7 calculate">
              <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/dostavka_i_oplata.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>

                <div >


                   
                        <div class="form-group">
                         <select  id="dostav" name="dostav">
                           <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/varianti_dostavki.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                                
                <?
                $db_enum_list = CIBlockProperty::GetPropertyEnum("DOSTAVKAVAR", Array(), Array("IBLOCK_ID"=>44));
                while($ar_enum_list = $db_enum_list->Fetch())
                { ?>
                    <option value="<?=$ar_enum_list["XML_ID"]?>"><?=$ar_enum_list["VALUE"]?></option>
                
                <?}
                ?>
                <option value="v1">DHL</option>
                <option value="v2">UPS</option>
                <option value="v3">EMS</option>
                </select>
                        </div>
                         <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/adres_dostavki.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                       
                        <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/form_group.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                        
            <div class="col-sm-5 col-md-offset-2">
             <table class="table cart-total">
                    <tr>
                        <th><?=$MESS["TOVAR_NA"]?></th>
                        <td class="text-primary">&#8381;  <?=$obshcena?>
                        <input type="hidden" name="tovarana" value="<?=$obshcena?>" />
                        </td>
                    </tr>
                    <tr class="dosat" style="display: none;" >
                        <th><?=$MESS["TOVAR_NA"]?></th>
                        <td class="text-primary">&#8381; <span id="cenados"></span>
                         <input type="hidden" name="dostavka" value="" id="dostavkanaz" />
                        </td>
                        
                    </tr>
                    <?/*
                    <tr>
                        <th>Итого</th>
                        <td class="text-primary">&#8381; <?=$obshcena?></td>
                    </tr>
                    */?>
                </table>

                <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/oformit_zakaz.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                
                
                
                <p id="reszakaz">
                
                </p>
                <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/zdravstvuyte_mi.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
                
                
            </div>
     </form>
        
            
      
            
            
            <?}elseif(strlen($_GET["zakaz"]) > 0){?>
                

                <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/vash_zakaz.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
            
            <?}else{?>
             <?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/korzina_pusta.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>
            <?}?>
        </div>
<script type="text/javascript">
$(document).ready(function (){
$("#dostav").change(function(){
     var result = $('#dostav :selected').val();
     
     if(result==0){
     
        $('#sels1').hide();
        $('.dosat').hide();
        $('#dostavkanaz').val($("#dostav :selected").text());
     }
     else{
        $('#sels1').show();
        $('.dosat').show();
        $("#cenados").text($('#dostav :selected').val());
        $('#dostavkanaz').val($("#dostav :selected").text());
        
        
        }
        });       
    });
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>