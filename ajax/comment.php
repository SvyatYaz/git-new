<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$err = array();
if(empty($_POST["names"])) $err[] = '���� "���� ���" ������';
if(empty($_POST["message"])) $err[] = '���� "���������" ������';
if(empty($_POST["score"])) $err[] = '������� ������� ������';
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
  "MODIFIED_BY"    => 1, // ������� ������� ������� �������������
  "IBLOCK_SECTION_ID" => false,          // ������� ����� � ����� �������
  "IBLOCK_ID"      => 3,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => $_POST['names'],
  "ACTIVE"         => "N",            // �������
  "PREVIEW_TEXT"   => $_POST['message'],
  "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
  );
  
$PRODUCT_ID = $el->Add($arLoadProductArray);
echo "���������� ��������, ����� ��������� ��� ����� ����� �������"; 
}
?>
