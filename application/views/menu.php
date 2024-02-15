<?php
	if ($this->session->userdata('level')=='Administrator') {?>
<div class="vertical-menu">

    <data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= base_url() ?>dashboard" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-home">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url()  ?>anggota" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-user">Data Anggota</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-desktop"></i>
                        <span key="t-data">Data Buku</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>pengarang" key="t-products">Pengarang</a></li>
                        <li><a href="<?= base_url()  ?>penerbit" key="t-product-detail">Penerbit</a></li>
                        <li><a href="<?= base_url()  ?>kategori" key="t-product-detail">Kategori</a></li>
                        <li><a href="<?= base_url()  ?>buku" key="t-product-detail">Buku</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-duplicate"></i>
                        <span key="t-data">Aktivitas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>peminjaman" key="t-products">Peminjaman</a></li>
                        <li><a href="<?= base_url()  ?>pengembalian" key="t-product-detail">Pengembalian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-report"></i>
                        <span key="t-data">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>laporan" key="t-products">Laporan Peminjaman</a></li>
                        <li><a href="<?= base_url()  ?>laporanpengembalian" key="t-product-detail">Laporan
                                Pengembalian</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url()?>login/logout" class="waves-effect"
                        onclick=" return confirm('Yakin Ingin Logout?')">
                        <i class="bx bx-exit"></i>
                        <span key="t-home">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
</div>
</div>
<?php
	}
	elseif ($this->session->userdata('level')=='Petugas') 
	{
		?>
<div class="vertical-menu">
    <data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= base_url() ?>dashboard" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-home">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url()  ?>anggota" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-user">Data Anggota</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-desktop"></i>
                        <span key="t-data">Data Buku</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>pengarang" key="t-products">Pengarang</a></li>
                        <li><a href="<?= base_url()  ?>penerbit" key="t-product-detail">Penerbit</a></li>
                        <li><a href="<?= base_url()  ?>kategori" key="t-product-detail">Kategori</a></li>
                        <li><a href="<?= base_url()  ?>buku" key="t-product-detail">Buku</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-duplicate"></i>
                        <span key="t-data">Aktivitas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>peminjaman" key="t-products">Peminjaman</a></li>
                        <li><a href="<?= base_url()  ?>pengembalian" key="t-product-detail">Pengembalian</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-report"></i>
                        <span key="t-data">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>laporan" key="t-products">Laporan Peminjaman</a></li>
                        <li><a href="<?= base_url()  ?>laporanpengembalian" key="t-product-detail">Laporan
                                Pengembalian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url()?>login/logout" class="waves-effect"
                        onclick=" return confirm('Yakin Ingin Logout?')">
                        <i class="bx bx-exit"></i>
                        <span key="t-home">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        </ div>
</div>
<?php
	}else{
?>

<div class="vertical-menu">

    <data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= base_url() ?>dashboard" class="waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-home">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>buku" class="waves-effect">
                        <i class="bx bx-desktop"></i>
                        <span key="t-home">Buku</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-duplicate"></i>
                        <span key="t-data">Aktivitas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url()  ?>peminjaman" key="t-products">Peminjaman</a></li>
                        <li><a href="<?= base_url()  ?>history" key="t-product-detail">Riwayat Peminjaman</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url()?>login/logout" class="waves-effect"
                        onclick=" return confirm('Yakin Ingin Logout?')">
                        <i class="bx bx-exit"></i>
                        <span key="t-home">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
</div>
</div>
<?php
	}
?>