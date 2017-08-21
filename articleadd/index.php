<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление элемента");
global $USER;
if(!($USER->isAdmin())) {
LocalRedirect("/404.php");
}
 ?>
    <div>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Название статьи: <input type="text" name="name" value=""> </p>
        <p>Картинка: <input type="file" name="file"></p>
        <p>Анонс текст: <input type="text" name="description" value=""></p>
        <p>Текст: <input type="text" name="detail" value=""></p>
        <p>Автор: <input type="text" name="avtor" value=""></p>
        <input type="submit" value="Отправить данные">
        <input type="reset" value="Очистить данные">
    </form>
      </div>





    <?php
 //if (isset($_POST["name"])) {
    $el = new CIBlockElement;
    //$date = new DateTime($_POST["date"]);
    $name = $_POST["name"];
    $arParams = array("replace_space"=>"-","replace_other"=>"-");
    $trans = Cutil::translit($name,"ru",$arParams);


    $PROP = array();
//    $PROP['NAME'] = $_POST['name']; //Свойство Строка
//    //$PROP['DESCRIPTION'] = $_POST['description']; //Свойство список
       //$PROP['CITY'] = $_POST['city']; //Свойство чекбокс
       //$PROP['YEAR'] = $date->format('d.m.Y'); //$_POST["date"];
       $PROP['AVTOR'] = $_POST['avtor'];

    $NewFields = Array(
       // "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
       // "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
        "IBLOCK_ID" => 5,
        "PROPERTY_VALUES" => $PROP,
        "CODE" => $trans,
        "NAME" => strip_tags($_REQUEST["name"]),
        "PREVIEW_PICTURE" => $_FILES["file"],
        // "ACTIVE"         => "Y",            // активен
        "PREVIEW_TEXT"   => $_POST["description"],
      "DETAIL_TEXT"    => strip_tags($_REQUEST['detail']),
        //    "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
    );


  echo '<pre>';
print_r($NewFields);

    if ($PRODUCT_ID = $el->Add($NewFields)) {
        echo "New ID: " . $PRODUCT_ID; }
    else {
        echo "Error: " . $el->LAST_ERROR;}
//}
?>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
