<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

        <!-- CONTAINER -->
        <article class="container text-center bg-warning">
            <nav>
                <ul class="nav-category">
                    <li><a href="#all" class="filter" data-filter="all"><?=GetMessage("HITS")?></a></li>
                    <!--li><a href="#featured" class="filter" data-filter=".featured">Скидка</a></li>
                    <li><a href="#special" class="filter" data-filter=".special">Лидер продаж</a></li-->
                </ul>
            </nav>
        </article>
        <!-- /.container -->





        <!-- CONTAINER -->
        <article class="container mix-list text-center">

            <ul>
            
<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $db_props = CIBlockElement::GetProperty($arItem["IBLOCK_ID"], $arItem["ID"], "sort", "asc", Array("CODE" => "PRISE"));
        $ar_props = $db_props->Fetch();
        ?>
                  <li class="col-sm-4 product mix featured odd" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arItem["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arItem["ID"]);?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a>
                    <h6><a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arItem["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arItem["ID"]);?>"><?echo $arItem["NAME"]?></a></h6>
                    <span class="price">
                        <span class="amount"><?=$ar_props['VALUE']?> &#8381;</span>
                    </span>
                    <a href="<?echo(SITE_DIR.'catalog/?SECTION_ID='.$arItem["IBLOCK_SECTION_ID"].'&ELEMENT_ID='.$arItem["ID"]);?>" class="btn btn-link add-cart">"<?=GetMessage("CT_BCE_CATALOG_BUY");?>"</a>
                </li>
<?endforeach;?>
      
            </ul>
            <!-- /.mix-list -->
        </article>