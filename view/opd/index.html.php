<?php
new DateTimeZone('Asia/Karachi');
date_default_timezone_set("Asia/Karachi"); $c_date=date("Y-m-d");
// $row = $connection->query("SELECT * FROM `counter` WHERE `c_date`='".$c_date."'")->find();
// if($row==0){
//   $connection->query("INSERT INTO `counter`(`c_date`,`counter`)VALUES(:c_date,:counter)",['c_date'=>$c_date,'counter'=>1]);
// }

$counter = $connection->query("SELECT * FROM `counter` ")->find();

?>



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
            OPD
            
              <a
                href="#"
                class="text-white"
                data-toggle="modal"
                data-target="#dressingModal"
              >
                <span id="heading-amount"
                  class="float-right"
                  style="
                color: #2e2e2e;
                font-size: 20px;
                font-family: 'Poppins', sans-serif;
                 ">
              RS: <?=$opds["amount"];?>
                </span>
              </a>
            </div>  <span style="margin-left:50px;font-size:12px !important"><?php flash(FLASH_SUCCESS);?></span>
            <div class="card-body" style="background-color: #f5f5f5">
          
              <div class="table-responsive" style="height: 350px;">
                      <form class="pl-5 pr-5" method="POST" >
                          <div class="row">
                            <div class="col">
                              <label for="patient">Patient Name</label>
                              <input id="name_" name="patient" type="text" class="form-control" placeholder="First name">
                              <?php if(isset($errors["patient"])):?><span class="text-danger ml-2"> <?php echo $errors['patient'];?></span><?php endif;?>
                            </div>
                            <div class="col">
                              <label for="patient"> Date</label>
                              <input name="date" id="p" type="date" class="form-control">
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-6">
                              <label for="patient"> Gender </label>
                              <select name="gender" id="gender" class="form-control" placeholder="First name">
                                <option value="1">
                                  Male
                                </option>
                                <option value="2">
                                  Female
                                </option>
                                <option value="3">
                                  Others
                                </option>
                              </select>
                              <input type="hidden" name="amount" id="amount" value="<?=$opds['amount']?>">
                              <input type="hidden" id="emergency" name="emergency" id="" value="0">
                            </div>
                            <div class="col-6">
                            <label class="container">Emergency
                              <br>
                            <input type="checkbox"  style="margin-top:20px" id="CheckValue" onclick="checkFunction()">
                            <input type="hidden" id="counter" name="counter" value="<?=$counter['counter']+1?>">
                            <span class="checkmark"></span>
                              </div>
                              </div>
                              <div class="text">
                            <button type="button"  name="save" id="btn-save" class="btn btn-success  pl-5 mt-4 pr-5 text-center">Save</button>
                            <button  name="update" style="background-color:#ed1c24; color:#fff; margin-left:10px" class="btn pl-5 mt-4 pr-5 text-center">Clear</button>
                         </div>
                      </form>
                      <p style="text-align:right; margin-right:100px">
                        
                        <table style="float: right;" border="border">
                          <tr>
                              <th style="padding:5px">Last Number </th>
                          </tr>
                          <tr>
                            <td style="font-size:30px; padding:5px;font-weight: bolder; text-align: center;"><?=$counter['counter']-1;?></td>
                          </tr>
                        </table>
                      </p>
                      </div>
                    </div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>
                        <script>
                        function checkFunction() {
                          var amount="<?= $opds['amount']?>"
                          var checkBox = document.getElementById("CheckValue");
                          var text = document.getElementById("text");
                          if (checkBox.checked == true){
                            var emr="<?php echo  ($opds['amount']+$opds['emergency'])?>"
                            $("#emergency").val(1);
                          
                            $("#heading-amount").text(emr);
                            $("#amount").val(emr);
                          } else {
                            $("#heading-amount").text(amount);
                            $("#emergency").val(0);
                            $("#amount").val(amount);
                          }
                        }

                        </script>
                        <script>
                        document.getElementById('p').value = "<?php echo $c_date;?>";
                        </script>
                        <script type="text/javascript">
                          // var doPrintPage;

                          // function printPage(){
                          //     window.print();
                          // }
                        $('#btn-save').click(function () {
                          var name_=$("#name_").val();
                          if(name_==""){
                            alert("Please enter patient name");return false;
                          }
                           var p_=$("#p").val();
                            var gender_=$("#gender").val();
                             var emg_=$("#emergency").val();
                              var amount_=$("#amount").val();
                              var counter=$("#counter").val();
                        $.ajax({
                            method:"POST",
                            url: 'opd',
                            data: {
                              counter:counter,
                              amount:amount_,gender:gender_,patient:name_,emergency:emg_,date:p_,save:"save"
                            },
                            success: function (data) {
                                 
                                window.document.open();
                                window.document.write(data);
                                window.print();
                                window.document.close();
                                location.reload();
                            }
                        });
                    });
                        </script>