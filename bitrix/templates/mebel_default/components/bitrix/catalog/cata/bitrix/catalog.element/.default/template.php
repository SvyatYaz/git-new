<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>



  <article class="container type-product bg-info">
            <div class="col-sm-6 no-padding">
                <article class="oneslider slider magnific-wrap">
                    <ul>
                    <?if($arResult["DETAIL_PICTURE"]["SRC"]){?>
                        <li>
                            <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="" class="magnific"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""></a>
                        </li>
                    <?}?>
                    <?if($arResult["PREVIEW_PICTURE"]["SRC"]){?>
                        <li>
                            <a href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" title="" class="magnific"><img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a>
                        </li>
                    <?}?>
                    
                    <?foreach ($arResult["DISPLAY_PROPERTIES"]["MFORO"]["FILE_VALUE"] as $img){?>
                        <li>
                            <a href="<?=$img["SRC"]?>" title="" class="magnific"><img src="<?=$img["SRC"]?>" alt=""></a>
                        </li>
                     <?}?> 
                    </ul>
                    <nav class="nav-pages left-pos"></nav>
                    
                    <?if($arResult["DISPLAY_PROPERTIES"]["TIPTOV"]["DISPLAY_VALUE"]){?>
                    <div class="sticker sticker-<?=$arResult["DISPLAY_PROPERTIES"]["TIPTOV"]["VALUE_XML_ID"]?>"><?=$arResult["DISPLAY_PROPERTIES"]["TIPTOV"]["DISPLAY_VALUE"]?></div>
                    <?}?>
                    
                </article>
                
       
                
            </div>
            <div class="col-sm-6 type-description m-center">
                <span class="price">
                    <span class="amount">&#8381; <?=$arResult["PROPERTIES"]["PRISE"]["VALUE"]?></span>
                </span>
                <div class="rating-wrap">
                    <div class="raty" data-score="<?echo rand(3,5);?>" data-readonly="true"></div>
                   
                    <a href="#reviews" data-toggle="tab" class="add-review tab-link"><?=GetMessage("ADD_OTZIV")?></a>
                </div>
                <p><?=$arResult["PREVIEW_TEXT"]?></p>
                
                <?if(count($_SESSION["zakaz"][$arResult["ID"]]) < 1){?>
                <form id="addcat" action="/ajax/addcat.php" method="POST">
                <input type="hidden" value="<?=$arResult["ID"]?>" name="idelementa" />
                <input type="hidden" value="<?=$arResult["PROPERTIES"]["PRISE"]["VALUE"]?>" name="cena" />
                <div class="product-quantity inline">
                    <a href="" class="minus disabled">-</a>
                    <input name="kolvo" type="text" value="1">
                    <a href="" class="plus">+</a>
                </div>
                      <input type="button" onclick="ajaxaddcat()" value="<?=GetMessage("ADD_V_KORZINU")?>" class="btn btn-default" /> 
                </form>
                <div id="resaddcat" style="color: green;"></div>
                 <?}else{?>
                 <input type="button"  value="<?=GetMessage("ADDED_V_KORZINU")?>" class="btn btn-default" /> 
                 <?}?>
                <table class="table cart-total">
                    <tr>
                        <th><?=GetMessage('LABEL_ARTICLE')?></th>
                        <td class="text-muted">A<?=$arResult["ID"]?></td>
                    </tr>
                    <tr>
                    <th><?=GetMessage("RAZDELNADPIS")?></th>
                        <td><?=$arResult["SECTION"]['NAME']?></td>
                    </tr>
                </table>
             
            </div>
        </article>
        <!-- /.container -->

        <!-- CONTAINER -->
        <article class="container">
            <ul class="nav nav-tabs text-center">
                <li class="active"><a href="#description" data-toggle="tab"><span><?=GetMessage("DESCRIPTION")?></span></a></li>
                <li><a href="#reviews" data-toggle="tab"><span><?=GetMessage("COMMENTS")?></span></a></li>
            </ul>
            <section class="tab-content clearfix">
                <article class="tab-pane fade in active m-center" id="description">
                    <div class="col-sm-4 col-sm-offset-1">
                        <h3><?=GetMessage("MORE")?><small><?=$arResult["NAME"]?></small></h3>
                    </div>
                    <div class="col-sm-6">
                        <p> 
                        <?=$arResult["DETAIL_TEXT"]?>
                        </p>
                    </div>
                </article>
                <article class="tab-pane fade" id="reviews">
                    <div class="comments">
                    
