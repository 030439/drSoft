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
                <form class="p-5">
                  <div class="row">
                    <div class="col">
                      <label for="patient">Patient Name</label>
                      <input id="patient" type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col">
                      <label for="patient"> Date</label>
                      <input type="text" class="form-control" placeholder="Last name">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-6">
                      <label for="patient">Other Charges </label>
                      <input id="patient" type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="col-6">
                      <label for="patient">Emergency  </label>
                      </div>
                      </div>
                      </form>
                      </div></div></div>
                      </div>
                      <?php 
                       require view("/partials/copyright.html.php");
                        require view("/partials/footer.html.php");
                        ?>