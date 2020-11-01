<div class="container" style="margin-top: 90px;">
  <div class="row">
    <div class="col-lg-10">
      <div class="card o-hidden border-0 shadow my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center mb-4">
                  <h5>Halo, <b><?php $nama = explode(' ', $user['nama']); echo $nama[0]; ?></b> ayo isi detail tokomu!</h5>
                </div>
                <?php if($this->session->flashdata('EmailTidakAda')==true): ?>
                  <div class="alert alert-danger" role="alert">
                    <button aria-label='Close' data-dismiss='alert' class="close" type="button"><span aria-hidden="true" class="fa fa-times"></span></button>
                    <p><?= $this->session->flashdata('EmailTidakAda') ?></p>
                  </div>
                <?php endif; ?>

                <form action="<?= base_url('toko/buat'); ?>" method="post">
                  <div class="form-group">
                    <label for="namaToko" class="ml-2"><b>Nama Toko</b></label>
                    <input type="text" class="form-control form-control-user" id="namaToko" aria-describedby="emailHelp" placeholder="Nama toko" name="namaToko" value="<?= set_value('namaToko') ?>">
                    <div class="mr-2 ml-2">
                        <p style="font-size: 11px; ">Nama tidak bisa diubah lagi!</p>
                      <?php echo form_error('namaToko', '<p class="text-danger p-0" style="font-size:11px;">', '</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Buat</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</div>
<script>

</script>