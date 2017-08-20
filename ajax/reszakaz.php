<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
$iblok_id=1;
session_start();

$err = array();
if(strlen($_POST["dostav"]) == 1) $err[] = '������� ������� ��������';
if($_POST["opleta"] == "00") $err[] = '������� ������� ������';
if(empty($_POST["fio"])) $err[] = '���� "���� ���" ������';
if(empty($_POST["tel"])) $err[] = '���� "�������" ������';
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) $err[] = '���� "E-mail" ����������';

if(!count($err) == 0){ 
    echo '<ul class="oshib">';
    foreach ($err as $oshib){
        echo '<li style="color: red;">'.$oshib.'</li>';
    };
    echo '</ul>';
    }else{  

// ��������� ������ 
$opleta = iconv('utf-8', 'windows-1251', $_POST["opleta"]);
$dostavka = iconv('utf-8', 'windows-1251', $_POST["dostavka"]);
$adress = iconv('utf-8', 'windows-1251', $_POST["adress"]);
$fio = iconv('utf-8', 'windows-1251', $_POST["fio"]);
$soobsh = iconv('utf-8', 'windows-1251', $_POST["soobsh"]);        
        
        
 // ��������� �������� �����

    $zakaz = '<table>';
    foreach ($_SESSION["zakaz"] as $key => $element){
                    $res = CIBlockElement::GetByID($element['idelementa']);
                    $ar_res = $res->GetNext();
                           $cena  = '';
                           $cena = str_replace(" ","",$element['cena']);
                           $cena = (int)$cena * (int)$element['kolvo'];
                           $arImagesPath = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
                           
                           $zakaz .= '
                        <tr>
                        <td class="product-thumbnail text-left">
                            <a href="'.$ar_res["DETAIL_PAGE_URL"].'"><img src="http://'.$_SERVER['SERVER_NAME'].$arImagesPath.'" alt="" width="150"></a>
                        </td>
                        <td class="product-name text-left">
                            <a href="'.$ar_res["DETAIL_PAGE_URL"].'">'.$ar_res["NAME"].'</a>
                        </td>
                        <td>
                            <div class="product-price">&#8381; '.$element['cena'].'</div>
                        </td>
                        <td class="product-quantity" style="padding-left: 20px; padding-right: 20px;">
                         '.$element['kolvo'].'��.
                        </td>
                        <td class="product-subtotal">&#8381; '.$cena.'</td>
                      
                       </tr>
                           
                           ';
                           }
   
   $zakaz .= '</table>';
   
 
   
// �������� ID ��������

$db_enum_list = CIBlockProperty::GetPropertyEnum("DOSTAVKAVAR", Array(), Array("IBLOCK_ID"=>$iblok_id,"VALUE"=>$dostavka));
while($ar_enum_list = $db_enum_list->Fetch())
{ 
 $iddostavka = $ar_enum_list["ID"];
}


// �������� ID ������

$db_enum_list = CIBlockProperty::GetPropertyEnum("OPLATA", Array(), Array("IBLOCK_ID"=>$iblok_id,"VALUE"=>$opleta));
while($ar_enum_list = $db_enum_list->Fetch())
{ 
 $idoplata = $ar_enum_list["ID"];
}


// �������� ����� ��� ��� � ������� ���

if($_POST["userid"] == "N"){
    
  

    function generate_password($number)
      {
        $arr = array('a','b','c','d','e','f',
                     'g','h','i','j','k','l',
                     'm','n','o','p','r','s',
                     't','u','v','x','y','z',
                     'A','B','C','D','E','F',
                     'G','H','I','J','K','L',
                     'M','N','O','P','R','S',
                     'T','U','V','X','Y','Z',
                     '1','2','3','4','5','6',
                     '7','8','9','0','.',',',
                     '(',')','[',']','!','?',
                     '&','^','%','@','*','$',
                     '<','>','/','|','+','-',
                     '{','}','`','~');
        // ���������� ������
        $pass = "";
        for($i = 0; $i < $number; $i++)
        {
          // ��������� ��������� ������ �������
          $index = rand(0, count($arr) - 1);
          $pass .= $arr[$index];
        }
        return $pass;
      }
     
    $paroll = generate_password(intval(8));  
  
  
       
    
$user = new CUser;
$arFields = Array(
  "NAME"              => $fio,
  "EMAIL"             => $_POST["email"],
  "LOGIN"             => $_POST["email"],
  "ACTIVE"            => "Y",
  "GROUP_ID"          => array(3),
  "PASSWORD"          => $paroll,
  "CONFIRM_PASSWORD"  => $paroll,
);

$ID = $user->Add($arFields);
    if (intval($ID) > 0){
        $userid = $ID;
        bxmail($_POST["email"], '����������� �� ����� http://'.$_SERVER['SERVER_NAME'] , " ��� ����� ".$_POST["email"]." / ��� ������ ".$paroll);
        echo $userid;
    }else{
    
        $rsUser_login = CUser::GetByLogin($_POST["email"]);
        $arUser_login = $rsUser_login->Fetch();
        $userid = $arUser_login["ID"];
         
    }    
    
}else{
 
  $userid = $_POST["userid"];  
}




// ��������� �����  � ��������   

$el = new CIBlockElement;

$PROP = array();
$PROP[DOSTAVKAVAR] =  Array("ID" => $iddostavka ); 
$PROP[OPLATA] =  Array("VALUE" => $idoplata ); 
$PROP[STATUS] =  Array("VALUE" => 10 ); 
$PROP[IDUSER] =  $userid; 
$PROP[DOSTAVKA] =  Array("VALUE" => Array ("TEXT" => $adress, "TYPE" => "text")); 
$PROP[SOOBSHENIE] =  Array("VALUE" => Array ("TEXT" => $soobsh, "TYPE" => "text"));
$PROP[TEL] = $_POST["tel"];

$arLoadProductArray = Array(
  "MODIFIED_BY"    => 1, 
  "IBLOCK_SECTION_ID" => false,          
  "IBLOCK_ID"      => $iblok_id,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => "����� �� ".$fio." email ".$_POST["email"],
  "ACTIVE"         => "Y",            // �������
  "PREVIEW_TEXT"   =>  $zakaz,
  );

if($PRODUCT_ID = $el->Add($arLoadProductArray))
  echo "New ID: ".$PRODUCT_ID;
else
  echo "Error: ".$el->LAST_ERROR;



   

$idzakaz = $PRODUCT_ID;   
   
$mailtelo_admin = '
<h1 style="text-align: center; color: #C69C6D;">�� �������� (� '.$idzakaz.')</h1>
'.$zakaz.'
<h1 style="text-align: center; color: #C69C6D;">������ �������</h1>
<table>
<tr>
<td>�.�.�</td>
<td>'.$fio.'</td>
</tr>
<tr>
<td>email</td>
<td>'.$_POST["email"].'</td>
</tr>
<tr>
<td>��������</td>
<td> '.$dostavka.' - '.$_POST["dostav"].' ������</td>
</tr>
<tr>
<td>�����</td>
<td> '.$adress.'</td>
</tr>
<tr>
<td>������</td>
<td> '.$opleta.'  - '.$_POST["tovarana"].' ������</td>
</tr>
<tr>
<td>���������</td>
<td> '.$soobsh.'</td>
</tr>
</table>
   
   ';
       
$headers_m  = 'MIME-Version: 1.0' . "\r\n";
$headers_m .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
echo $_POST["email"];


if(bxmail($_POST["email"], '����� �� �����  http://'.$_SERVER['SERVER_NAME'] , $mailtelo_admin,$headers_m)) echo '����������';


session_destroy();

?>

<script type="text/javascript">
  location.replace("<?echo SITE_DIR?>cart/?zakaz=<?=$idzakaz?>");
</script>
<?

    }

?>

