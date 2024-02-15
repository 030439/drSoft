<div id="content-wrapper">
        <div class="container-fluid">
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
          <?= $heading;?>
          </div>
          <div class="col-6" style="font-size:16px"><?php flash(FLASH_SUCCESS); flash(FLASH_ERROR);?></div>
         </div>
            
            </div>
            <div class="card-body" style="background-color: #f5f5f5">
              <div class="table-responsive" style="height: 350px;">
                <form class="pl-5 pr-5" action="#" method="post">
                  <div class="row">
                    <div class="col-3">
                      <label for="patient">OPD</label>
                      <input id="patient" name="amount" type="text" class="form-control" placeholder="name" value="<?=$opds['amount']?>">
                      <?php if(isset($errors['amount'])):?><span style="margin-left:10px;color:red"><?= $errors["amount"];?></span><?php endif;?>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-3">
                      <label for="patient"> OPD </label><span class="ml-5 pl-5">Emergancy</span>
                      <input id="patient" name="emergency" type="number" class="form-control" placeholder="Rs" value="<?= $opds['emergency']?>">
                      <?php if(isset($errors['emergency'])):?><span style="margin-left:10px;color:red"><?= $errors["emergency"];?></span><?php endif;?>
                    </div>
                 </div>
                 <div class="text">
                    <button type="submit" name="update" class="btn btn-success pl-5 mt-4 pr-5 text-center">Save</button>
                    <button  name="update" style="background-color:#ed1c24; color:#fff; margin-left:10px" class="btn pl-5 mt-4 pr-5 text-center">Discard</button>
                 </div>
                </form>
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>