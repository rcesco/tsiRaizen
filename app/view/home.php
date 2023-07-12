<?php
require_once VIEW . 'header.php';
?>
<div class="row">
  <div class="col-md-12">
    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
      <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Olá, <?=$_SESSION['name']?>!</h4>
        <p class="text-muted mb-0">Seja bem vindo(a) ao Portal TSI!.</p>
      </div>
    </div><!-- end card header -->
  </div>
</div>
<p class="text-muted mb-0"></p>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar-sm flex-shrink-0">
              <span class="avatar-title bg-primary rounded fs-3">
                <i class="ri-task-fill"></i>
              </span>
            </div>
            <div class="flex-grow-1 overflow-hidden ms-3">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Ações Pendentes</p>
              <div class="d-flex align-items-center mb-3">
                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="0">0</span></h4>
                <span class="badge badge-soft-success fs-12"><i
                    class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>100 %</span>
              </div>
              <p class="text-muted text-truncate mb-0">0 Vecendo Este Mês</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar-sm flex-shrink-0">
              <span class="avatar-title bg-primary rounded fs-3">
                <i class="ri-task-fill"></i>
              </span>
            </div>
            <div class="flex-grow-1 overflow-hidden ms-3">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Ações Pendentes</p>
              <div class="d-flex align-items-center mb-3">
                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="0">0</span></h4>
                <span class="badge badge-soft-success fs-12"><i
                    class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>100 %</span>
              </div>
              <p class="text-muted text-truncate mb-0">0 Vecendo Este Mês</p>
            </div>
          </div>
        </div><!-- end card body -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="avatar-sm flex-shrink-0">
              <span class="avatar-title bg-primary rounded fs-3">
                <i class="ri-task-fill"></i>
              </span>
            </div>
            <div class="flex-grow-1 overflow-hidden ms-3">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Ações Pendentes</p>
              <div class="d-flex align-items-center mb-3">
                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="0">0</span></h4>
                <span class="badge badge-soft-success fs-12"><i
                    class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>100 %</span>
              </div>
              <p class="text-muted text-truncate mb-0">0 Vecendo Este Mês</p>
            </div>
          </div>
        </div><!-- end card body -->
      </div>
    </div>
  </div>
</div>
<?php
require_once VIEW . 'footer.php';
?>

