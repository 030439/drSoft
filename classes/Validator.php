<?php
 namespace core;
class Validator{
	public static function emptyString($str){
		
		return empty($str)?false:true;
			
		}
	public static function email($email){

		//Validator::email('praimchand763@gmail.com')
		return filter_var($email,FILTER_VALIDATE_EMAIL);
	}
}
?>