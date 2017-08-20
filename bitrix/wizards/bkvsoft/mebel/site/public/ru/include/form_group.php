<div class="form-group">
                        
                          <select  name="opleta">
                                <option value="00">Варианты оплаты</option>
<?
$db_enum_list = CIBlockProperty::GetPropertyEnum("OPLATA", Array(), Array("IBLOCK_ID"=>44));
while($ar_enum_list = $db_enum_list->Fetch())
{ ?>
    <option value="<?=$ar_enum_list["XML_ID"]?>"><?=$ar_enum_list["VALUE"]?></option>
<?}
?>
<option value="o1">Yandex</option>
<option value="o2">VISA</option>
<option value="o3">SMS</option>
                            </select>
                        
                        </div>
                        
                        
                    <div class="form-group">
                    <input placeholder="Ф.И.О" name="fio" value="" class="ink" />
                    </div>
                    
                          
                    <div class="form-group">
                    <input placeholder="e-mail" name="email" value="" class="ink" />
                    </div>
                    
                    <div class="form-group">
                    <input placeholder="Укажите телефон" name="tel" value="" class="ink" />
                    </div>
                    
                      <div class="form-group"  class="dd">
                      <textarea name="soobsh"  placeholder="Сообщения к заказу"></textarea>
                      </div>
                    
                </div>
            </div>