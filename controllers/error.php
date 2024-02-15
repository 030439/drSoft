<?php 
session_start();
session_destroy();
use core\Database;
use core\Validator;
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
require "view/error.html.php";?>