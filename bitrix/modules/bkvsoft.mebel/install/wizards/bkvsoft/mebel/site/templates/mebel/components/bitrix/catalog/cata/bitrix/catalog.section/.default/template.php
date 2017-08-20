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


if (!empty($arResult['ITEMS']))
{
?>

    <div class="col-sm-8 no-padding">
    
            <div class="row text-center">
            <?
            $pervoe = 0;
            foreach ($arResult['ITEMS'] as  $tovar){
            $pervoe++ 
            ?>
            
  
                    <div class="col-sm-6 product">
                        <img src="<?=$tovar["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                       
                        <?if($tovar["PROPERTIES"]["TIPTOV"]["VALUE"]){?>
                        <div class="sticker sticker-<?=$tovar["PROPERTIES"]["TIPTOV"]["VALUE_XML_ID"]?>"><?=$tovar["PROPERTIES"]["TIPTOV"]["VALUE"]?></div>
                        <?}?>
                        
                        <h6><a href="<?=$tovar["DETAIL_PAGE_URL"]?>"><?=$tovar["NAME"]?></a></h6>
                     
                        
                        <?if($tovar["PROPERTIES"]["OLDPRISE"]["VALUE"]){?>
                        
                        <span class="price">
                            <del>
                                <span class="amount">&#8381; <?=$tovar["PROPERTIES"]["OLDPRISE"]["VALUE"]?></span>
                            </del>
                            <ins>
                                <span class="amount">&#8381; <?=$tovar["PROPERTIES"]["PRISE"]["VALUE"]?></span>
                            </ins>
                        </span>
                        
                        <?}else{?>
                        <span class="price">
                            <span class="amount">&#8381; <?=$tovar["PROPERTIES"]["PRISE"]["VALUE"]?></span>
                        </span>
                        <?}?>
                        <a href="<?=$tovar["DETAIL_PAGE_URL"]?>" class="btn btn-link"><?=GetMessage("CT_BCS_TPL_MESS_BTN_DETAIL")?></a>
                    </div>
                    
                    <? if ($pervoe % 2 == 0){echo '</div><div class="row text-center">';}?>
                    
            <?}?>
            
                </div>
                
 </div>
 
             <div class="row pagination-bar m-center">
                <div class="col-sm-5 col-sm-offset-4">
 <?
	if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}
}
?>
                </div>
                <div class="col-sm-3 text-right displaying">
                <p>Каталог / <?=$arResult["NAME"]?></p>
                </div>
            </div>
