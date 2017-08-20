<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<article class="container oneslider woo-slider slider">
        <ul data-auto="true">           
        <?foreach($arResult["ITEMS"] as $arItem):?>
        		<?
        		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		        $db_props = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], "sort", "asc", Array("CODE" => "SILKA"));
                $ar_props = $db_props->Fetch();
                ?>
                <li class="bg-sl-11 medium-size" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);">
                    <div class="divtable">
                        <div class="divcell">
                            <div class="col-xs-5 col-xs-offset-1" style="background: white; padding-top: 10px; padding-bottom: 10px;">
                                <h2><?echo $arItem["NAME"]?></h2>
                                <p><?=$arItem["PREVIEW_TEXT"]?></p>
                                <a href="<?=$ar_props['VALUE']?>" class="btn btn-default">>></a>
                            </div>
                        </div>
                    </div>
                </li>
        	<?endforeach;?>
        </ul>
    <a href="#" class="arrow prev"><i></i></a>
    <a href="#" class="arrow next"><i></i></a>
</article>