<?php
headerAdmin($data);
navAdmin($data);
// getModal('modalPerfil', $data);
?>

<main id="main" class="main">

  <div class="card-title">
    <h1>Profile</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?= media(); ?>/images/avatar.png" alt="Profile" class="rounded-circle">
            <h2><?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?></h2>
            <h3><?= $_SESSION['userData']['nombrerol']; ?></h3>
            <!-- <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div> -->
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab"
                  data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Un poco de mi</h5>
                <p class="small fst-italic"> <?= $_SESSION['userData']['descripcion']; ?></p>

                <h5 class="card-title">Datos peronales</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Identificación</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['identificacion']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['nombres']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Apellidos</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['apellidos']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Telefono</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['telefono']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['email_user']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">USA</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Direccion</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['direccionfiscal']; ?></div>
                </div>

                <h5 class="card-title">Datos Corporativos</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Identifacion Corporativa</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['nit']; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nombre de empresa</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['nombrefiscal']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Direccion</div>
                  <div class="col-lg-9 col-md-8"><?= $_SESSION['userData']['direccionfiscal']; ?></div>
                </div>



              </div>


              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="formPerfil" name="formPerfil">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?= media(); ?>/images/avatar.png" alt="Foto de perfil">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i
                            class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                            class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtDescripcion" class="col-md-4 col-lg-3 col-form-label">Descripcion</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="txtDescripcion" class="form-control valid validText" id="txtDescripcion"
                        style="height: 100px"><?= $_SESSION['userData']['descripcion']; ?></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtIdentificacion" class="col-md-4 col-lg-3 col-form-label">Identificación</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtIdentificacion" type="text" class="form-control" id="txtIdentificacion"
                        value="<?= $_SESSION['userData']['identificacion']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtNombre" class="col-md-4 col-lg-3 col-form-label">Nombre completo</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtNombre" type="text" class="form-control valid validText" id="txtNombre"
                        value="<?= $_SESSION['userData']['nombres']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="txtApellido" class="col-md-4 col-lg-3 col-form-label">Apellidos</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtApellido" type="text" class="form-control valid validText" id="txtApellido"
                        value="<?= $_SESSION['userData']['apellidos']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Telefono" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtTelefono" type="text" class="form-control valid validNumber" id="txtTelefono"
                        value="<?= $_SESSION['userData']['telefono']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtEmail" type="text" class="form-control valid validEmail" id="txtEmail"
                        value="<?= $_SESSION['userData']['email_user']; ?>">
                    </div>
                  </div>

                  <!-- agregar -->
                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                    </div>
                  </div>
                  <!-- agregar -->
                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="Facebook"
                        value="https://facebook.com/#">
                    </div>
                  </div>
                  <!-- agregar -->
                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram"
                        value="https://instagram.com/#">
                    </div>
                  </div>
                  <!-- agregar -->
                  <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="Linkedin"
                        value="https://linkedin.com/#">
                    </div>
                  </div>

                  <h5 class="card-title">Datos Corporativos</h5>

                  <div class="row mb-3">
                    <label for="txtNit" class="col-md-4 col-lg-3 col-form-label">Identifacion Corporativa</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtNit" type="txtNit" class="form-control" id="txtNit"
                        value="<?= $_SESSION['userData']['nit']; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNombreFiscal" class="col-md-4 col-lg-3 col-form-label">Nombre de empresa</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtNombreFiscal" type="txtNombreFiscal" class="form-control valid validText"
                        id="txtNombreFiscal" value="<?= $_SESSION['userData']['nombrefiscal']; ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtDirFiscal" class="col-md-4 col-lg-3 col-form-label">Direccion</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="txtDirFiscal" type="txtDirFiscal" class="form-control valid validText"
                        id="txtDirFiscal" value="<?= $_SESSION['userData']['direccionfiscal']; ?>">
                    </div>
                  </div>



                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                      Guardar
                    </button>
                  </div>
                </form><!-- End Profile Edit Form -->
              </div>


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form id="formCambiarContraseña" name="formCambiarContraseña">

                  <div class="row mb-3">
                    <label for="actualContraseña" class="col-md-4 col-lg-3 col-form-label">Contrseña actual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="actualContraseña" type="password" class="form-control" id="actualContraseña">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nuevaContraseña" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nuevaContraseña" type="password" class="form-control" id="nuevaContraseña">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="re_nueva_contraseña" class="col-md-4 col-lg-3 col-form-label">Confirmar la nueva contraseña</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="re_nueva_contraseña" type="password" class="form-control" id="re_nueva_contraseña">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cambia contrasrña</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php footerAdmin($data); ?>