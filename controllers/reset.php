<?php 
use core\Database;
require("functions/flash.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
$cd=date("Y-m-d H:i");
$d=strtotime($cd);
$count=1;
$connection->query("UPDATE `counter` SET `counter`='".$count."'" );
$execute=$connection->query("UPDATE `resettime` SET `reset`='".$d."' WHERE `id`=1");
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/dashboard/index.html.php",[$heading="Notes"]);?>