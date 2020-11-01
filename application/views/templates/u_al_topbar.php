<style>
* {box-sizing: border-box;}
body {
    
}

.pengiriman li{ padding: 0;margin:0; }

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

@media (min-width : 1300px){
    .input-search{width: 200%;}
}


</style>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- 12-Oktober-2020 -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white topbar fixed-top shadow">
            <div class="container-fluid">              
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
                        <div class="dropdown-menu bg-white" style="min-height: 580px; height: auto;" aria-labelledby="navbarDropdown">
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
                <div class="input-search mb-3" style="width: 600px; margin-right: auto;">
                  <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style=" min-width: 100%;">
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
                            <span class="badge badge-danger badge-counter"><?php foreach ($keranjang->result() as $r ) {echo $r->jumlah_produk_keranjang;} ?></span>
                        </a>
                        <div class="dropdown-list dropdown-menu bd-1-grey shadow animated--fade-in " aria-labelledby="cartDropdown" style="  max-width: 312px;max-height: 390px;">
                            

                            <?php if($keranjang){?>
                            <div class="bg-white bd-b-grey p-1 ml-1" style="position: fixed; min-width:300px; max-width: 310px">
                                <div class="p-2" style="font-weight: 700">
                                    <h6 style="float: left;font-size: 13.4px; ">Keranjang <span>(<?php foreach ($keranjang->result() as $r ) {
                                        if($r->jumlah_produk_keranjang = 0)
                                        {
                                            echo 0;
                                        }else
                                        {
                                            echo $r->jumlah_produk_keranjang;
                                        }
                                    } ?>)</span></h6>
                                    <a href="" class="ml-5" style="float: right;">Lihat semua</a>
                                </div>
                            </div>
                            <div class="mt-5 clearfix"></div>

                            <div class="pre-scrollable" style="overflow-x: hidden;">
                                
                                <?php  foreach ($keranjang->result() as $r){ ?>
                                <?php if($r->jumlah_keranjang != 0){ ?>

                                <div class="dropdown-list ml-2 mb-1 mt-2">
                                    <div class="ml-3 mr-3">
                                        <div class="float-left mr-3"><img src="<?= base_url();?>assets/img/img-produk/<?= $r->img_produk ;?>" width="43" height="43"></div>
                                        <div style="min-width:50%;max-width: 90%;">
                                            <a href="<?= base_url('keranjang') ?>"><?= $r->nama_produk; ?></a> <span class="float-right">Rp. <?= $r->harga;?></span>
                                            <p><?= $r->jumlah_produk; ?> barang</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <?php }else{ ?>
                                    <div class="text-center">
                                    <h2>Oops...</h2>
                                    <h4>Keranjang belanjaanmu kosong.</h4>
                                </div>
                                <?php }} ?>
                            </div>
                            <?php }?>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i> 
                            <span class="badge badge-danger badge-counter"></span>
                        </a> 
                        <div class="dropdown-list dropdown-menu shadow animated--fade-in" aria-labelledby="alertsDropdown" style="max-width: 300px; max-height: 500px">
                            <div class="bg-white bd-b-grey ml-2 mt-1 p-1" style="max-width: 280px; width: 80%; position: fixed; font-weight: 600;">
                                Notifikasi
                                <a href="" class="ml-5" style="float: right;"><i class="fas fa-cogs fa-lg"></i></a>
                            </div>
                            <div class=" mt-5 clearfix"></div>

                            <div class="dropdown-list ml-2 mr-3">
                                <div class="ml-1 p-1" style="max-width: 250px; width: 80%;">
                                Pembelian
                                    <a href="" class="ml-5" style="float: right;">Lihat semua</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                            <div class="ml-2 mr-2" style="max-width: 280px;">
                                <a href="#" class="ml-2 "> Menunggu pembayaran <span style="float: right;">jumlah n</span></a>
                                <div class="clearfix"></div>
                                <ul class="navbar-nav p-2 pengiriman">
                                    <li class="nav-item status">
                                        <a href="#"><i class="fas fa-clock fa-2x"></i><p>Menunggu Konfirmasi</p></a>
                                    </li>
                                    <li class="nav-item status">
                                        <a href="#"><i class="fas fa-sync-alt fa-2x"></i><p>Sedang diproses</p></a>
                                    </li>
                                    <li class="nav-item status">
                                        <a href="#"><i class="fas fa-truck-moving fa-2x"></i><p>Sedang dikirim</p></a>
                                    </li>
                                    <li class="nav-item status">
                                        <a href="#"><i class="fas fa-map-marker-alt fa-2x"></i><p>Sampai tujuan</p></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>
                     
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="tokoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-store"></i> 
                            <span class="badge badge-danger badge-counter"></span>
                            <span class=""> Toko</span>
                        </a>
                        <div class="dropdown-list dropdown-menu bd-1-grey shadow animated--fade-in " aria-labelledby="cartDropdown" style="max-width: 290px;max-height: 250px; min-height: 220px">
                            <?php if(!$toko) {?>
                                <div class="dropdown-body">
                                    <div class="text-center p-2">
                                        <h3>Oops..</h3>
                                        <h4>Kamu belum punya toko!</h4>
                                        <a href="<?= base_url('toko/buat') ?>" class="btn btn-info">Buat tokomu disini!</a>
                                    </div>
                                </div>
                            <?php }else{ ?>
                            <div class="bg-white bd-b-grey p-2 ml-1" style="">
                                <a href="<?= base_url('toko/profil/'. $toko["id_toko"].''); ?>">
                                    <div class="" style="">
                                        <img width="40" height="40" class="rounded-circle shadow" src="<?= base_url('assets/img/img-toko/'. $toko['img_toko']).''?>">
                                        <span class="ml-3" style="font-size: 18px;font-weight: 600"><?= $toko['nama_toko'] ;?></span>
                                    </div> 
                                </a>
                            </div>
                            <div class="" style="max-height:100px;">
                                <div class="ml-2 mr-2" style="max-width: 280px;">
                                    <p> Jumlah produk <span style="float: right;">jumlah n</span></a>
                                    <div class="clearfix"></div>
                                    <ul class="navbar-nav p-2 pengiriman" >
                                        <li class="nav-item status">
                                            <a href="#"><i class="fas fa-clock fa-2x"></i><p>Produk Pending</p></a>
                                        </li>
                                        <li class="nav-item status">
                                            <a href="#"><i class="fas fa-sync-alt fa-2x"></i><p>Pesanan Baru</p></a>
                                        </li>
                                        <li class="nav-item status">
                                            <a href="#"><i class="fas fa-truck-moving fa-2x"></i><p>Sedang dikirim</p></a>
                                        </li>
                                        <li class="nav-item status">
                                            <a href="#"><i class="fas fa-map-marker-alt fa-2x"></i><p>Sampai tujuan</p></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </li>

                    

                    <div class="topbar-divider d-none d-sm-block"></div>
     
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle mr-1" width="30" height="30" src="<?= base_url();?>assets/img/img-profil/<?= $user['img_profil'] ;?>"></img>
                            <span class="ml-2 mr-2 d-none d-lg-inline text-gray-600 small"><?php $nama = explode(' ', $user['nama']) ; echo $nama[0];?></span>
                        </a> 
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('auth/logout');?>" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
              </div>
            </div>
        </nav>


        <!-- 7-Oktober-2020 -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top shadow">
            <div class="mt-2 ml-4">
                <a href="<?=base_url('') ?>" style="color: #858796; text-decoration: none;"><i class="fas fa-store-alt"></i> Toko Online</a>
            </div>
            <div class="nav-link dropdown mt-2" >
                <a type="button" id="kategori-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="color: #858796">Kategori <i class="fa fa-chevron-down"></i></span>
                </a>
                <div class="dropdown-menu" style="width: 100%;left: 0;right: 0;" aria-labelledby="kategori-dropdown" >
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            
            <div class="mt-2" style="margin-right: auto;">
                <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style="min-width: 470px; max-height: 550px;">
                    <div class="input-group" style="width: 100%;">
                        <input type="text" class="form-control bg-light border-0 small" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <button class="btn" type="button" style="background-color: #5a5c69;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius:0;border-bottom-left-radius: 0">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <ul class="navbar-nav" style="margin-left: 100px; ">

                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cart-plus"></i> 
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--fade-in " aria-labelledby="cartDropdown" style="width: 200px; height: auto;max-height: 200px; overflow-y: auto;">
                        
                        <div class="position-static ml-3 mt-1">
                            Keranjang <span>(total n barang)</span>
                            <a href="" class="mr-2" style="float: right;">Lihat semua</a>
                        </div>

                        <div class="dropdown-divider"></div>

                        <?php $query = "SELECT * FROM tb_det_akun"; $row = $this->db->query($query); 
                            foreach ($row as $r): ?>

                        <div class="dropdown-list  mt-1 ml-2 mb-2">
                            <div class="ml-3 mr-3">
                                <div class="float-left mr-3"><img src="<?= base_url();?>assets/img/img-profil/<?= $user['img_profil'] ;?>" width="43" height="43"></div>
                                <div style="min-width:50%;max-width: 90%;">
                                    <a href="">Nama Barang</a> <span class="float-right">Harga</span>
                                    <p>( n Barang)</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; ?>

                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i> 
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a> 
                    <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>

                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>
                 
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="tokoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-store"></i> 
                        <span class="badge badge-danger badge-counter"></span>
                        <span class=""> Toko</span>
                    </a>
                    <div class="dropdown-menu shadow animated--fade-in" aria-labelledby="tokoDropdown">
                        <div class="dropdown"></div>
                    </div>

                </li>

                

                <div class="topbar-divider d-none d-sm-block"></div>
 
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle mr-1" width="30" height="30" src="<?= base_url();?>assets/img/img-profil/<?= $user['img_profil'] ;?>"></img>
                        <span class="ml-2 mr-2 d-none d-lg-inline text-gray-600 small"><?php $nama = explode(' ', $user['nama']) ; echo $nama[0];?></span>
                    </a> 
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout');?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav> -->