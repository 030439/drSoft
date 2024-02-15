<?php 
$errors=[];
session_start();
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
$opds=$connection->query("SELECT * FROM opds")->find();
if(isset($_POST["update"])){
    $errors=[];
    $validate=true;
    $amount=$_POST["amount"];
    $emergency=$_POST["emergency"];
    if(!Validator::emptyString($amount)){
        $validate=false;
        $errors['amount']="this field is required";
    }
    if(!Validator::emptyString($emergency)){
        $validate=false;
        $errors['emergency']="this field is required";
    }
    if($validate){
        $execute=$connection->query("UPDATE `opds` SET `amount`='".$amount."',`emergency`='".$emergency."'");
          if($execute){
			flash('success','Data Updated successfully',FLASH_SUCCESS);
            // header("location:operation-setting");
		}
		else{
			flash("error","Something went wrong",FLASH_ERROR);
		}
        // header("location:operation-setting");
    }
}
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/opd/edit.html.php",[$heading="OPD SETTINGS"]);
?>