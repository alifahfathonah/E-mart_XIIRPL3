
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
                    <h1 class="h4 text-gray-900 mb-2">Lupa Kata Sandi?</h1>
                    <p class="mb-4">Silahkan masukkan alamat email anda di bawah, kami akan mengirimkan link untuk mereset kata sandi Anda.</p>
                  </div>
                  <form class="user" method="post" action="<?= base_url('auth/reset') ?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registrasi'); ?>">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/login') ;?>">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>