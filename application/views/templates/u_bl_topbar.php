     <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4  static-top shadow">    <!-- Logo -->
                    <div class="mt-2 ml-3">
                        <a href="<?=base_url('') ?>" style="color: #858796; text-decoration: none;"><i class="fas fa-store-alt"></i> Toko Online</a>
                    </div>
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
                    <!-- Topbar Search -->
                    <div class="mt-2">
                        <form class="d-none d-sm-inline-block form-inline my-2 my-md-0 navbar-search" style="min-width: 700px;">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control bg-light border-0 small" style="border-top-left-radius: 20px;border-bottom-left-radius: 20px" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <button class="btn" type="button" style="background-color: #5a5c69;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-top-left-radius:0;border-bottom-left-radius: 0">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav" style="margin-left: 90px;">

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
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item mx-1 mr-2 mb-2 mt-3 ">
                            <a class="btn-masuk" href="<?= base_url('auth') ?>">Masuk</a>
                        </li>
                        <li class="nav-item mx-1 mt-3">
                            <a class="btn-daftar" href="<?= base_url('auth/registrasi')  ?>">Daftar</a>
                        </li> 
                    </ul>
                </nav>
                <!-- End of Topbar -->