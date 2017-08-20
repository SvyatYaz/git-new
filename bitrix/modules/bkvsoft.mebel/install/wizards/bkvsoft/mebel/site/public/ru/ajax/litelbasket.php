<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
session_start();
?> 
<?
                $APPLICATION->IncludeFile(
                     SITE_DIR."include/korzina_big.php",
                     Array(),
                     Array("MODE"=>"html")
                );?>

                <div class="dropdown-menu">
                    <ul>
                    
                    <?
                    $obshcena = '';
                    foreach ($_SESSION["zakaz"] as $key => $element){
                    $res = CIBlockElement::GetByID($element['idelementa']);
                    $ar_res = $res->GetNext();
                    ?>
                        <li>
                            <a href="<?echo(SITE_DIR.'cart/');?>" class="fig text-center pull-left"><img src="<?=$arImagesPath = CFile::GetPath($ar_res['PREVIEW_PICTURE']);?>" alt=""></a>
                            <div>
                                <a href="<?echo(SITE_DIR.'cart/');?>"><?=$ar_res["NAME"]?></a>
                                <span class="price">
                                    <span class="amount"><?=$element['kolvo']?> x &#8381; <?=$element['cena']?></span>
                                </span>
                            </div>
                        </li>
                   <?
                   $cena  = '';
                   $cena = str_replace(" ","",$element['cena']);
                   $cena = (int)$cena * (int)$element['kolvo'];
                   $obshcena = $obshcena + $cena;
                   }?>
                  
                    </ul>
                    <div class="hcart-total clearfix">
                    <?include($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/mebel_default/lang/ru/header.php");?>
                        <a href="<?echo(SITE_DIR.'cart/');?>" class="btn btn-default pull-left"><?=$MESS["KORZINA"]?></a>
                        <div class="total pull-left"> <ins> &#8381; <?=$obshcena?></ins></div> 
                    </div>
                    
</div>