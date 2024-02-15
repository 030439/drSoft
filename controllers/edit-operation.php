<?php 
session_start();
session_destroy();
use core\Database;
use core\Validator;
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST['edit'])){
    $id=$_POST["id"];
    $others=$connection->query("SELECT * FROM others WHERE id=:id",['id'=>$id])->findOrFail();
    if(!empty($others)):
    require view("/partials/header.html.php");
    require view("/partials/nav.html.php");
    require view("/operation/edit.html.php",[$heading="Update Operation ",$others]);
    endif;
}
if(isset($_POST["delete"])){
    $id=$_POST["id"];
    $runQ=$connection->query("DELETE FROM `others` WHERE id=:id",['id'=>$id]);
    if($runQ){
        flash('success','Data Deleted successfully',FLASH_SUCCESS);
       // header("location:operation-setting");
    }
    else{
        flash("error","Something went wrong",FLASH_ERROR);
    }
    header("location:operation-setting");
}
if(isset($_POST["update"])){
    $errors=[];
    $validate=true;
    $name=$_POST["name"];
    $id=$_POST["id"];
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
        $execute=$connection->query("UPDATE `others` SET `title`='".$name."',`additional`='".$add_name."',`charges`='".$charges."' 
        WHERE `id`=$id");
          if($execute){
			flash('success','Data Updated successfully',FLASH_SUCCESS);
            // header("location:operation-setting");
		}
		else{
			flash("error","Something went wrong",FLASH_ERROR);
		}
        header("location:operation-setting");
    }
}
?>