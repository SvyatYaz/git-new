<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$err = array();
if(empty($_POST["names"])) $err[] = 'Поле "Ваше имя" пустое';
if(empty($_POST["message"])) $err[] = 'Поле "Сообшения" пустое';
if(empty($_POST["score"])) $err[] = 'Укажите рейтинг товара';
if(!count($err) == 0){ 
    echo '<ul class="oshib">';
    foreach ($err as $oshib){
        echo '<li style="color: red;">'.$oshib.'</li>';
    };
    echo '</ul>';
    }else{  

$el = new CIBlockElement;
$PROP = array();
$PROP["IDTOV"] = $_POST['IDTOV'];  
$PROP["REITING"] = $_POST['score'];        
$arLoadProductArray = Array(
  "MODIFIED_BY"    => 1, // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => #otzivi_IBLOCK_ID#,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => $_POST['names'],
  "ACTIVE"         => "N",            // активен
  "PREVIEW_TEXT"   => $_POST['message'],
  "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
  );
  
$PRODUCT_ID = $el->Add($arLoadProductArray);
echo "Коментарий добавлен, после модерации его можно будет увидеть"; 
}
?>
