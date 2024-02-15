<?php 
session_start();
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST['action'])){
    if($_POST['action']=="delete"){
        $id=$_POST['id'];
       $execute= $connection->query("UPDATE  `charges` SET status=0 WHERE `id` ='".$id."'");
       if($execute){
        echo "Data delete successfully";
       }
       else{
        echo "Something went wrong";
       }
       return;
    }
    else{
    $password=htmlentities($_POST['name']);
    $find=$connection->query("SELECT * FROM `charges` WHERE `id` ='".$password."' AND status=1")->single();
    if(!empty($find)){
         $opd= $find['charge_id'];
                if($opd!=1){
                    $opd=$connection->query("SELECT * FROM others WHERE id= $opd")->findOrFail();
                    $find['title']=$opd['title'];
                }
                else{
                    $find['title']="OPD";
                }
        echo json_encode($find);
       return;
    }
    else{
    
     return false;
    }
}
}
else{
if(isset($_SESSION['admin'])){
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/dashboard/bill.html.php",[$heading="Notes"]);
}
else{
    abort();
}
}

?>