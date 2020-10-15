<?php     

if($_SESSION["userName"]!="admin"){
    die();
}else{
    echo "User login is :". $_SESSION["userName"];

}
?>