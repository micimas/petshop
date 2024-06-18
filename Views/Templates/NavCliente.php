<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <a href="home.php" class="logo d-flex align-items-center me-auto me-lg-0"> -->
      <a href="<?= base_url(); ?>" class="logo d-flex align-items-center me-auto me-lg-0">

        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Malenic<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=base_url();?>">Inicio</a></li>
          <li><a href="<?=base_url();?>tnosotros">Nosotros</a></li>

          <!-- lista productos -->
          <li ><a href="<?=base_url();?>tproductos"><span>Productos</span></a></li>

          <!-- lista citas -->
          <li class="dropdown"><a href="<?=base_url();?>tcitas"><span>Citas</span> </a>
              
          </li>
          <li><a href="<?=base_url();?>tcontacto">Contactos</a></li>
        </ul>
      </nav><!-- .navbar -->


      <!-- Enlace para el ícono de persona -->
      <a href="<?= base_url(); ?>login" style="font-size: 30px;">
        <i class="bi bi-person-fill-lock"></i>
      </a>

      <!-- Enlace para el ícono de carrito -->
      <a href="tu_destino_carrito.html" style="font-size: 30px;">
        <i class="bi bi-cart"></i>
      </a>



      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->