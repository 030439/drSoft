<?php
session_start();
session_destroy();
use core\Database;
$config=require("configuration/config.php");
$connection=new Database($config["DATABASE"]);
if(isset($_POST['action'])){
  
    if($_POST['action']=="name"){
        $name=$_POST['name'];
        $others=$connection->query("SELECT * FROM charges WHERE patient LIKE '%$name%' AND status=1")->getAll();
        if(!empty($others)){
            $html="";
            
            foreach($others as $other){
                $operation="";
               $opd= $other['charge_id'];
                if($opd!=1){
                    $opd=$connection->query("SELECT * FROM others WHERE id= $opd")->findOrFail();
                    $operation.=$opd['title'];
                }
                else{
                    $operation.="OPD";
                }
                $urgent=$other['emergancy']==1?'Emergancy':'------';
               
                $html.="<tr>";
                $html.="<td>".$other['id']."</td>";
                $html.="<td>".$other['patient']."</td>";
                $html.="<td>".$operation."</td>";
                $html.="<td>".$other['amount']."</td>";
                $html.="<td>".$other['ctime']."</td>";
                $html.="<td>".$other['cdate']."</td>";
                $html.="<td style='color:red'>".$urgent."</td>";
                $html.="</tr>";
            }
            echo $html;
        }
        else{
            echo "<div class='ml-5 text-cente text-danger'>No data found</>";
        }
    }
    
    
    if($_POST['action']=="date"){
     
        $name=$_POST['newdate'];
        $others=$connection->query("SELECT * FROM charges WHERE cdate<= '".$name."' AND status=1 ORDER BY id DESC")->getAll();
        if(!empty($others)){
            $html="";
            $tamount=0;
            foreach($others as $other){
                $tamount+=$other['amount'];
                $operation="";
               $opd= $other['charge_id'];
                if($opd!=1){
                    $opd=$connection->query("SELECT * FROM others WHERE id= $opd")->findOrFail();
                    $operation.=$opd['title'];
                }
                else{
                    $operation.="OPD";
                }
                $urgent=$other['emergancy']==1?'Emergancy':'------';
               
                $html.="<tr>";
                $html.="<td>".$other['id']."</td>";
                $html.="<td>".$other['patient']."</td>";
                $html.="<td>".$operation."</td>";
                $html.="<td>".$other['amount']."</td>";
                $html.="<td>".$other['ctime']."</td>";
                $html.="<td>".$other['cdate']."</td>";
                $html.="<td style='color:red'>".$urgent."</td>";
                $html.="</tr>";
            }
        
            echo $html;
            echo "<tr style='background-color:#2e2e2e;color:#fff'>
            <td></td>
            <td></td>
            <td></td>
            <td>Total:</td><td>

            ".$tamount."</td><td></td>
            <td></td>
            <td>
            <td></td></tr>";
        }
        else{
            echo "<div class='ml-5 text-cente text-danger'>No data found</>";
        }
    }

    if($_POST['action']=="byoperation"){
        $name=$_POST['operation'];
        $others=$connection->query("SELECT * FROM charges WHERE charge_id= $name AND status=1 ORDER BY id DESC")->getAll();
        if(!empty($others)){
            $html="";
           $tamount=0;
            foreach($others as $other){
                $tamount+=$other['amount'];
                 $operation="";
               $opd= $other['charge_id'];
                if($opd!=1){
                    $opd=$connection->query("SELECT * FROM others WHERE id= $opd")->findOrFail();
                    $operation.=$opd['title'];
                }
                else{
                    $operation.="OPD";
                }
                $urgent=$other['emergancy']==1?'Emergancy':'------';
               
                $html.="<tr>";
                $html.="<td>".$other['id']."</td>";
                $html.="<td>".$other['patient']."</td>";
                $html.="<td>".$operation."</td>";
                $html.="<td>".$other['amount']."</td>";
                $html.="<td>".$other['ctime']."</td>";
                $html.="<td>".$other['cdate']."</td>";
                $html.="<td style='color:red'>".$urgent."</td>";
                $html.="</tr>";
            }
            echo $html;
            echo "<tr style='background-color:#2e2e2e;color:#fff'>
            <td></td>
            <td></td>
            <td></td>
            <td>Total:</td><td>

            ".$tamount."</td><td></td>
            <td></td>
            <td>
            <td></td></tr>";
        }
        else{
            echo "<div class='ml-5 text-cente text-danger'>No data found</>";
        }
    }
}
?>