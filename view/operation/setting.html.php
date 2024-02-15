<style>
  button:hover{
    background-color:red;
    color:#fff;
  }
  a {text-decoration:none;}
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
         <div class="row">
          <div class="col-6">
          <?= $title;?>
          </div>
          <div class="col-6" style="font-size:16px"><?php flash(FLASH_SUCCESS);?></div>
         </div>
              <a
                href="#"
                class="text-white"
                data-toggle="modal"
                data-target="#dressingModal"
              >
                <!-- <span
                  class="float-right"
                  style="
                color: #2e2e2e;
                font-size: 20px;
                font-family: 'Poppins', sans-serif;
                 ">
              RS: 600
                </span> -->
              </a>
            </div>
            <div class="card-body" style="background-color: #f5f5f5">
              <div class="table-responsive" style="height: 400px;">
                
               <div class="pl-5 pr-5 pb-5 pt-3">
               <label for="patient">OPD</label>
               <div class="row">
               
                  </br></br><br>
                      <a class="p-1 col-5" href="update-opd" style="text-decoration:none">
                          <button type="submit" name="edit" class="form-control  ">
                         OPD/ EM OPD
                        </button>
                      
                      </a>   <div class="col-6"><a href="add-opreration" class="btn bg-info  text-white" style=" float: right; margin-top: -30px; width:80px;  !important;border-radius:10px;">+</a>     </div>
                    </div>
                <label for="patient">Other</label>
                    <div class="row">
                      <?php if(!empty($others)): foreach($others as $other):?>
                      <a class="p-1 col-5">
                      <form action="edit-operation"  method="POST">
                          <input type="hidden" name="id" value="<?=$other['id']?>">
                          <button type="submit" name="edit" class="form-control  ">
                          <?=  $other['title'];?>
                        </button>
                      </form>  
                      
                      </a>   
                        <?php endforeach; endif;?>     
                    </div>
               </div>
                   
              
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>