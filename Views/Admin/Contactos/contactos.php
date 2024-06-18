<?php
headerAdmin($data);
navAdmin($data);
getModal('modalMensaje', $data);
?>
<main id="main" class="main">
  <div class="card">
    <div class="card-body">

      <div class="app-title card-title">
        <div class="d-flex justify-content-between">
          <h1>
            <i class="bi bi-person-circle"></i> <?= $data["page_title"]; ?>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableContactos">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</main>
<?php footerAdmin($data); ?>