<?php require 'headerTab.php'?>
    <body>
    <div class="container">
        </br>
        </br>
        </br>
        <form id='file' action="report.php" method='post' accept-charset='UTF-8'>
            <div >
                        <label for='file' >File : (name.extension)</label>
  				<input type='text' name='file' id='report' maxlength="50" required />

                    <input type='submit' class="btn btn-default" name='Read' id='submit' value='Read' />
           </div>

			<?php
$dir    = 'reports/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
foreach($files1 as $key) {
    echo $key;
}
//print_r($files1);
//print_r($files2);
?>

        </form>
        
<?php
if(!empty($_POST['file'])){
	if( preg_match("/^[a-zA-Z0-9.]+$/",$_POST["file"])) {
	    $homepage = file_get_contents("reports/".$_POST["file"]);
	    echo $homepage;
		
	}else{
	    echo "The file name you entered is not valid";
	}
}
?>
        </div>
</body>
<?php require 'footerTab.php'?>
