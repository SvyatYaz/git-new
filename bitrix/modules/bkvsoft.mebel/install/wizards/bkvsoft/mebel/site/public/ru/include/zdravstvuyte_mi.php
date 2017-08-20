<p style="margin-top: 20px;">
                <?
global $USER;
if ($USER->IsAuthorized()){
?>
<input type="hidden" name="userid" value="<?=$USER->GetID()?>" />
Здравствуйте <?=$USER->GetFullName()?> , мы рады видет вас!
После оформления заказа в личном кабинете, можно  отлеживать заказ.
<?}else{?> 
<input type="hidden" name="userid" value="N" />
                После оформления заказа вы  получите логин и пароль от личного кабинета, для отлеживания заказа.
<?}?>
                </p>