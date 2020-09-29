     <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 mt-3 static-top shadow">

                    <div class="row">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-sm-2 mt-2">
                                    <!-- Logo -->
                                    <div class="mt-4 ml-3">
                                        <a href="<?=base_url('') ?>" style="color: #858796; text-decoration: none;"><i class="fas fa-store-alt"></i> Toko Online</a>
                                    </div>
                                </div>
                                <div class="col-sm-2 mt-3">
                                    <div class="dropdown mt-2">
                                        <a href="#" class="nav-link" id="kategoriDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span style="color: #858796">Kategori <i class="fa fa-chevron-down"></i></span>                        </a>
                                        <div class="dropdown-menu shadow animated--grow-in" aria-labelledby="kategoriDropdown">
                                            <ul>
                                                <li>Kategori 1</li>
                                                <li>Kategori 2</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 mt-3">
                                    <!-- Topbar Search -->
                                    <div class="mt-2">
                                        <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style="min-width: 500px;">
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control bg-light border-0 small" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <button class="btn" type="button" style="background-color: #5a5c69;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius:0;border-bottom-left-radius: 0">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-1 mt-2">
                                    <!-- Topbar Navbar -->
                                    <ul class="navbar-nav">

                                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                        <li class="nav-item dropdown no-arrow d-sm-none">
                                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-search fa-fw"></i>
                                            </a>
                                            <!-- Dropdown - Messages -->
                                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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
                                        </li>

                                        <!-- Nav Item - cart -->
                                        <li class="nav-item dropdown no-arrow mx-1">
                                            <a class="nav-link dropdown-toggle" href="#" id="cartDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cart-plus"></i>
                                                <!-- Counter - cart -->
                                                <span class="badge badge-danger badge-counter">7</span>
                                            </a>
                                            <!-- Dropdown - cart -->
                                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="cartDropdown">
                                                <h6 class="dropdown-header">
                                                    Message Center
                                                </h6>

                                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                            </div>
                                        </li>
                                        <?php if ($this->session->userdata('email') == true){ ?>

                                        <!-- Nav Item - Alerts -->
                                        <li class="nav-item dropdown no-arrow mx-1">
                                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-bell fa-fw"></i>
                                                <!-- Counter - Alerts -->
                                                <span class="badge badge-danger badge-counter">3+</span>
                                            </a>
                                            <!-- Dropdown - Alerts -->
                                            <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="alertsDropdown">
                                                <h6 class="dropdown-header">
                                                    Alerts Center
                                                </h6>

                                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                            </div>
                                        </li>

                                        <!-- Nav Item - Messages -->
                                        <li class="nav-item dropdown no-arrow mx-1">
                                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-envelope fa-fw"></i>
                                                <!-- Counter - Messages -->
                                                <span class="badge badge-danger badge-counter">7</span>
                                            </a>
                                            <!-- Dropdown - Messages -->
                                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                                <h6 class="dropdown-header">
                                                    Message Center
                                                </h6>

                                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                            </div>
                                        </li>

                                        

                                        <div class="topbar-divider d-none d-sm-block"></div>
                                        
                                        <!-- Nav Item - toko -->
                                        <li class="nav-item dropdown no-arrow mx-1">
                                            <a class="nav-link dropdown-toggle" href="#" id="tokoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-store"></i>
                                                <!-- Counter - toko -->
                                                <span class="badge badge-danger badge-counter"></span>
                                                <span class=""> Toko</span>
                                            </a>
                                        </li>

                                        

                                        <div class="topbar-divider d-none d-sm-block"></div>


                                        <!-- Nav Item - User Information -->
                                        <li class="nav-item dropdown no-arrow">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img class="rounded-circle mr-1" width="30" height="30" src="<?= base_url();?>assets/img/img-profil/<?= $user['img_profil'] ;?>"></img>
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $nama = explode(' ', $user['nama']) ; echo $nama[0];?></span>
                                            </a>
                                            <!-- Dropdown - User Information -->
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Profile
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Settings
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Activity Log
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?= base_url('auth/logout');?>">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        <!-- </li> -->
                                        <?php }else{?>
                                            <div class="topbar-divider d-none d-sm-block"></div>
                                        <li class="nav-item">
                                            <a class="" href="<?= base_url('auth') ?>">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="" href="<?= base_url('auth/registrasi')  ?>">Daftar</a>
                                        </li>   
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    


                </nav>
                <!-- End of Topbar -->