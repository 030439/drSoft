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
            Bill Cancellation
            
              <a
                href="#"
                class="text-white"
                data-toggle="modal"
                data-target="#dressingModal"
              >
              </a>
            </div>  <span style="margin-left:50px;font-size:12px !important"><?php flash(FLASH_SUCCESS);?></span>
            <div class="card-body" style="background-color: #f5f5f5">
          
              <div class="table-responsive" style="height: 350px;">
                <form class="pl-5 pr-5" method="POST">
                  <div class="row">
                    <div class="col">
                      <label for="patient">Invoice id </label>
                      <input id="invoice" name="invoice" type="number" class="form-control" placeholder="First name">
                     
                    </div>
                    <div class="col">
                      <label for="patient"> Date</label>
                      <input name="date" id="cdate" disabled type="text" class="form-control">
                    </div>
                  </div>
                  <div class="row mt-2">
                  <div class="col">
                      <label for="patient">Operation </label>
                      <input id="op" disabled name="patient" type="text" class="form-control" placeholder="operation name">
                     
                    </div>
                    <div class="col">
                      <label for="patient">Return to amount </label>
                      <input id="amount" disabled name="patient" type="text" class="form-control" placeholder="RS 0.00">
                     
                    </div>
                      </div>
                      <div class="text">
                    <button type="submit" id="save" class="btn btn-success pl-5 mt-4 pr-5 text-center">Save</button>
                    <button  name="update" style="background-color:#ed1c24; color:#fff; margin-left:10px" class="btn pl-5 mt-4 pr-5 text-center">Clear</button>
                 </div>
                      </form>
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>
                          <script>
                                $(document).ready(function(){
                                $("#invoice").keyup(function(){
                                var name= $("#invoice").val();
                                // alert(name);
                                $.ajax({
                                    method:"POST",
                                    url:"bill-cancellation",
                                    data:{name:name,action:"name"},
                                    success:function(res){
                                        if(res!=false){
                                           response = JSON.parse(res);
                                           console.log(response);
                                           $("#cdate").val(response['cdate']);
                                           $("#amount").val(response['amount']);
                                           $("#invoice").val(response['id']);
                                           $("#op").val(response['title']);
                                           console.log(response['id']);
                                        }
                                        else{
                                           $("#cdate").val("");
                                           $("#amount").val("");
                                           $("#op").val("");
                                        }
                                    
                                    }
                                })
                                });
                                $("#save").on("click",function(){
                                  var validate=false;
                                  var id=$("#invoice").val();
                                  if($("#op").val()!=""){
                                    validate=true;
                                  }
                                  if(validate){
                                    $.ajax({
                                      url:"bill-cancellation",
                                      method:"POST",
                                      data:{id:id,action:"delete"},
                                      success:function(res){
                                        alert(res);
                                      }
                                    })
                                  }
                                  else{
                                    alert("something went wrong");
                                    return;
                                  }
                                })
                                })
                            </script>