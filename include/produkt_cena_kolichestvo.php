<form class="form-inline" method="get" action="">
            <div class="table-responsive">
            
           
                <table class="table shop_table cart text-center">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-left">ПРОДУКТ</th>
                        <th class="text-center">ЦЕНА</th>
                        <th class="text-center">КОЛИЧЕСТВО</th>
                        <th class="text-center">ИТОГО</th>
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
                           <a style="display: block; width: 100px;">Удалить</a>
                        </td>
                       
                    </tr>
        
                    
                   <?}?>
            
                    </tbody>
                </table>
            </div>
            <div class="coupon bg-info text-left m-center clearfix">
              
                <input type="hidden" value="ok" name="pr" />
                    <button class="btn btn-default" type="submit">Пересчитать корзину</button>
            
            </div>
        </div>
            </form>