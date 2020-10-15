<?php     

if(empty($_SESSION["userName"])){
    die("Cannot load page no permission");
}else{
    require 'headertab.php';
}

?>