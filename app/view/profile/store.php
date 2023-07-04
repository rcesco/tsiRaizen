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
          <form onsubmit="store()">
            <div class="row gy-4">
              <div class="col-md-2">
                <div>
                  <label for="name" class="form-label">ID</label>
                  <input type="text" class="form-control" id="idprofile" onchange="handleFormValues(this)"
                         value="<?= isset($idprofile) ? $idprofile : '' ?>" readonly>
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
                  <h4>Permissões</h4>
                </div>
              </div>

              <div class="row" id="permissionContainer">                
               
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

<script>
  
  let formProfilePermissionValues = {};
  function handlePermissoes() {
    
    let permissionContainer = document.querySelector("#permissionContainer");
    permissionContainer.innerHTML = "";
    let hmtl_new = "";


    (ListPermissions).map((item, index) => {
      hmtl_new += `
        <div class="col-md-4">
          <h5>${item.description_label}</h5>`;

        (item.permissions_label || []).map((itemp, indexp) =>{
          if (item.permissions_enable[indexp] === 'y') {
            hmtl_new += `
              <div class="form-check">
                <input
                  id=${item.description + item.permissions[indexp] }
                  class="form-check-input"
                  type="checkbox"
                  onChange="handleInputChange(this)"/>
                  &nbsp;
                <label
                  class="form-check-label"
                  for=${item.description + item.permissions[indexp]}
                >
                  ${itemp}
                </label>
              </div>`;
          } 
          formProfilePermissionValues = {...formProfilePermissionValues, [item.description + item.permissions[indexp]]: false};
        });

        hmtl_new += `</div>`;

        });
    permissionContainer.innerHTML += hmtl_new;
  };

  $(document).ready(function() {
    handlePermissoes();
  });

  const element = document.querySelector('form');
  element.addEventListener('submit', event => {
    event.preventDefault();
  });

  let formValues = {};
  let idprofile = document.getElementById('idprofile').value;

  if (idprofile !== '') {
    document.getElementById('btnSubmit').innerHTML = 'Alterar';
    getProfile(idprofile);
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
    if (ipt.type === 'checkbox') {
      ipt.checked = v;
    } else {
      ipt.value = v;
    }

    handleFormValues(ipt);
  }

  function store() {
    console.log(formValues);
    const options = {
      method: 'post',
      url: SERVER + 'profile/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formValues}
    };

    axios.request(options).then(function (response) {
      const res = response.data;
      if (res.id) {
        getProfile(res.id);
      }
      alert(res.msg);
    }).catch(function (error) {
      alert('Erro: ' + error);
    });
  }

  function getProfile(id) {
    const options = {
      method: 'post',
      url: SERVER + 'profile/select',
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

  function handleInputChange(e) {
    if (e.type === 'checkbox') {
      formProfilePermissionValues = {...formProfilePermissionValues, [e.id]: e.checked};
    } else {
      formProfilePermissionValues = {...formProfilePermissionValues, [e.id]: e.value};
    }
  }

  function handleSetFormProfilePermissionValues(i, v) {
    let ipt = document.getElementById(i);
    if (ipt.type === 'checkbox') {
      ipt.checked = v;
    } else {
      ipt.value = v;
    }
    handleInputChange(ipt);
  }

  function storeProfilePermission() {

    const options = {
      method: 'post',
      url: SERVER + 'profile_permission/store',
      headers: {
        'Content-Type': 'application/json'
      },
      data: {formProfilePermissionValues}
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

</script>
