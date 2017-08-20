<tr>
                <td class="order-number"><a href="">#<?=$arr["ID"]?></a></td>
                <td class="order-date"><?=date("d.m.y",$arr["DATE_CREATE_UNIX"]);?></td>
                <td class="order-status"><?=$arr["PROPERTIES"]["STATUS"]["VALUE_ENUM"]?></td>
                <td class="order-total">  <?=$arr["PROPERTIES"]["KOLVOTOV"]["VALUE"]?> ед. на <?=$arr["PROPERTIES"]["OBSHCENA"]["VALUE"]?> р.</td>
                <td class="order-actions text-right">
                  <?//=$arr["PREVIEW_TEXT"]?>
                </td>
                </tr>      