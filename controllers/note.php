<?php 
use core\Database;
$heading="Notes";
require("functions/flash.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
$id=$_GET['id'];
if(isset($_POST['delete'])){
$id=$_GET['id'];
$res=$connection->query("DELETE FROM notes WHERE id=:id",['id'=>$id]);
if($res){
	flash("delete","Data delete successfully",FLASH_SUCCESS);
     header("location:/laracast/index.php/notes");
 }
 else{
 	echo "Something went wrong";
 }
}
else{

$note=$connection->query("SELECT * FROM notes WHERE id=:id",['id'=>$id])->findOrFail();
$user=1;
authorize($user==1);
}

require "view/note.view.php";?>