<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form class="user" method="post" action="<?= base_url('auth/registrasi') ?>">
              <div class="form-group">
                <label for="nama" class="ml-2"><b>Nama Lengkap</b></label>
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="email" class="ml-2"><b>Email</b></label>
                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email')  ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="username" class="ml-2"><b>Username</b></label>
                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label for="katasandi" class="ml-2"><b>Katasandi</b></label>
                  <input type="password" class="form-control form-control-user" id="katasandi" name="katasandi" placeholder="Password">
                  <?= form_error('katasandi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <label for="katasandi2" class="ml-2"><b>Ulangi Katasandi</b></label>
                  <input type="password" class="form-control form-control-user" id="katasandi2" name="katasandi2" placeholder="Repeat Password">
                  <?= form_error('katasandi2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/login') ?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>