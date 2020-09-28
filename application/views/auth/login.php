

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <?php if($this->session->flashdata('EmailTidakAda')==true): ?>
                    <div class="alert alert-danger" role="alert">
                      <button aria-label='Close' data-dismiss='alert' class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                      <p><?= $this->session->flashdata('EmailTidakAda') ?></p>
                    </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('EmailBelumDiaktivasi')==true): ?>
                    <div class="alert alert-danger" role="alert">
                      <button aria-label='Close' data-dismiss='alert' class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                      <p><?= $this->session->flashdata('EmailBelumDiaktivasi') ?></p>
                    </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('KatasandiSalah')==true): ?>
                    <div class="alert alert-danger" role="alert">
                      <button aria-label='Close' data-dismiss='alert' class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                      <p><?= $this->session->flashdata('KatasandiSalah') ?></p>
                    </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('BerhasilDaftar')==true): ?>
                    <div class="alert alert-success" role="alert">
                      <button aria-label='Close' data-dismiss='alert' class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                      <p><?= $this->session->flashdata('BerhasilDaftar') ?></p>
                    </div>
                  <?php endif; ?>
                  <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email_username" aria-describedby="emailHelp" placeholder="Email atau username" name="email_username" value="<?= set_value('email_username') ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="katasandi" placeholder="Katasandi" name="katasandi">
                      <?= form_error('katasandi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?=base_url() ?>auth/registrasi">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
