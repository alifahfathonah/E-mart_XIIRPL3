<style>
* {box-sizing: border-box;}
body {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* adds some margin below the link sets  */
.navbar .dropdown-menu div[class*="col"] {
   margin-bottom:1rem;
}

.navbar .dropdown-menu {
  border:none;
}

/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 992px) {
  
  /* remove the padding from the navbar so the dropdown hover state is not broken */
    .navbar {
      padding-top:0px;
      padding-bottom:0px;
    }

    /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
    .navbar .nav-item {
      padding:.5rem .5rem;
      margin:0 .25rem;
    }

    /* makes the dropdown full width  */
    .navbar .dropdown-static {position:static;}

    .navbar .dropdown-menu {
      width:100%;
      left:0;
      right:0;
    /*  height of nav-item  */
      top:70px;
      
      display:block;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.3s linear;
      
    }
  
 

  
      /* shows the dropdown menu on hover */
    .navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
      display:block;
      visibility: visible;
      opacity: 1;
      transition: visibility 0s, opacity 0.3s linear;
    }
  
    .navbar .dropdown-menu {
        border: 1px solid rgba(0,0,0,.15);
        background-color: #fff;
    }

}


/*.modal-dialog{
    width: 100%;
    height: 92%;
    padding: 0;
    top:42px;
    right: 0;
    bottom: 0;
    left: 0;
}
.modal-content{
    height: 97%;
}
.cls-input{
    margin-right: auto;
}

@media(min-width: 576px){
    .modal-dialog{max-width: none;}
}*/
</style>
 <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- 13-Oktober-2020 -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white topbar fixed-top shadow">
            <div class="container-fluid" style="justify-content: space-around;">              
              <a class="ml-3" href="<?=base_url('') ?>" style="color: #858796; text-decoration: none;"> Toko Online</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown dropdown-static">
                        <a class="nav-link dropdown-toggle" style="color: #858796" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdown">
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-4">Kategori</h3>
                                        <div class="row" style="max-height: 550px;">
                                            <div class="col-3 mr-4 p-0 bd-1-grey">
                                                <div class="kategori pre-scrollable" style="min-width: 100%; height: auto;min-height: 500px;">
                                                    <?php 
                                                        foreach ($kategori->result() as $r) {
                                                     ?>
                                                     <div class="kategori-list p-2">
                                                        <a class="" href=""><?= $r->kategori;?></a>
                                                        <div class="dropdown-divider"></div>
                                                     </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-8 bd-1-grey p-0">
                                                <div class="sub-kategori pre-scrollable" style="min-width:1000px; max-width: 1200px ; height: auto; min-height:500px;eoverflow-x: hidden;">

                                                    <?php foreach ($sub_kategori->result() as $r) {?>
                                                        <div class="sub-kategori-list p-3">
                                                            <a href=""><?= $r->sub_kategori; ?></a>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="input-search mb-3" style="width: 700px; margin-right: auto;">
                  <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style=" min-width: 100%; margin-right: auto;">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control border-1" style="padding: 8px; margin-right: 0; border-top-left-radius: 20px;border-bottom-left-radius: 20px; background: #c6c6c647; width: 80%; border-top-right-radius: 0px; border-bottom-right-radius: 0px; " placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <button class="btn border-1" type="button" style="background-color: #5a5c69; border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius:0;border-bottom-left-radius: 0">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                  </form>
                </div>
                
                  <ul class="navbar-nav" >

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--fade-in " aria-labelledby="cartDropdown" style="width: 200px; height: auto; min-height: 200px; max-height: 300px; max-width: 300">
                            <div style="text-align: center;">
                                <h3 class="mt-4">Oops..</h3>
                                <h5>Kamu belum login!</h5>
                                <h6>Klik tombol berikut untuk login!</h6>
                                <a class="btn-masuk" href="<?=base_url('auth/login'); ?>">Login</a>
                            </div>

                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item mx-1 ml-2 mr-3 mb-2 mt-3 ">
                        <a class="btn-masuk" href="<?= base_url('auth/login') ?>">Login</a>
                    </li>
                    <li class="nav-item mx-1 mt-3">
                        <a class="btn-daftar" href="<?= base_url('auth/registrasi')  ?>">Daftar</a>
                    </li> 
     
                    
                </ul>
              </div>
            </div>
        </nav>
        <!-- 7-Oktober-2020 -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 fixed-top shadow">
            <div class="mt-2 ml-3">
                <a href="<?=base_url('') ?>" style="color: #858796; text-decoration: none;"><i class="fas fa-store-alt"></i> Toko Online</a>
            </div>
            <div class="nav-link mt-2">
                <a href="#" class="nav-link" id="kategoriModal" role="button" data-toggle="modal" data-target="#modal-kategori">
                    <span style="color: #858796">Kategori <i class="fa fa-chevron-down"></i></span>
                </a>
                <div class="modal fade" id="modal-kategori" data-backdrop="false" tabindex="-1" aria-labelledby="kategoriModal" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="kategoriModal">Kategori Barang</h4>
                        <button type="button" class="close mr-4" data-dismiss="modal" aria-label="Close" style="outline: none;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-1">awda</div>
                            <div class="col-lg-5">awd</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div> -->
            <!-- Topbar Search -->
            <!-- <div class="cls-input mt-2">
                <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style="min-width: 700px;">
                    <div class="input-group" style="width: 100%;">
                        <input type="text" class="form-control bg-light border-0 small" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <button class="btn" type="button" style="background-color: #5a5c69;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius:0;border-bottom-left-radius: 0">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
                     -->
            <!-- Topbar Navbar -->
            <!-- <ul class="navbar-nav" style="margin-left: 60px;"> -->

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a> -->
                    <!-- Dropdown - Messages -->
                    <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto navbar-search w-100">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <!-- Nav Item - cart -->
                       <!--  <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cart-plus"></i> -->
                                <!-- Counter - cart -->
                                <!-- <span class="badge badge-danger badge-counter">7</span>
                            </a> -->
                            <!-- Dropdown - cart -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="cartDropdown" style="width: 200px">
                                
                                <div class="ml-3 mt-1">
                                    Keranjang <span>(total n barang)</span>
                                    <a href="" class="mr-2" style="float: right;">Lihat sekarang</a>
                                </div>

                                <div class="dropdown-divider"></div>

                                <div class="dropdown-list mt-1 ml-2 mb-2">
                                    <div class="ml-3 mr-3">
                                        <div class="float-left mr-3"><img src="<?= base_url();?>assets/img/img-profil/<?= $user['img_profil'] ;?>" width="43" height="43"></div>
                                        <div style="min-width:50%;max-width: 90%;">
                                            <a href="">Nama Barang</a> <span class="float-right">Harga</span>
                                            <p>( n Barang)</p>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>  
                            </div>
                        </li>

                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item mx-1 mr-4 mb-2 mt-3 ">
                    <a class="btn-masuk" href="<?= base_url('auth') ?>">Masuk</a>
                </li>
                <li class="nav-item mx-1 mt-3">
                    <a class="btn-daftar" href="<?= base_url('auth/registrasi')  ?>">Daftar</a>
                </li> 
            </ul>
        </nav> -->
        <!-- End of Topbar -->