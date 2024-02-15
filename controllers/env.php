<?php
use core\Database;
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
?>