<?php 
use core\Database;
require("functions/flash.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
$notes=$connection->query("SELECT * FROM notes")->getAll();
require view("/notes.view.php",[$heading="Notes"]);?>