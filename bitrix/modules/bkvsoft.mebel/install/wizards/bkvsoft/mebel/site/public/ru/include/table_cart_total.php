<table class="table cart-total">
                    <tr>
                        <th>Товара на</th>
                        <td class="text-primary">&#8381;  <?=$obshcena?>
                        <input type="hidden" name="tovarana" value="<?=$obshcena?>" />
                        </td>
                    </tr>
                    <tr class="dosat" style="display: none;" >
                        <th>Доставка</th>
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