<?php 
$errors=[];
session_start();
session_destroy();
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST["create"])){
    $validate=true;
    $name=$_POST["name"];
    $add_name=$_POST["add-name"];
    $charges=$_POST["charges"];
    if(!Validator::emptyString($name)){
        $validate=false;
        $errors['name']="this field is required";
    }
    if(!Validator::emptyString($add_name)){
        $validate=false;
        $errors['add-name']="this field is required";
    }
    if(!Validator::emptyString($charges)){
        $validate=false;
        $errors['charges']="this field is required";
    }
    if($validate){
        $val=['title'=>$name,'additional'=>$add_name,'charges'=>$charges];
        $execute=$connection->query("INSERT INTO others(title,additional,charges)VALUES(:title,:additional,:charges)",['title'=>$name,'additional'=>$add_name,'charges'=>$charges]);
        if($execute){
			flash('success','Data save successfully',FLASH_SUCCESS);
            header("location:operation-setting");
		}
		else{
			flash("error","Something went wrong",FLASH_ERROR);
		}
    }

}
if(isset($_SESSION['admin'])){
require view("/partials/header.html.php");
require view("/partials/nav.html.php");

require view("/operation/create.html.php",[$heading="Add New Operation"]);
}
else{
    abort();
}

?>