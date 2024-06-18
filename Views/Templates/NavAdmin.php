<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= base_url() ?>dashboard" class="logo d-flex align-items-center">
        <img src="assets/imgCliente/pet.png" alt="">
        <span class="d-none d-lg-block">MALENIC</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
          </a>
        </li>
        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">



          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['userData']['nombres'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION['userData']['nombres'] . " " . $_SESSION['userData']['apellidos']; ?></h6>
              <span> <?= $_SESSION['userData']['nombrerol']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>usuarios/perfil">
                <i class="bi bi-person"></i>
                <span>Mi perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Configuracion</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
    <!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <?php if (!empty($_SESSION['permisos'][MDASHBOARD]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][MUSUARIOS]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#usuarios-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="usuarios-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?= base_url(); ?>usuarios">
                <i class="bi bi-circle"></i><span>Usuarios</span>
              </a>
            </li>
            <li>
              <a href="<?= base_url(); ?>roles">
                <i class="bi bi-circle"></i><span>Roles</span>
              </a>
            </li>
          </ul>
        </li>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][MPRODUCTOS]['r']) || !empty($_SESSION['permisos'][MCATEGORIAS]['r']) || !empty($_SESSION['permisos'][MPROVEEDORES]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#productos-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="productos-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <?php if (!empty($_SESSION['permisos'][MPRODUCTOS]['r'])) { ?>
              <li>
                <a href="<?= base_url(); ?>productos">
                  <i class="bi bi-circle"></i><span>Productos</span>
                </a>
              </li>
            <?php } ?>
            <?php if (!empty($_SESSION['permisos'][MCATEGORIAS]['r'])) { ?>
              <li>
                <a href="<?= base_url(); ?>categorias">
                  <i class="bi bi-circle"></i><span>Categorías</span>
                </a>
              </li>
            <?php } ?>
            <?php if (!empty($_SESSION['permisos'][MPROVEEDORES]['r'])) { ?>
              <li>
                <a href="<?= base_url(); ?>proveedores">
                  <i class="bi bi-circle"></i><span>Proveedores</span>
                </a>
              </li>
            <?php } ?>
            
          </ul>
          
        </li>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][MPEDIDOS]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>pedidos">
            <i class="bi bi-grid"></i>
            <span>Pedidos</span>
          </a>
        </li>
      <?php } ?>
      <?php if (!empty($_SESSION['permisos'][MCLIENTES]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>clientes">
            <i class="bi bi-grid"></i>
            <span>clientes</span>
          </a>
        </li>
      <?php } ?>
      <?php if (!empty($_SESSION['permisos'][MCITAS]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>reserva">
            <i class="bi bi-grid"></i>
            <span>reserva</span>
          </a>
        </li>
      <?php } ?>
      <?php if (!empty($_SESSION['permisos'][MDCONTACTOS]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>contactos">
            <i class="bi bi-grid"></i>
            <span>Contactar</span>
          </a>
        </li>
      <?php } ?>
      <!-- <?php if (!empty($_SESSION['permisos'][MDPAGINAS]['r'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>paginas">
            <i class="bi bi-grid"></i>
            <span>paginas</span>
          </a>
        </li>
      <?php } ?> -->
    </ul>
  </aside>