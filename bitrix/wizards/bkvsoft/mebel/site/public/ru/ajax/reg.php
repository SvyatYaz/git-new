<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");


$err = array();
if(empty($_POST["NAME"])) $err[] = 'Поле "Ваше имя" пустое';
if(empty($_POST["email"])) $err[] = 'Поле "email" пустое';
if(!count($err) == 0){ 
    echo '<ul class="oshib">';
    foreach ($err as $oshib){
        echo '<li style="color: red;">'.$oshib.'</li>';
    };
    echo '</ul>';
    }else{  



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
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < $number; $i++)
        {
          // Вычисляем случайный индекс массива
          $index = rand(0, count($arr) - 1);
          $pass .= $arr[$index];
        }
        return $pass;
      }
     
    $paroll = generate_password(intval(8));  
      
      
    $names = iconv('utf-8', 'windows-1251', $_POST["NAME"]);
    $user = new CUser;
    $arFields = Array(
      "NAME"              => $names,
      "EMAIL"             => $_POST["email"],
      "LOGIN"             => $_POST["email"],
      "ACTIVE"            => "Y",
      "GROUP_ID"          => array(3),
      "PASSWORD"          => $paroll,
      "CONFIRM_PASSWORD"  => $paroll,
    );
    
    $ID = $user->Add($arFields);
    if (intval($ID) > 0){
        echo "Вы зарегистрированны!";
        bxmail($_POST["email"], 'Регистрация на сайте http://'.$_SERVER['SERVER_NAME'] , " Ваш логин ".$_POST["email"]." / Ваш пароль ".$paroll);
    }else{
        echo $user->LAST_ERROR;
    }

}
?>
