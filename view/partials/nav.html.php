<body
    id="page-top"
    style="width:auto; background: url('../assets/images/imgpsh_fullsize_anim.jpeg')"
  >
    <nav
      class="navbar bg-white navbar-expand navbar-dark bg-dark static-top p-3"
    >
      <a
        style="
          color: #ed1c24;
          font-family: 'Poppins', sans-serif;
          font-weight: bold;
        "
        class="navbar-brand mr-1"
        href="index.html"
      >
        <span
          ><img
            src="../images/health-clinic.svg"
            style="
              width: 50px;
              background-color: #f5f5f5;
              padding: 10px;
              border-radius: 100%;
            "
        /></span>
        ALI KARIM FAMILY CLINIC</a
      >
      <!-- <button
        class="btn text-secondary btn-link btn-sm text-white order-1 order-sm-0"
        id="sidebarToggle"
        href="#"
      >
        <i class="fa fa-bars"></i>
      </button> -->
      <!-- Navbar Search -->
      <form
        class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
      ></form>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
      <li class=" no-arrow ml-3 mt-4 text-secondary">
      <a  style="color:#2e2e2e !important"
            class=" text-white"
            href="#"
            style="text-decoration:none !important"
            >My Account</a>
        </li>
        <li class="nav-item dropdown no-arrowtext-secondary">
          <a
          style="background:none"
            class="nav-link dropdown-toggle text-white"
            href="#"
            id="userDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >
            <i class="fa fa-user"></i>
           <img style="height:35px" src="../assets/images/accountWith.svg">
          </a>
          <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="userDropdown"
          >
            <div class="dropdown-header">--------------------</div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-user"></i> Karmaa</a>
            <div class="dropdown-divider"></div>
            <a
              class="dropdown-item"
              href="#"
              data-toggle="modal"
              data-target="#logoutModal"
            >
              <i class="fa fa-power-off"></i> Logout</a
            >
          </div>
        </li>
      </ul>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="sidebar navbar-nav text-secondary mt-1 p-4"
        style="background-color: #fff; height: 300px !important;"
      >
        <li class="nav-item">
          <a class="nav-link"  type="button" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-fw fa-tachometer"></i>
            <span>Dashboard</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="opd">
            <i class="fa  fa-medkit"></i>
            <span>OPD</span>
          </a>
        </li>
        <li
          class="nav-item dropdown"
          style="color: #ed1c24; font-family: 'Poppins', sans-serif; "
        >
          <a
            class="nav-link"
            href="#"
            id="pagesDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            style="color: #ed1c24; font-family: 'Poppins', sans-serif"
          >
            <i class="fa fa-fw fa-plus-square"></i>
            <span>
              Other Charges
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
          <?php
          use core\Database;
          use core\Validator;
          $config=require("configuration/config.php");
          $connection=new Database($config["DATABASE"]);
          
          $pages=$connection->query("SELECT * FROM others")->getAll();?>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="max-height: 100px; overflow-y: scroll;">
            <?php if(!empty($pages)): foreach($pages as $page):?>
            <a class="dropdown-item" href="other-charges?page=<?=$page['id']?>"> <?= $page["title"];?></a>
            <?php endforeach; endif;?>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link"type="" data-toggle="modal" data-target="#billcancellation">
            <i class="fa fa-fw fa-minus-circle"></i>
            <span>Bill Cancelation</span></a
          >
        </li>
        <li class="nav-item" >
        <a class="nav-link mt-2"  data-toggle="modal" data-target="#btn-operation-setting">
            <i class="fa fa-fw fa-industry"></i>
            <span >Operations  Sestting</span></a
          >
        </li>
      </ul>