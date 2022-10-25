<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('/dashboard') ?>" class="brand-link">
    <?php foreach ($tampilCompany as $row) { ?>
      <img src="<?= base_url('dist/img/') . $row->image ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $row->nama ?></span>
    <?php } ?>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('dist/img/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= site_url('administrator/data_user/profile') ?>" class="d-block"><?= $user['nama'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">MAIN NAVIGATION</li>
        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard' and $this->uri->segment(2) == '') echo 'active' ?>">
            <i class="nav-icon fas fa-tachometer"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) { ?>
          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if (
                                          $this->uri->segment(1) == 'master'
                                        ) echo 'active' ?>">
              <i class="fas fa-folder nav-icon"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
                <li class="nav-item">
                  <a href="<?= site_url('master/kendaraan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'kendaraan') echo 'active' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kendaraan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('master/pemegang') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pemegang') echo 'active' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemegang Kendaraan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('master/service') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'service') echo 'active' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Service</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('master/pelanggan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pelanggan') echo 'active' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pelanggan</p>
                  </a>
                </li>
              <?php } ?>

              <li class="nav-item">
                <a href="<?= site_url('master/barang') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'barang') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('master/supplier') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'supplier') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>

            </ul>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
          <li class="nav-header">BOOKING</li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if (
                                          $this->uri->segment(1) == 'booking'
                                        ) echo 'active' ?>">
              <i class="fas fa-folder nav-icon"></i>
              <p>
                Data Booking
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('booking/pending') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pending') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('booking/antri') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'antri') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Antrian Service</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role_id') == 1) { ?>
          <li class="nav-header">SUPPLIER</li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if (
                                          $this->uri->segment(1) == 'supplier'
                                        ) echo 'active' ?>">
              <i class="fas fa-folder nav-icon"></i>
              <p>
                Data Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('supplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'barang') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('role_id') == 4) { ?>
          <li class="nav-header">SUPPLIER</li>
          <li class="nav-item">
            <a href="<?= site_url('supplier/barang/') ?><?= $this->session->userdata('kode_supplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'supplier' && $this->uri->segment(2) == 'barang') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Barang</p>
            </a>
          </li>
          </li>
        <?php } ?>


        <li class="nav-header">TRANSAKSI</li>
        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if ($this->uri->segment(3) == 'pembelian' || $this->uri->segment(3) == 'histori_pembelian') echo 'active' ?>">
              <i class=" fas fa-shopping-cart nav-icon"></i>
              <p>
                Pembelian Stock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/select_supplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'penjualan' && $this->uri->segment(3) == 'pembelian') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/histori_pembelian') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'penjualan' && $this->uri->segment(3) == 'histori_pembelian') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('role_id') == 4) { ?>
          <li class="nav-item">
            <a href="<?= site_url('penjualan/transaksi/histori_pembelian') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'penjualan' && $this->uri->segment(3) == 'histori_pembelian') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Riwayat Penjualan</p>
            </a>
          </li>
        <?php } ?>



        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if ($this->uri->segment(3) == 'barang' || $this->uri->segment(3) == 'histori_penjualan' || $this->uri->segment(3) == 'transaksi_barang_pending') echo 'active' ?>">
              <i class="fas fa-usd nav-icon"></i>
              <p>
                Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/barang') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'barang') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/transaksi_barang_pending') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'penjualan' && $this->uri->segment(3) == 'transaksi_barang_pending') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bayar</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/histori_penjualan') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'histori_penjualan') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Penjualan</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if (
                                          $this->uri->segment(3) == 'service' ||
                                          $this->uri->segment(3) == 'select_pemegang' ||
                                          $this->uri->segment(3) == 'histori_service_kendaraan' ||
                                          $this->uri->segment(3) == 'service_pending' ||
                                          $this->uri->segment(3) == 'service_proses' ||
                                          $this->uri->segment(3) == 'service_selesai'
                                        ) echo 'active'
                                        ?>">
              <i class="fas fa-wrench nav-icon"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/select_pemegang') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'service') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Transaksi</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/service_pending') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'service_pending') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/service_proses') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'service_proses') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/service_selesai') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'service_selesai') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selesai</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('penjualan/transaksi/histori_service_kendaraan') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'histori_service_kendaraan') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Service</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-header">LAPORAN</li>
        <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) { ?>
          <li class="nav-item">
            <a href="<?= site_url('laporan/service') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'service') echo 'active' ?> ">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Service</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/penjualan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'penjualan') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/pembelian') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pembelian') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Pembelian</p>
            </a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('role_id') == 3) { ?>
          <li class="nav-item">
            <a href="<?= site_url('laporan/pembelian') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pembelian') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Pembelian</p>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('role_id') == 4) { ?>
          <li class="nav-item">
            <a href="<?= site_url('laporan/pembelian') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pembelian') echo 'active' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Penjualan</p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'user') echo 'active' ?>">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>
              User Manager
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('pengaturan/user/profile') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'profile') echo 'active' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>My Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('pengaturan/user/edit_profile') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'edit_profile') echo 'active' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit Profile</p>
              </a>
            </li>
            <?php if ($this->session->userdata('role_id') == 1) { ?>
              <li class="nav-item">
                <a href="<?= site_url('pengaturan/user/list') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'list') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('pengaturan/user/tambah_user') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'tambah_user') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User Baru</p>
                </a>
              </li>
            <?php } ?>
            </a>
        </li>
      </ul>
      </li>

      <?php if ($this->session->userdata('role_id') == 1) { ?>
        <li class="nav-item">
          <a href="<?= site_url('pengaturan/bengkel') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'bengkel') echo 'active' ?>">
            <i class="fas fa-gear nav-icon"></i>
            <p>Pengaturan</p>
          </a>
        </li>
      <?php } ?>


      <li class="nav-item">
        <a href="<?= site_url('auth/logout') ?>" class="nav-link">
          <i class="fas fa-sign-out nav-icon"></i>
          <p>Logout</p>
        </a>
      </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>