<?php
new DateTimeZone('Asia/Karachi');
date_default_timezone_set("Asia/Karachi"); $c_date=date("Y-m-d");

?><div id="content-wrapper">
        <div class="container-fluid">
          <!-- Page Content -->
          <!-- DataTables Example -->
          <div class="card ">
            <div
              class="rounded card-header text-uppercase bg-white h2 p-4"
              style="
                color: #ed1c24;
                font-weight: bold;
                font-family: 'Poppins', sans-serif;
              "
            >
           <?=$others['title']?>
              <a
                href="#"
                class="text-white"
                data-toggle="modal"
                data-target="#dressingModal"
              >
                <span
                  class="float-right"
                  style="
                color: #2e2e2e;
                font-size: 20px;
                font-family: 'Poppins', sans-serif;
                 ">
              RS: <?=$others["charges"];?>
                </span>
              </a>
            </div>
            <div class="card-body" style="background-color: #f5f5f5">
              <div class="table-responsive" style="height: 350px;">
                <form class="p-5"  method="POST">
                  <div class="row">
                    <div class="col-6">
                      <label for="patient">Patient Name</label>
                      <input id="patient_name" name="patient" type="text" class="form-control" placeholder="First name">
                      <?php if(isset($errors["name"])):?><span class="text-danger ml-2"> <?php echo $errors['name'];?></span><?php endif;?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-6">
                      <label for="patient"> Date </label>
                      <input id="e" type="date" name="date"  class="form-control" placeholder="First name">
                    </div>
                  </div>
                  <div class="text m-3">
                    <button type="button" name="submit" id="save" class="bg-primary text-white" style="padding:5px 15px; border:none;border-radius:5px">
                        Submit
                    </button>
                    <button class="bg-secondary ml-2 text-white" style="padding:5px 15px; border:none;border-radius:5px">
                        Clear
                    </button>
                  </div>
                </form>
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>
                        <script>
                          
                        document.getElementById('e').value = "<?php echo $c_date;?>"
                        </script>
                             <script type="text/javascript">
                          var doPrintPage;

                          function printPage(){
                              window.print();
                          }
                         $('#save').click(function () {
                          var name_=$("#patient_name").val();
                          if(name_==""){
                            alert("Please enter patient name");return false;
                          }
                           var e_=$("#e").val();
                        $.ajax({
                            method:"POST",
                            url: '#',
                            data: {
                              patient:name_,date:e_,submit:"save"
                            },
                            success: function (data) {

                                window.document.open();
                                window.document.write(data);
                                window.print();
                                window.document.close();
                                location.reload();;
                            }
                        });
                    });
                        </script>