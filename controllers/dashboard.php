<?php 
session_start();
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_SESSION['admin'])){
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/dashboard/index.html.php",[$heading="Notes"]);
}
else{
    abort();
}?>