<?php 
date_default_timezone_set("Asia/Bangkok");
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
$opds=$connection->query("SELECT * FROM opds")->find();
date_default_timezone_set('Asia/Karachi');
$c_time = date(' h:i:s');
if(isset($_POST["save"])){
    $errors=[];
    $validate=true;
    $amount=$_POST["amount"];
    $date=$_POST["date"];
    $patient=$_POST['patient'];
    $gender=$_POST['gender'];
    $emergancy=$_POST["emergency"];
    // print_r($_POST);
    // die;
    $count=$_POST["counter"];
    if($validate){
      $t_date=date("Y-m-d H:i");
	    $td=strtotime($t_date);
     $data=['patient'=>$patient,'charge_id'=>1,'amount'=>$amount,'gender'=>$gender,'emergancy'=>$emergancy,'cdate'=>$date,'ctime'=>$c_time,'resetDate'=>$td];
    $execute=$connection->query(("INSERT INTO charges(patient,charge_id,amount,gender,emergancy,cdate,ctime,resetDate)VALUES(:patient,:charge_id,:amount,:gender,:emergancy,:cdate,:ctime,:resetDate)"),$data);
    if($execute){
        $counterDate=date("Y-m-d");

         $execute=$connection->query("UPDATE `counter` SET `counter`='".$count."'" );
        $html='';
        $user=$connection->query("SELECT * FROM charges ORDER BY id DESC ")->findOrFail();
           $html.= '<p class="row" style="width:400px">
              <span class="col-6 text-left" style="text-align:left;margin-left:10px">Date: '.$user["cdate"].'</span>
              <span class="col-6 text-right" style="text-align:right; margin-left:125px">Receipt# '.$user["id"].'</span>
            </p>
            <h2 style="
            margin-left:10px">



            ALI KARIM FAMILY CLINIC</h2><p class="text-center" style="margin-left:60px;
            border-bottom-style:dotted;border-bottom: none thick green;"><span>Patient name:
            </span><span style="margin-left:30px;font-weight:bold">'.$user["patient"].'</span>
            </p><table class="table" style="margin-left:25px;" ><thead style="border:2px solid
             red"><tr><th></th><th >Operation</th><th > </th><th > </th><th > </th><th > </th>
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
            <th > </th><th > </th><th > </th><th style="margin-left:200px">Fee</th></tr></thead> 
            <tbody><tr>
            <td></td>
            <td >OPD</td>
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
            <td></td> <td></td>
            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
            </td><td></td><td></td><td></td><td></td><td colspan="6">'.$user["amount"].'
            </td></tr><tr></tr><tr></tr><tr> </tr> <tr> </tr> </tbody> </table><p style=
            "padding : 10px;  width: 330px;  margin-top:     100px; text-align : right;
             background-color : #BFC9CA "> <span  style = " margin-right : 50px"> Total: 
             '.$user["amount"].'</span>
              </p>
            ';
            echo $html;
    }    
}
}
else{
require view("/partials/header.html.php");
require view("/partials/nav.html.php");
require view("/opd/index.html.php",[$heading="Notes",$opds]);
}
?>