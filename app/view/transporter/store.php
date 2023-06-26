<?php
require_once VIEW . 'header.php';
?>

<!-- start page title -->
<div class="row">
  <div class="col-md-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Cadastro de Transportadores</h4>
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
                  <input type="text" class="form-control" id="name" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-3">
                <div>
                  <label for="name" class="form-label">CNPJ</label>
                  <input type="text" class="form-control" id="document" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-3">
                <div>
                  <label for="name" class="form-label">CEP</label>
                  <div class="input-group">
                    <input type="text" class="form-control" aria-label="Zip Code" id="zip_code" onchange="handleFormValues(this)"
                           aria-describedby="searchZIP" required>
                    <button class="btn btn-secondary" type="button" id="searchZIP" onclick="getAddressData()">
                      <i class="ri-search-line"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div>
                  <label for="name" class="form-label">Endereço</label>
                  <input type="text" class="form-control" id="address" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-2">
                <div>
                  <label for="name" class="form-label">Número</label>
                  <input type="text" class="form-control" id="number" onchange="handleFormValues(this)">
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <label for="name" class="form-label">Complemento</label>
                  <input type="text" class="form-control" id="complement" onchange="handleFormValues(this)">
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <label for="name" class="form-label">Bairro</label>
                  <input type="text" class="form-control" id="district" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-6">
                <div>
                  <label for="name" class="form-label">Cidade</label>
                  <input type="text" class="form-control" id="city" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-2">
                <div>
                  <label for="name" class="form-label">Estado</label>
                  <input type="text" class="form-control" id="state" onchange="handleFormValues(this)" required>
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <label for="name" class="form-label">Celular</label>
                  <input type="text" class="form-control" id="phone" onchange="handleFormValues(this)">
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <label for="name" class="form-label">Latitude</label>
                  <input type="text" class="form-control" id="latitude" onchange="handleFormValues(this)">
                </div>
              </div>
              <div class="col-md-4">
                <div>
                  <label for="name" class="form-label">Longitude</label>
                  <input type="text" class="form-control" id="longitude" onchange="handleFormValues(this)">
                </div>
              </div>
              <div class="col-md-12">
                <div>
                  <label for="name" class="form-label">Observações</label>
                  <textarea class="form-control" id="note" onchange="handleFormValues(this)"></textarea>
                </div>
              </div>
            </div>
            <div class="row gy-4">
              <p class="text-muted"></p>
              <div class="live-preview">
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" class="btn btn-primary waves-effect waves-light" onclick="store()">Cadastrar</button>
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

  let formValues = {};

  function handleFormValues(e){
    formValues = {...formValues, [e.id]: e.value};
  }

  function getAddressData() {
    const options = {
      method: 'get',
      url: `https://viacep.com.br/ws/${formValues.zip_code}/json/`,
      headers: {
        'Content-Type': 'application/json'
      },
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      document.getElementById('address').value = res.logradouro;
      document.getElementById('district').value = res.bairro;
      document.getElementById('city').value = res.localidade;
      document.getElementById('state').value = res.uf;
    }).catch(function (error) {
      alert('Ocorreu Um erro ao buscar dados do CEP');
    });
  }

  function store() {
    const options = {
      method: 'post',
      url: SERVER + 'transporter/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formValues}
    };

    axios.request(options).then(function (response) {
      const res = response.data;

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }
</script>
