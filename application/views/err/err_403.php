<!-- Main Content -->
<div id="content ">
  <!-- Begin Page Content -->
  <div class="container-fluid mt-5">

    <!-- 404 Error Text -->
    <div class="text-center ">
      <div class="error mx-auto" data-text="403">403</div>
      <p class="lead text-gray-800 mb-5">Access Forbidden</p>
      <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
      <?php if($this->session->userdata('email')){ ?>
        <a onclick="window.history.go(-1);return false;" style="cursor: pointer;color: #4e73df;">&larr; Kembali</a>
      <?php }else{ ?>
        <a href="<?= base_url('auth') ;?>">Kembali ke halaman login.</a>
      <?php } ?>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
