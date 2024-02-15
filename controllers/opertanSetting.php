<?php 
session_start();
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST['edit'])){
    $opd=$connection->query("SELECT * FROM others ",['id'=>1])->findOrFail();
    print_r($opd);
    die;
}

$others=$connection->query("SELECT * FROM others")->getAll();
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/operation/setting.html.php",[$title="Operation Settings",$others]);?>