<?
CModule::IncludeModule('iblock');
$key = 0;
$arFilter = Array("IBLOCK_CODE"=>"otziti", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'INCLUDE_SUBSECTIONS'=>'Y','PROPERTY_IDTOV'=>$arResult["ID"] );
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, array());
while ($ob = $res->GetNextElement())
{
    $arr = $ob->GetFields();
    $arr["PROPERTIES"] = $ob->GetProperties();

?>
                        <div class="comment clearfix">
                            <div class="col-sm-offset-1 col-xs-2 text-center">

                            </div>
                            <div class="col-xs-8 no-padding">
                                <div class="comment-line">
                                    <div class="raty" data-score="<?=$arr["PROPERTIES"]["REITING"]["VALUE"]?>" data-readonly="true"></div>
                                    <p><a href="#"><?=$arr["NAME"]?></a>, <?echo date('Y-m-d', $arr["DATE_CREATE_UNIX"]);?></p>
                                </div>
                                <p><?=$arr["PREVIEW_TEXT"]?></p>
                            </div>
                        </div>
<?}?>
                 
             
                    </div>
                    
                    

                    <div class="col-sm-5 col-sm-offset-3 no-padding">
                        <h3><?=GetMessage("OSTAVIT_OTZIV")?> </h3>
                        <form method="POST" action="" id="comentform">
                        <input type="hidden" value="<?=$arResult["ID"]?>" name="IDTOV" />
                            <div class="rating-wrap">
                                <div class="raty"></div>
                            </div>
                            <div class="form-group">
                                <input id="name" name="names" type="text" class="form-control" placeholder="<?=GetMessage("YOU_NAME")?>" >
                            </div>
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control" placeholder="<?=GetMessage("YOU_E-MAIL")?>">
                            </div>
                            <div class="form-group">
                                <textarea id="mes" name="message" placeholder="MESSAGE"></textarea>
                            </div>
                            <input type="button" onclick="ajaxcoment()" value="<?=GetMessage("YOU_E-MAIL")?>" class="btn btn-default btn-wd" /> 
                            
                        </form>
                        <div id="results"></div>
                    </div>
                </article>
            </section>
        </article>
        <!-- /.container -->

        <!-- CONTAINER -->
        <article class="container slider text-center products">
            <ul>
            
            
            <?
$arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", 'INCLUDE_SUBSECTIONS'=>'Y', );
$res = CIBlockElement::GetList(Array("rand"=>"ASC"), $arFilter, false, Array("nPageSize"=>9), array());
while ($ob = $res->GetNextElement())
{
    $arr = $ob->GetFields();
    $arr["PROPERTIES"] = $ob->GetProperties();
?>
                <li class="col-sm-4 product">
                    <a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arr["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arr["ID"]);?>"><img src="<?=$arImagesPath = CFile::GetPath($arr["PREVIEW_PICTURE"]);?>" alt=""></a>
                    <h6><a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arr["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arr["ID"]);?>"><?=$arr["NAME"]?></a></h6>
                    <span class="price">
                        <span class="amount">&#8381; <?=$arr["PROPERTIES"]["PRISE"]["VALUE"]?></span>
                    </span>
                    <a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arr["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arr["ID"]);?>" class="btn btn-link"><?=GetMessage("FOR DETAILS")?></a>
                </li>
<?}?>             
            </ul>
            <a href="" class="arrow prev"><i></i></a>
            <a href="" class="arrow next"><i></i></a>
        </article>
        <!-- /.container -->