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
            <?php echo $heading; flash("success");?>
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
              RS: 600
                </span>
              </a>
            </div>
            <div class="card-body" style="background-color: #f5f5f5">
              <div class="table-responsive" style="height: 350px;">
              <?php if($others): ?>
                <form class="pl-5 pr-5" action="edit-operation" method="post">
                  <div class="row">
                    <div class="col">
                      <label for="patient">Operation Name</label>
                      <input id="patient" name="name" type="text" class="form-control" placeholder="name" value="<?= $others["title"];?>">
                      <?php if(isset($errors['name'])):?><span style="margin-left:10px;color:red"><?= $errors["name"];?></span><?php endif;?>
                    </div>
                    <div class="col">
                      <label for="patient"> Additional Name</label>
                      <input type="text" name="add-name" class="form-control" placeholder="Additional name" value="<?= $others["additional"];?>">
                      <?php if(isset($errors['add-name'])):?><span style="margin-left:10px;color:red"><?= $errors["add-name"];?></span><?php endif;?>
                    </div>
                    <input type="hidden" name="id" value="<?=$others['id']?>" >
                  </div>
                  <div class="row mt-2">
                    <div class="col-6">
                      <label for="patient"> Charges </label>
                      <input id="patient" name="charges" type="number" class="form-control" placeholder="Rs" value="<?= $others["charges"];?>">
                      <?php if(isset($errors['charges'])):?><span style="margin-left:10px;color:red"><?= $errors["charges"];?></span><?php endif;?>
                    </div>
                 </div>
                 <div class="text-center">
                    <button type="submit" class="btn btn-danger pl-5 mt-4  pr-5 mr-5 text-center" name="delete" value="<?=$others['id']?>">Delete</button>
                    <button type="submit" name="update" class="btn btn-success pl-5 mt-4 pr-5 text-center">update</button>
                 </div>
                </form>
                
                <?php endif;?>
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>