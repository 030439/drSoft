<body
    id="page-top"
    style="background: no-repeat; background: url('images/hospital.jpeg')"
  >
    <nav
      class="navbar bg-white navbar-expand navbar-dark bg-dark static-top p-4"
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
            src="images/health-clinic.svg"
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
        <li class="nav-item dropdown no-arrow ml-3 text-secondary">
          <a
            class="nav-link dropdown-toggle text-secondary"
            href="#"
            id="userDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >My Account
            <i class="fa fa-user-circle fa-fw"></i>
          </a>
          <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="userDropdown"
          >
            <div class="dropdown-header">Rao Ahmed</div>
            <a class="dropdown-item" href="profile.html">
              <i class="fa fa-user"></i> Profile</a
            >
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-cog"></i> Settings</a
            >
            <a class="dropdown-item" href="history.html">
              <i class="fa fa-line-chart"></i> Activity Log</a
            >
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
          <a class="nav-link" href="dashboard.html">
            <i class="fa fa-fw fa-users"></i>
            <span>Dashboard</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="opd.html">
            <i class="fa fa-fw fa-user-md"></i>
            <span>OPD</span>
          </a>
        </li>
        <li
          class="nav-item dropdown"
          style="color: #ed1c24; font-family: 'Poppins', sans-serif"
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
            <i class="fa fa-fw fa-folder"></i>
            <span>
              Other Charges
              <i class="float-right fa fa-angle-down"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="#"> SLC</a>
            <a class="dropdown-item" href=".html"> RBS</a>
            <a class="dropdown-item" href="dressing.html"> Dressing</a>
            <a class="dropdown-item" href=".html"> Only 1/2</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="product-brands.html">
            <i class="fa fa-fw fa-industry"></i>
            <span>Bill Cancelation</span></a
          >
        </li>
      </ul>