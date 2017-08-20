<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?foreach($arResult as $key=>$arItem):?>



    <li class="<?if($key == 0){?>current-menu-item<?}?> dropdown">
    <a href="<?echo $arItem["LINK"]?>" class="dropdown-toggle" <?if(count($arItem["CHILDREN"]) > 0){?>data-toggle="dropdown"<?}?>><?=$arItem["TEXT"]?></a>
                                <?if(count($arItem["CHILDREN"]) > 0){?>
                                <ul class="dropdown-menu">
                                <?foreach ($arItem["CHILDREN"] as $tumaenu){?>

                                  <li><a href="<?echo $tumaenu["LINK"]?>"><?=$tumaenu["TEXT"]?></a></li>
                                <?}?>
                                </ul>
     </li>                      <?}?>

<?endforeach?>


<?endif?>