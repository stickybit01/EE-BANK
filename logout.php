<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
setcookie('userToken', $userToken,time() - (86400 * 15),"/",false);
header('Location: ./index.php');
die;
?>
