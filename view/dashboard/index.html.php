<?php
 new DateTimeZone('Asia/Karachi');
date_default_timezone_set("Asia/Karachi"); $c_date=date("Y-m-d");
 if(isset($_GET['id'])){
  $connection->query("DELETE FROM charges WHERE id=:id",['id'=>$_GET['id']]);
}
?>
<style>
/*  #myTabs a{color:#000;}*/
 /*#myTabs a:hover{
    background-color:#ed1c24;
    color:#fff;
    height:100%;
    border-radius:20px;
    text-decoration:none;
  }*/
  .active_ {
    background-color:#ed1c24;
    color:#fff !important;
    height:100%;
    border-radius:20px;
    text-decoration:none;
  }
  .my-custom-scrollbar {
position: relative;
height: 200px;
overflow-y: scroll;
overflow-x: hidden;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<div id="content-wrapper">
        <div class="container-fluid">
          <!-- Page Content -->
          <!-- DataTables Example -->
          <div class="card ">
            <div
              class="rounded card-header bg-white h2 p-4"
              style="
                color: #ed1c24;
                font-weight: bold;
                font-family: 'Poppins', sans-serif;
              "
            >
            Dashboard
              <a
                href="#"
                class="text-white"
                data-toggle="modal"
                data-target="#dressingModal"
              >
               
              </a>
             <div style="float:right;font-size:20px;color:#2e2e2e" >Reset outcomes  <a id="reset" href="reset" style="border-radius:20px"class="btn btn-info " >Reset</a></div>
            </div>
            <div class="card-body pl-4 pr-4" style="background-color: #f5f5f5 ">
            <div class="container text-center" style="padding-bottom:0px !imporant; margin-bottom:0px !imporant">
              <ul id="myTabs" class="p-2 nav nav-pills nav-justified text-center" role="tablist" data-tabs="tabs" style="background-color:#E5E8E8 ; border-radius:20px;">
                <li class=" ml-5" style="padding-left:50px"><a class=" active_ pl-5 pb-2 pt-2 pr-5"  href="#opd" data-toggle="tab">OPD</a></li>
                <li class=""><a href="#other"class="pl-5 pb-2 pt-2 pr-5"  data-toggle="tab">Other operations </a></li>
                <li><a href="#bill"class="pl-5 pb-2 pt-2 pr-5"  data-toggle="tab">Bill Cancellation</a></li>
                <li><a href="#outcome"class="pl-5 pb-2 pt-2 pr-5"  data-toggle="tab">Outcomes</a></li>
              </ul>
              <div class="tab-content ml-5" style="width:800px; height:320px">
                 <div role="tabpanel" class="tab-pane  in active   table-wrapper-scroll-y my-custom-scrollbar" style="height:100%;" id="opd">
                    <table class="table border mt-3 ml-4">
                      <thead>
                        <tr>
                        <th scope="col">Invoice ID</th>
                          <th scope="col">Patient Name</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date</th>
                          <th scope="col">Emergancy</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $opds=$connection->query("SELECT charges.*, opds.name FROM charges 
                         join opds ON opds.id=charges.charge_id WHERE status=1 ORDER BY id DESC")->getAll();
                         if(!empty($opds)):
                           foreach($opds as $opd):
                            $gender="";
                            if ($opd['gender']=='1') { $gender.="Male";} 
                                    elseif($opd['gender']=='2') {$gender.= "FeMale"; 
                                    } if($opd['gender']!='2' &&$opd['gender']!='1') {
                                        $gender.="Others";
                                      }
                        ?>
                        <tr>
                         <td scope="row"><?=$opd['id'];?></td>
                          <td><?=$opd['patient'];?></td>
                          <td><?php echo $gender;?>
                          </td>
                          <td><?=$opd["ctime"];?></td>
                          <td><?=$opd["cdate"];?></td>
                          <td style="color:#ed1c24;font-weight:bold"><?php echo $opd['emergancy']==1?"Emergency":"";?></td>
                        </tr>
                        <?php endforeach;endif;?>
                      </tbody>
                    </table>
                  </div>
                <div role="tabpanel" class="tab-pane  in    table-wrapper-scroll-y my-custom-scrollbar" style="height:100%;" id="other">
                    <table class="table border mt-3 ml-4">
                      <thead>
                        <tr>
                          <th scope="col">Invoice ID</th>
                          <th scope="col">Patient</th>
                          <th scope="col">Operation</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $otherCharges=$connection->query("SELECT charges.*, others.title FROM charges 
                            join others ON others.id=charges.charge_id WHERE status=1 ORDER BY id DESC")->getAll();
                            if(!empty($otherCharges)):
                              foreach($otherCharges as $charge):
                        ?>
                        <tr>
                          <td scope="row"><?=$charge['id'];?></td>
                          <td><?=$charge['patient'];?></td>
                          <td><?= $charge['title'];?></td>
                          <td><?=$charge["ctime"];?></td>
                          <td><?=$charge["cdate"];?></td>
                        </tr>
                        <?php endforeach; endif;?>
                      </tbody>
                    </table>
                  </div>
                   <div role="tabpanel" class="tab-pane fade in table-wrapper-scroll-y my-custom-scrollbar" style="height:100%;" id="bill">
                  <table class="table border mt-3 ml-4">
                      <thead>
                        <tr>
                          <th scope="col">Invoice ID</th>
                          <th scope="col">Patient</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                            $Charges=$connection->query("SELECT * FROM charges WHERE `status`='0'  ORDER BY id DESC ")->getAll();
                            if(!empty($Charges)):
                              foreach($Charges as $charge):
                        ?>
                        <tr>
                          <td scope="row"><?=$charge['id'];?></td>
                          <td><?=$charge['patient'];?></td>
                          <td><?=$charge["ctime"];?></td>
                          <td><?=$charge["cdate"];?></td>
                        </tr>
                        <?php endforeach; endif;?>
                      </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane fade in  " id="outcome">
                    <div class="row mt-2"  style="height:180px">
                     <?php
                     $resetTime=$connection->query("SELECT `reset` FROM resettime")->find();
                     $res=$resetTime['reset'];
                  
                     $topds=$connection->query("select count(id) as total,sum(amount) as Tvalue from charges WHERE charge_id=1 && `status`='1' &&`resetDate`>$res")->findOrFail();
                            ?>
                      <div style="background-color: #E5E8E8;font-weight:bold"  class="col p-5 text-primary " style="height:180px">
                      <h6>OPD</h6>
                      <h1><?php echo $topds['total'];?></h1>
                      <h6>Rs <?= $topds['Tvalue'];?></h6>
                      </div>
                      <span clas="p-2" style="margin-top:11% ;font-size:25px;font-weight:bold">+</span>
                      <div style="background-color: #E5E8E8" class="col text-success p-5 ">
                     <?php  $otherT=$connection->query("select count(id) as total,sum(amount) as Tvalue from charges WHERE charge_id!=1 && `status`='1' &&`resetDate`>$res")->findOrFail();
                            ?>
                      <h6>Other</h6>
                      <h1><?php echo $otherT['total'];?></h1>
                      <h6>Rs <?= $otherT['Tvalue'];?></h6>
                      </div>
                      <?php $allTotal=$otherT['total']+$topds['total']; $allTotalSum=$otherT['Tvalue']+$topds['Tvalue'];?>
                      <span class="p-2" style="margin-top:11%; font-size:25px;font-weight:bold">=</span>
                      <div style="background-color: #E5E8E8;color:#ed1c24"  class="col p-5 ger">
                       <h6>Total</h6>
                      <h1><?= $allTotal;?></h1>
                      <h6>Rs <?= $allTotalSum;?> </h6>
                      </div>
                    </div>
                    <div class="row mt-5" style="background-color:#2e2e2e; color:#fff; border-radius:10px; text-align:center !important">
                    <p type="button" class=" pt-3 " data-toggle="modal" data-target=".bd-example-modal-lg"style="text-align:center !important; font-weight:bold; margin-left:330px">Get Outcome By Search</p>
                    </div>
                  </div>
              </div>
            </div>
            
          </div>
          </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>
                        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <h3 class="text-center pt-3 text-primary">Filter Data BY </h3>
                              <div class="row ml-5">
                              <input  class="col-3 form-control m-3" type="text" style=" border-radius:20px;border:none"  id="filterByName" placeholder="Filter by name">
                                <input  class="col-3 form-control date m-3" type="text" style=" border-radius:20px;border:none" placeholder="Filter by date">
                                <select class="col-3 form-control m-3" id="byoperation">

                                  <option selected>Select Operation</option>
                                  <option value="1">OPD</option>
                                <?php if(!empty($pages)): foreach($pages as $page):?>
                                  <option value="<?=$page['id']?>"><?=$page["title"];?></option>
                                  <?php endforeach; endif;?>
                                </select>

                              </div>
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">Invoice ID</th>
                                  <th scope="col">Patient</th>
                                  <th scope="col">Operation</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Time</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Emergancy</th>
                                </tr>
                              </thead>
                              <tbody id="tbody">
                              
                              </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
   <script>
    $(document).ready(function(){
    $("#filterByName").keypress(function(){
      var name=$(this).val();
      $.ajax({
        method:"POST",
        url:"action",
        data:{name:name,action:"name"},
        success:function(res){
          $("#tbody").html(res);
        }
      })
    });
    })
   </script>
   <script type="text/javascript">
    $(".date")
        .datepicker({
          dateFormat: 'yy-mm-dd',
            onSelect: function(dateText) {
                console.log("Selected date: " + dateText + "; input's current value: " + this.value);
		        $(this).change();
		    }
		})
        .on("change", function() {
           var newdate=(this.value);
           $.ajax({
        method:"POST",
        url:"action",
        data:{newdate:newdate,action:"date"},
        success:function(res){
          $("#tbody").html(res);
        }
      })
        });
     </script>

       <script type="text/javascript">
    $("#byoperation").on("change", function() {
           var operation=(this.value);
           $.ajax({
        method:"POST",
        url:"action",
        data:{operation:operation,action:"byoperation"},
        success:function(res){
          $("#tbody").html(res);
        }
      })
        });
     </script>


     <script type="text/javascript">
       $(document).ready(function(){
  $('a').click(function(){
    $(' a').removeClass("active_");
    $(this).addClass("active_");
});
});
     </script>