	<?php     

if($_COOKIE["userToken"] == ''){
    die("Cannot load page no permission");
}else{
    require 'headertab.php';
}

?>