<?php 
use core\Database;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
$errors=[];
if(($_SERVER["REQUEST_METHOD"])==="POST"){
	if(!Validator::emptyString($_POST['note'])){

		flash('note', 'This field is require ', FLASH_ERROR);
			}
	else{
		$run=$connection->query("INSERT INTO notes(note,user_id)VALUES(:note,:user_id)",["note"=>$_POST["note"],'user_id'=>1 ]);
		if($run){
			flash('success','Data save successfully',FLASH_SUCCESS);
		}
		else{
			flash("error","Something went wrong",FLASH_ERROR);
		}
	}
}
// $id=$_GET['id'];
// $note=$connection->query("SELECT * FROM notes WHERE id=:id",['id'=>$id])->findOrFail();
// $user=1;
// authorize($user!==1);


require "view/note-create.view.php";?>