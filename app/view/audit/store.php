<?php
require_once VIEW . 'header.php';
?>
<!-- start page title -->
<div class="row">
  <div class="col-md-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Cadastro de Auditorias</h4>
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Auditorias</a></li>
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
          <form onsubmit="store()">
            <div class="row gy-4">
              <div class="col-md-1">
                <div>
                  <label for="name" class="form-label">ID</label>
                  <input type="text" class="form-control" id="idaudit" onchange="handleFormValues(this)"
                         value="<?= isset($id) ? $id : '' ?>" required readonly>
                </div>
              </div>
              <div class="col-md-11">
                <div>
                  <label for="name" class="form-label">Descrição</label>
                  <input type="text" class="form-control" id="description" onchange="handleFormValues(this)"
                         onblur="handleFormValues(this)"
                         required>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="active" onchange="handleFormValues(this)">
                  <label class="form-check-label" for="active">
                    Cadastro Ativo
                  </label>
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
          <div class="modal modal-xl flip" id="modalQuestion">
            <div class="modal-dialog">
              <div class="modal-content">
                <form onsubmit="storeQuestion()" id="formQuestion">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Cadastro de Questão da Auditoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row gy-4">
                      <div class="col-md-1">
                        <div>
                          <label for="name" class="form-label">ID</label>
                          <input type="text" class="form-control" id="idaudit_question" onchange="handleFormQuestionValues(this)"
                                 value="<?= isset($id) ? $id : '' ?>" required readonly>
                        </div>
                      </div>
                      <div class="col-md-11">
                        <div>
                          <label for="name" class="form-label">Descrição</label>
                          <input type="text" class="form-control" id="descriptionQuestion"
                                 onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div>
                          <label for="name" class="form-label">Atendimento</label>
                          <input type="text" class="form-control" id="answering"
                                 onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div>
                          <label for="name" class="form-label">Referência</label>
                          <input type="text" class="form-control" id="reference"
                                 onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div>
                          <label for="name" class="form-label">Pilar</label>
                          <input type="text" class="form-control" id="pillar" onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div>
                          <label for="name" class="form-label">Módulo</label>
                          <input type="text" class="form-control" id="module" onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div>
                          <label for="name" class="form-label">Conceito</label>
                          <input type="text" class="form-control" id="concept" onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div>
                          <label for="name" class="form-label">Percentual da Nota</label>
                          <input type="text" class="form-control" id="percent_note"
                                 onchange="handleFormQuestionValues(this)"
                                 required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="btnCloseModalQuestion">Fechar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once VIEW . 'footer.php';
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
    if(ipt !== null){
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
        console.log(key, res[key]);
        handleSetFormValues(key, res[key]);
      }
      listQuestions();

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }


  function handleFormQuestionValues(e) {
    if (e.type === 'checkbox') {
      formQuestionValues = {...formQuestionValues, [e.id]: e.checked};
    } else {
      formQuestionValues = {...formQuestionValues, [e.id]: e.value};
    }
  }

  function handleSetFormQuestionValues(i, v) {
    let ipt = document.getElementById(i);
    if(ipt !== null) {
      if (ipt.type === 'checkbox') {
        ipt.checked = v;
      } else {
        ipt.value = v;
      }
      handleFormQuestionValues(ipt);
    }
  }

  function storeQuestion() {
    formQuestionValues = {...formQuestionValues, 'idaudit': id};
    const options = {
      method: 'post',
      url: SERVER + 'auditQuestion/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formQuestionValues}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      listQuestions(id);
      alert(res.msg);
      document.getElementById('btnCloseModalQuestion').click();

      for (let k in formQuestionValues){
        handleSetFormQuestionValues(k, '');
      }

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }

  function listQuestions(){
    const options = {
      method: 'post',
      url: SERVER + 'auditQuestion/listing',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {id}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      const tbl = document.getElementById('tblQuestions');
      let htmlQuestions = '';
      for(let key in res){
        htmlQuestions += `
          <tr>
            <td>${res[key].idaudit_question}</td>
            <td>${res[key].description}</td>
            <td>${res[key].answering}</td>
            <td>${res[key].reference}</td>
            <td>${res[key].pillar}</td>
            <td>${res[key].module}</td>
            <td>${res[key].concept}</td>
            <td>${res[key].percent_note}</td>
            <td>${res[key].options}</td>
          </tr>
        `;
      }

      tbl.innerHTML = htmlQuestions;

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }

  function getQuestion(idQuestion){
    console.log(idQuestion);
    if(id !== null){
      const options = {
        method: 'post',
        url: SERVER + 'auditQuestion/select',
        headers: {
          'Content-Type': 'application/json'
        },
        data: {id: idQuestion}
      };

      axios.request(options).then(function (response) {
        const res = response.data;

        for (let key in res) {
          if(key === 'description'){
            handleSetFormQuestionValues('descriptionQuestion', res[key]);
          }else{
            handleSetFormQuestionValues(key, res[key]);
          }
        }
        document.getElementById('btnOpenModalQuestion').click();

      }).catch(function (error) {
        alert('Erro: ' + error);
      });
    }

  }

  function deleteQuestion(){

  }
</script>