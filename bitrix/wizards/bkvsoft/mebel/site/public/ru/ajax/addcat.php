<?php
session_start();
if (empty($_POST["kolvo"])){
    $_POST["kolvo"]=1;
}
$pokupka = array(
        "kolvo" => $_POST["kolvo"],
        "cena" => $_POST["cena"],
        "idelementa" => $_POST["idelementa"],
   ); 
   if (!empty($_SESSION['zakaz'][$pokupka["idelementa"]])){
    $_SESSION['zakaz'][$pokupka["idelementa"]]["kolvo"]=+$_POST["kolvo"];
   }else{
    $_SESSION['zakaz'][$pokupka["idelementa"]] = $pokupka;
   }

include($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/components/bitrix/catalog/cata/bitrix/catalog.element/.default/lang/ru/template.php");
$adress = $MESS["MORE_TOVAR_V_KORZINE"];
echo $adress;
?>
