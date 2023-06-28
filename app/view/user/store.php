<?php
require_once VIEW . 'header.php';
?>

  <!-- start page title -->
  <div class="row">
    <div class="col-md-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Cadastro de Usuários</h4>
        <div class="page-title-right">
          <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Usuario</a></li>
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
                <div class="col-md-6">
                  <div>
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="username" class="form-label">Login</label>
                    <input type="text" class="form-control" id="username">
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email">
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="cellphone" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="cellphone">
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="profile" class="form-label">Perfil</label>
                    <select class="js-example-basic-multiple col-sm-12" id="profile" name="operationTypes"
                      multiple="multiple">
                    </select>
                  </div>
                </div>
              </div>
              <div class="row gy-4">
                <p class="text-muted"></p>
                <div class="live-preview">
                  <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Cadastrar</button>
                    <button type="button" class="btn btn-warning waves-effect waves-light">Limpar</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Voltar</button>
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

<script>
  function store() {
    const id = document.getElementById('id').value;

    const options = {
      method: 'POST',
      url: SERVER+'user/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {id}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      const operationTypesDiv = document.getElementById('operationTypesDiv');

    }).catch(function (error) {
      alert('Erro: '+error);
    });
  }
</script>
