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
            <form onsubmit="store()">
              <div class="row gy-4">
                <div class="col-md-1">
                  <div>
                    <label for="name" class="form-label">id</label>
                    <input type="text" class="form-control" id="iduser" value="<?=$id?>" onchange="handleFormValues(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" onchange="handleFormValues(this)" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <div>
                    <label for="username" class="form-label">Login</label>
                    <input type="text" class="form-control" id="username" onchange="handleFormValues(this)" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" onchange="handleFormValues(this)" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" onchange="handleFormValues(this)" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="cellphone" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="cellphone" onchange="handleFormValues(this)" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label for="cellphone" class="form-label">Tipo</label>
                    <select class="form-control" id="type" onchange="handleFormValues(this)" required>
                      <option value="">...</option>
                      <option value="T">Transportador</option>
                      <option value="A">Administrador</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row gy-4">
                <p class="text-muted"></p>
                <div class="live-preview">
                  <div class="d-flex flex-wrap gap-2">
                    <button type="submit" id="btnSubmit" class="btn btn-primary waves-effect waves-light">Cadastrar</button>
                    <button type="reset" class="btn btn-warning waves-effect waves-light">Limpar</button>
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
  const element = document.querySelector('form');
  element.addEventListener('submit', event => {
    event.preventDefault();
  });

  let formValues = {};
  let id = document.getElementById('iduser').value;


  if (id !== '') {
    document.getElementById('btnSubmit').innerHTML = 'Alterar';
    getUser(id);
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
      method: 'POST',
      url: SERVER+'user/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formValues}
    };

    axios.request(options).then(function (response) {
      const res = response.data;

      alert(res.msg);
      getUser(res.id);
    }).catch(function (error) {
      alert('Erro: '+error);
    });
  }

  function getUser(id) {
    const options = {
      method: 'post',
      url: SERVER + 'user/select',
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

    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }
</script>
