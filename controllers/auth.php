<?php
session_start();
use core\Database;
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST['action'])){
    if($_POST["password"]!=""){
        $password=htmlentities($_POST['password']);
        $admin=$connection->query("SELECT * FROM `admin` WHERE `password` ='".$password."'")->findOrFail();
        if(!empty($admin)){
            $_SESSION['admin']=true;
            echo  "ok";
        }
        else{
          return false;
        }
    }
}
?>