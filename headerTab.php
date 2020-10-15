<?php session_start();
header('X-XSS-Protection:0'); ?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>EE - BANK </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

    body{
        background: ;
		background-image: url(https://cdn.discordapp.com/attachments/760552027536883718/764627110014353419/white.jpg);
		background-size: cover;
    }
    body.container{
        padding-left: 10%;
        padding-right: 10%;
        background-color:#FFFFFF;
    }
</style>

</head>
<div class="navbar navbar-inverse navbar-fixed-top">
 
	<div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="./logout.php" class="navbar-brand"><img src="logo11.f08" weight="60" height="30"></a>
        </div>
		
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./myactivities.php">Transfer Money</a></li>
                <li><a href="./chat.php">Chat</a></li>
                <li><a href="./report.php">Read Reports</a></li>
                <?php if($_SESSION["userName"]=="admin"){
                    echo "<li><a href=\"./listusers.php\">All users</a></li>";
                    echo "<li><a href=\"./listsessions.php\">All sessions</a></li>";
                    echo "<li><a href=\"./addusersession.php\">Add User</a></li>";}?>
                <li><a href="./logout.php">Logout</a></li>
            </ul>

        </div>

    </div>
</div>
