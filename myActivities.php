<?php 
require 'headerTab.php' // clean
?>
<?php 
require_once 'a96b918e3f03bc2ce2df54816549320f.inc' // a96b918e3f03bc2ce2df54816549320f
?>
 <script>
        var userName='<?= json_encode($_GET["userName"])?>';
        document.write(userName);
    </script>
    <body>
    <div class="container">
        </br>
        </br>
        </br>
		 <?php
    //Avoid CSRF attack
    // make sure it is post process
        if($_POST){
            // if token not vaild reject request
            if($_POST["csrf"] != $_SESSION["token"]){
                echo " not valid request";
                return ;
            }

        }
// create new token for every new request
        $_SESSION["token"] = md5(uniqid(mt_rand(),true));
        
        ?>
        <form id='login' action="myActivities.php" method='post' accept-charset='UTF-8'>
            <div class="panel panel-primary">
                <div class="panel-heading">Send Money</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for='ToUserName' >To UserName :</label>
                        <input type='text' name='ToUserName' id='ToUserName'  maxlength="50" required />
                        <label for='Amount' >Amount :</label>
                        <input type='text' name='Amount' id='Amount' maxlength="50" required />
                    <input type="hidden" name="fromUserName" value="<?= $_COOKIE['userToken'];?>" />
					<input type="hidden" name="csrf" value="<?= $_SESSION["token"] ?>">

                    <input type='submit' class="btn btn-default" name='Submit' id='submit' value='Send' />
                    </div>
                </div>
            </div>

        </form>

        <h1> List of Activities</h1>
        <table class="table table-bordered">
            <thead>
            <tr style="background-color:#337ab7;">
                <td><font color="white"> Transaction Key</font> </td>
                <td><font color="white"> From </font></td>
                <td><font color="white"> To</font></td>
                <td><font color="white"> Amount</font></td>
            </tr>
            </thead>
            <tbody>



<?php
//Database Authentication
require("ab918ef1654932ce2d9620f5483f03bc.inc"); // ab918ef1654932ce2d9620f5483f03bc

$userName = $_SESSION['userName'];

//connect to database
$connect = mysqli_connect($hostDB, $userDB,$passwordDB,$databaseDB);
if(mysqli_connect_errno()){
    die(" cannot connect to database ". mysqli_connect_error());
}


//Add new Activitiy
if(!empty($_POST['fromUserName']) and !empty($_POST['ToUserName'])) {

    $query ="insert into activities(fromUserName,ToUserName,Amount)
      values ((select userName from login where userToken='".$_POST['fromUserName'] ."'),'".$_POST['ToUserName'] ."',".$_POST['Amount'] .")
      ";

    $result= mysqli_query($connect,$query);
    if (!$result){
        die(' Error cannot run query');
    }

}

// get user activities
if( !empty($userName)) {
	$query ="select * from activities  where  (fromUserName='". $userName ."' or ToUserName='". $userName ."')and fromUserName is not NULL "  ;   
    $result= mysqli_query($connect,$query);
    if (!$result){
        die(' Error cannot run query');
    }

    $userInfo=array();
    $loginInUser=null;
    while ($row= mysqli_fetch_assoc($result)) {
        $rowColor ="style='background-color:#fafafa;opacity:0.7;'";
        if($row["fromUserName"]==$userName){
            $rowColor ="style='background-color:#e9f5f7;opacity:0.7;'";
        }
		//access to modify table colors
        echo " <tr ". $rowColor .">";
        echo " <td>". $row["transactionKey"] ." </td>";
        echo " <td>". $row["fromUserName"] ." </td>";
        echo "  <td>". $row["ToUserName"]."</td>";
        echo " <td>". $row["Amount"]."</td>";
        echo " </tr>";
    }
    mysqli_free_result($result);
}
mysqli_close($connect);


error_reporting(0);
?>

            </tbody>
        </table>
    </div>
    </body>
<?php require 'footerTab.php'?>
