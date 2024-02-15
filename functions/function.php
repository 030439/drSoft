<?php
use core\Response;
const CONST_URL="index.php/";
const BASE_PATH="view";
function printPre($data){
	echo "<pre>";
	print_r($data);
}
function authorize($conditions,$status=Response::FORBIDDEN){
	if(!$conditions){
		abort($status);
	}
}
function is_admin($admin,$status=Response::FORBIDDEN){
	if(!$admin){
		abort($status);
	}
}
function base_url($path){
	return BASE_PATH.$path; 
}
function view($page,$data=[]){
	extract($data);
	return base_url($page);
}
function value($str){
	if(isset($_POST[$str])){
		echo $_POST[$str];
	}
	else{
		echo "";
	}
}
function developerCheck($developer,$enginner){
	if(($developer)!="Praim"||($enginner!="Chand")){
	   return false;
	}
	else{
		return true;
	}
}
function copyright($developer,$enginner){
	if(developerCheck($developer,$enginner)==true){
		echo $developer." ".$enginner;
	}
	else{
		abort("error");
			}
}
?>