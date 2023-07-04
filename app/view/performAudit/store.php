<?php
require_once VIEW . 'header.php';
?>
<!-- start page title -->
<div class="row">
  <div class="col-md-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Realizar uma Auditoria</h4>
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Auditorias</a></li>
          <li class="breadcrumb-item active">Ações</li>
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
          <form onsubmit="store()">
            <div class="row gy-4">
              <div class="col-md-1">
                <div>
                  <label for="name" class="form-label">ID</label>
                  <input type="text" class="form-control" id="idperformed_audit" onchange="handleFormValues(this)"
                         value="<?= isset($id) ? $id : '' ?>" required readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div>
                  <label for="name" class="form-label">Transportador</label>
                  <div class="input-group">
                    <input type="hidden" class="form-control" id="idtransporter" onchange="handleFormValues(this)" required>
                    <input type="text" class="form-control" id="transporterName" onchange="handleFormValues(this)" required>
                    <button class="btn btn-secondary" type="button" onclick="openModalTransporter()">
                      <i class="ri-search-2-fill"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row gy-4">
              <p class="text-muted"></p>
              <div class="live-preview">
                <div class="d-flex flex-wrap gap-2">
                  <button type="submit" id="btnSubmit" class="btn btn-primary waves-effect waves-light">Cadastrar
                  </button>
                  <button type="reset" class="btn btn-warning waves-effect waves-light">Limpar</button>
                  <button type="button" onclick="history.back()" class="btn btn-info waves-effect waves-light">Voltar
                  </button>
                </div>
              </div>
            </div>
          </form>
          <p class="text-muted"></p>
          <div class="row gy-4" id="questiosDiv">
            <div class="live-preview">
              <div class="col-md-12">
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" class="btn btn-primary btn-icon btn-lg" data-bs-toggle="modal"
                          data-bs-target="#modalQuestion" id="btnOpenModalQuestion" onclick="getQuestion(null)">
                    <i class="ri ri-clapperboard-line"></i>
                  </button>
                </div>
              </div>
              <p class="text-muted"></p>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Questões</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Atendimento</th>
                        <th scope="col">Referência</th>
                        <th scope="col">Pilar</th>
                        <th scope="col">Módulo</th>
                        <th scope="col">Conceito</th>
                        <th scope="col">% Nota</th>
                        <th scope="col"></th>
                      </tr>
                      </thead>
                      <tbody id="tblQuestions">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once VIEW . 'footer.php';
require_once VIEW . 'modal/transporter.php';
?>

<script>
  const element = document.querySelector('form');
  element.addEventListener('submit', event => {
    event.preventDefault();
  });

  const formQuestion = document.getElementById('formQuestion');
  formQuestion.addEventListener('submit', event => {
    event.preventDefault();
  });

  let formValues = {};
  let formQuestionValues = {};
  let id = document.getElementById('idaudit').value;

  if (id !== '') {
    document.getElementById('btnSubmit').innerHTML = 'Alterar';
    getAudit(id);
  }

  function handleFormValues(e) {
    if (e.type === 'checkbox') {
      formValues = {...formValues, [e.id]: e.checked};
    } else {
      formValues = {...formValues, [e.id]: e.value};
    }
  }

  function handleSetFormValues(i, v) {
    let ipt = document.getElementById(i);
    if (ipt !== null) {
      if (ipt.type === 'checkbox') {
        ipt.checked = v;
      } else {
        ipt.value = v;
      }
      handleFormValues(ipt);
    }
  }

  function store() {
    const options = {
      method: 'post',
      url: SERVER + 'audit/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formValues}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      if (res.id) {
        id = res.id;
        document.getElementById('btnSubmit').innerHTML = 'Alterar';
        getAudit(res.id);
      }
      alert(res.msg);
    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }

  function getAudit(id) {
    const options = {
      method: 'post',
      url: SERVER + 'audit/select',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {id}
    };

    axios.request(options).then(function (response) {
      const res = response.data;

      for (let key in res) {
        handleSetFormValues(key, res[key]);
      }
      listQuestions();

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }

  function openModalTransporter(){
    generateDatatableTransporterModal();
    $('#modalTransporter').modal('show');
  }

  function returnTransporter(btnData){
    let dataset = btnData.dataset;
    document.getElementById('idtransporter').value = dataset.id;
    document.getElementById('transporterName').value = dataset.name;
    $('#modalTransporter').modal('hide')
  }
</script>