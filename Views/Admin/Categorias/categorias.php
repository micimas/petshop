<?php 
    headerAdmin($data); 
    navAdmin($data);
    getModal('modalCategorias',$data);
?>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">

            <div class="app-title card-title">
                <div class="d-flex justify-content-between">
                    <h1>
                        <i class="bi bi-person-circle"></i> <?= $data["page_title"]; ?>
                    </h1>
                    <?php if ($_SESSION['permisosMod']['w']) { ?>
                        <button class="btn btn-primary" type="button" onclick="openModaCategoria();"><i
                                class="bi bi-plus-lg"></i>
                            Nuevo Categoria
                        </button>
                    <?php } ?>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableCategorias">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Status</th>
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
            <div id="contentAjax">
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    