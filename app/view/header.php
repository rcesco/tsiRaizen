<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark"
      data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

  <meta charset="utf-8"/>
  <title>Portal TSI | Tecnologia, Segurança, Inovação</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= DIR_ASSETS ?>images/favicon.ico">

  <!-- Layout config Js -->
  <script src="<?= DIR_ASSETS ?>js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?= DIR_ASSETS ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!-- Icons Css -->
  <link href="<?= DIR_ASSETS ?>css/icons.min.css" rel="stylesheet" type="text/css"/>
  <!-- App Css-->
  <link href="<?= DIR_ASSETS ?>css/app.min.css" rel="stylesheet" type="text/css"/>
  <!-- custom Css-->
  <link href="<?= DIR_ASSETS ?>css/custom.min.css" rel="stylesheet" type="text/css"/>

  <!--datatable css-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
  <!--datatable responsive css-->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">
  <header id="page-topbar">
    <div class="layout-width">
      <div class="navbar-header">
        <div class="d-flex">
          <!-- LOGO -->
          <div class="navbar-brand-box horizontal-logo">
            <a href="index.html" class="logo logo-dark">
              <span class="logo-sm">
                <img src="<?= DIR_ASSETS ?>images/logo-sm.png" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?= DIR_ASSETS ?>images/logo-dark.png" alt="" height="70">
              </span>
            </a>
            <a href="index.html" class="logo logo-light">
              <span class="logo-sm">
                <img src="<?= DIR_ASSETS ?>images/logo-sm.png" alt="" height="22">
              </span>
              <span class="logo-lg">
                <img src="<?= DIR_ASSETS ?>images/logo-light.png" alt="" height="70">
              </span>
            </a>
          </div>
          <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                  id="topnav-hamburger-icon">
            <span class="hamburger-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </button>
        </div>

        <div class="d-flex align-items-center">

          <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
              <i class='bx bx-moon fs-22'></i>
            </button>
          </div>
          <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
              <span class="d-flex align-items-center">
                <img class="rounded-circle header-profile-user" src="<?= DIR_ASSETS ?>images/users/avatar-1.jpg"
                     alt="Header Avatar">
                <span class="text-start ms-xl-2">
                  <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text"><?=$_SESSION['name']?></span>

                </span>
              </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
              <h6 class="dropdown-header">Bem Vindo(a) <?=$_SESSION['name']?> !</h6>
              <a class="dropdown-item" href="<?=HTTP_SERVER?>user/logout">
                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle" data-key="t-logout">Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- removeNotificationModal -->
  <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  id="NotificationModalbtn-close"></button>
        </div>
        <div class="modal-body">
          <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                       colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
              <h4>Are you sure ?</h4>
              <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
            </div>
          </div>
          <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
          </div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- ========== App Menu ========== -->
  <div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
          <img src="<?= DIR_ASSETS ?>images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="<?= DIR_ASSETS ?>images/logo-dark.png" alt="" height="17">
        </span>
      </a>
      <!-- Light Logo-->
      <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="<?= DIR_ASSETS ?>images/logo-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="<?= DIR_ASSETS ?>images/logo-light.png" alt="" height="70">
        </span>
      </a>
      <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
              id="vertical-hover">
        <i class="ri-record-circle-line"></i>
      </button>
    </div>

    <div id="scrollbar">
      <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
          <li class="menu-title"><span data-key="t-menu">Menu</span></li>
          <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
               aria-expanded="false" aria-controls="sidebarDashboards">
              <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Cadastros</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="/user" class="nav-link" data-key="t-analytics"> Usuário </a>
                </li>
                <li class="nav-item">
                  <a href="/profile" class="nav-link" data-key="t-crm"> Perfil </a>
                </li>
                <li class="nav-item">
                  <a href="/transporter" class="nav-link" data-key="t-ecommerce"> Transportadora </a>
                </li>
                <li class="nav-item">
                  <a href="/audit" class="nav-link" data-key="t-ecommerce"> Auditoria </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
  </div>
  <!-- Left Sidebar End -->
  <!-- Vertical Overlay-->
  <div class="vertical-overlay"></div>

  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

