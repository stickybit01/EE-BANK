
<?php require_once 'a96b918e3f03bc2ce2df54816549320f.inc'; ?>
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
           </form>

           
        
        <h1> List of Files</h1>
        <table class="table table-bordered">
            <thead>
            <tr style="background-color:#337ab7;">
                <td><font color="white"> File Name</font> </td>
            </tr>
            </thead>
            <tbody>
                 <?php
$dir    = 'reports/';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);
foreach($files1 as $key) {
    if($key!="." and $key!=".."){
            echo " <tr style='background-color:#fafafa;opacity:0.7;'>";
        echo " <td>". $key ." </td>";
        echo "</tr>";}
}
//print_r($files1);
//print_r($files2);
?>
</tbody></table>


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
