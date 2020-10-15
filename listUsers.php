<?php require 'headerTab.php';
 require_once 'ce20f9df545a3b29e662491bc81833f0.inc';// 
 ?>
<body>
<div class="container">
    </br>
    </br>
    </br>
    

    <h1> List of users</h1>
<table class="table table-bordered">
    <thead>
    <tr style="background-color:#337ab7;" >
        <td><font color="white"> UserID </td>
        <td><font color="white"> UserName</td>
        <td><font color="white"> Password</td>
    </tr>
    </thead>
    <tbody>



<?php

//Database Authentication
require("ab918ef1654932ce2d9620f5483f03bc.inc");

    //connect to database
    $connect = mysqli_connect($hostDB, $userDB,$passwordDB,$databaseDB);
    if(mysqli_connect_errno()){
        die(" cannot connect to database ". mysqli_connect_error());
    }

    $query ="select * from login " ;

    $result= mysqli_query($connect,$query);
    if (!$result){
        die(' Error cannot run query');
    }

    $userInfo=array();
    $loginInUser=null;
    while ($row= mysqli_fetch_assoc($result)) {
        //$userInfo[]= $row ;
       echo " <tr style='background-color:#fafafa;opacity:0.7;'>";
       echo " <td>". $row["userID"] ." </td>";
       echo "  <td>". $row["userName"]."</td>";
       echo " <td>". $row["password"]."</td>";
       echo " </tr>";
    }

    mysqli_free_result($result);
    mysqli_close($connect);



?>

    </tbody>
</table>
</div>
</body>
<?php require 'footerTab.php'?>
