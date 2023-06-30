<?php
require_once VIEW . 'header.php';
?>

<!-- start page title -->
<div class="row">
  <div class="col-md-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Cadastro de Perfil</h4>
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil</a></li>
          <li class="breadcrumb-item active">Cadastro</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="live-preview">
          <form>
            <div class="row gy-4">
              <div class="col-md-2">
                <div>
                  <label for="name" class="form-label">ID</label>
                  <input type="text" class="form-control" id="idprofile" onchange="handleFormValues(this)"
                         value="<?= isset($idprofile) ? $idprofile : '' ?>" required readonly>
                </div>
              </div>
              <div class="col-md-10">
                <div>
                  <label for="name" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="name" onchange="handleFormValues(this)" required>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="active" onchange="handleFormValues(this)">
                  <label class="form-check-label" for="active">
                    Cadastro Ativo
                  </label>
                </div>
              </div>

              <div class="col-md-12">
                <div class="card-header">
                  <h6>Permissões</h6>
                </div>
              </div>

              <div class="row" id="permissionContainer">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h6>Permissao</h6>
                    </div>
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h6>Permissao</h6>
                    </div>
                    <div class="card-body">

                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="row gy-4">
              <p class="text-muted"></p>
              <div class="live-preview">
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" class="btn btn-primary waves-effect waves-light" onclick="store()">Cadastrar</button>
                  <button type="reset" class="btn btn-warning waves-effect waves-light">Limpar</button>
                  <button type="button" class="btn btn-info waves-effect waves-light" onclick="history.back();">Voltar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end page title -->

<?php
require_once VIEW . 'footer.php';
?>

<script src="<?= DIR_API ?>permissions.js"></script>

