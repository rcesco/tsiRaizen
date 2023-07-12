<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark"
      data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

  <meta charset="utf-8"/>
  <title>Acesso ao Portal | TSI - Tecnologia, Segurança e Inovação</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
  <meta content="Themesbrand" name="author"/>
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= DIR_ASSETS ?>images/favicon.ico">

  <!-- Layout config Js -->
  <script src="<?= DIR_ASSETS ?>js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?= DIR_ASSETS ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!-- Icons Css -->
  <link href="<?= DIR_ASSETS ?>css/icons.min.css" rel="stylesheet" type="text/css"/>
  <!-- App Css-->
  <link href="<?= DIR_ASSETS ?>css/app.min.css" rel="stylesheet" type="text/css"/>
  <!-- custom Css-->
  <link href="<?= DIR_ASSETS ?>css/custom.min.css" rel="stylesheet" type="text/css"/>


</head>

<body>

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
  <div class="bg-overlay"></div>
  <!-- auth-page content -->
  <div class="auth-page-content overflow-hidden pt-lg-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card overflow-hidden">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-lg-5 p-4 auth-one-bg h-100">
                  <div class="bg-overlay"></div>
                  <div class="position-relative h-100 d-flex flex-column">
                    <div class="mb-4">
                      <a href="#" class="d-block">
                        <img src="<?= DIR_ASSETS ?>images/logo-light.png" alt="" height="100">
                      </a>
                    </div>
                    <div class="mt-auto">
                      <div class="mb-3">
                        <i class="ri-double-quotes-l display-4 text-success"></i>
                      </div>

                      <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1"
                                  aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner text-center text-white-50 pb-5">
                          <div class="carousel-item active">
                            <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization.
                              Thanks very much! "</p>
                          </div>
                        </div>
                      </div>
                      <!-- end carousel -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- end col -->

              <div class="col-lg-6">
                <div class="p-lg-5 p-4">
                  <div>
                    <h5 class="text-primary">Bem Vindo !</h5>
                    <p class="text-muted">Insira seu Dados para acessar o portal.</p>
                  </div>

                  <div class="mt-4">
                    <form action="<?= HTTP_SERVER ?>user/setAccess" method="post">
                      <div class="mb-3">
                        <label for="username" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Digite o Usuario">
                      </div>

                      <div class="mb-3">
                        <div class="float-end">
                          <a href="auth-pass-reset-cover.html" class="text-muted">Forgot password?</a>
                        </div>
                        <label class="form-label" for="password">Senha</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                          <input type="password" class="form-control pe-5 password-input" placeholder="Digite a Senha"
                                 id="password" name="password">
                          <button
                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                            type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                        <label class="form-check-label" for="auth-remember-check">Lembrar me</label>
                      </div>

                      <div class="mt-4">
                        <button class="btn btn-info w-100" type="submit">Acessar</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->

      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end auth page content -->

  <!-- footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center">
            <p class="mb-0">&copy;
              <script>document.write(new Date().getFullYear())</script>
              TSI Consultores. Desenvolvido por Aconittus Tecnologia
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="<?= DIR_ASSETS ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/simplebar/simplebar.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/node-waves/waves.min.js"></script>
<script src="<?= DIR_ASSETS ?>libs/feather-icons/feather.min.js"></script>
<script src="<?= DIR_ASSETS ?>js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= DIR_ASSETS ?>js/plugins.js"></script>

<!-- password-addon init -->
<script src="<?= DIR_ASSETS ?>js/pages/password-addon.init.js"></script>
</body>

</html>