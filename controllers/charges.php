<?php 
session_start();
session_destroy();
$errors=[];
use core\Database;
use core\Validator;
$heading=" Create Note";
require("functions/flash.php");
require("classes/Validator.php");
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);

$id=$_GET["page"];
date_default_timezone_set('Asia/Karachi');
$ctime = date(' h:i:s');
$others=$connection->query("SELECT * FROM others WHERE id=:id",['id'=>$id])->findOrFail();
if(isset($_POST["submit"])){
    $valid=true;
    $patient=$_POST['patient'];
    if(empty($patient)){$errors['name']="This field is required"; $valid=false;}
    $date=$_POST['date'];
    if($valid){
      $t_date=date("Y-m-d H:i");
	    $td=strtotime($t_date);
        $data=['patient'=>$patient,'charge_id'=>$id,'amount'=>$others['charges'],'cdate'=>$date,'ctime'=>$ctime,'resetDate'=>$td];
    $execute=$connection->query(("INSERT INTO charges(patient,charge_id,amount,cdate,ctime,resetDate)VALUES(:patient,:charge_id,:amount,:cdate,:ctime,:resetDate)"),$data);
    if($execute){
        $html='';
        $user=$connection->query("SELECT charges.*,others.title FROM charges join others ON others.id=charges.charge_id ORDER BY id DESC")->findOrFail();
       $html.= '<p class="row" style="width:400px">
  <span class="col-6 text-left" style="text-align:left;margin-left:10px">Date: '.$user["cdate"].'</span>
  <span class="col-6 text-right" style="text-align:right; margin-left:125px">Receipt# '.$user["id"].'</span>
</p>
<h2 style="margin-left:10px">ALI KARIM FAMILY CLINIC</h2>
<p class="text-center" style="margin-left:60px;border-bottom-style: dotted;
border-bottom: none thick green;
"><span>Patient name:</span><span style="margin-left:30px;font-weight:bold">'.$user["patient"].'</span></p>
<table class="table" style="margin-left:25px;" >
  <thead style="border:2px solid red">
    <tr>
    <th></th>
      <th >Operation </th>
      <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
       <th > </th>
      <th > </th>
      <th > </th>
        <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
       <th > </th>
      <th > </th>
      <th > </th>
        <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
       <th > </th>
      <th > </th>
      <th > </th>
        <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
       <th > </th>
      <th > </th>
      <th > </th>
        <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
       <th > </th>
      <th > </th>
      <th > </th>
      <th > </th>
      <th style="margin-left:200px">Fee</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td></td>
      <td >'.$user["title"].'</td>
       <td></td>
        <td></td>
         <td></td>
          <td></td>

           <td></td>
            <td></td>

             <td></td>
              <td></td>
              <td></td>
        <td></td>
         <td></td>
          <td></td>

           <td></td>
            <td></td>

             <td></td>
              <td></td>
              <td></td>
        <td></td>
         <td></td>
          <td></td>

           <td></td>
            <td></td>

             <td></td>
              <td></td>
              <td></td>
        <td></td>
         <td></td>
          <td></td>

           <td></td>
            <td></td>

             <td></td>
              <td></td>
              <td></td>
              <td></td>

      <td colspan="6">'.$user["amount"].'</td>
    </tr>
    <tr></tr>
     <tr></tr>
      <tr></tr>
       <tr></tr>
  </tbody>
</table>
 <p style="padding:10px; width:330px; text-align:right; background-color:#BFC9CA ">
 <span style="margin-right:50px">Total: '.$user["amount"].'</span>
  </p>
';
echo $html;
    }    
    }
       
}
else{
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/charges/other-charges.html.php",[$others,$errors]);
}
?>