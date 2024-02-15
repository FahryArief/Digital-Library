<?php
					if ($this->session->userdata('level')=='Peminjam') {
						
				?>
<br>
<div class="row">
    <div class="col-md-3">
        <a href="<?= base_url() ?>buku">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Buku</p>
                            <h4 class="mb-0"><?= $buku ?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                <span class="avatar-title">
                                    <i class="bx bx-book font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url() ?>peminjaman">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Peminjaman</p>
                            <h4 class="mb-0"><?= $peminjaman ?></h4>
                        </div>

                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                <span class="avatar-title">
                                    <i class="bx bx-note font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url() ?>pengembalian">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Pengembalian</p>
                            <h4 class="mb-0"><?= $pengembalian ?></h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                <span class="avatar-title">
                                    <i class="bx bx-chart font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
        </a>

    </div>
</div>
<!-- end row -->
</div>
</div>
<!-- end row -->

</div>
<!-- container-fluid -->
<?php
					}else{
				?>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <a href="<?= base_url()  ?>anggota">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Anggota</p>
                                    <h4 class="mb-0"><?= $anggota ?></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-user font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url() ?>buku">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Buku</p>
                                <h4 class="mb-0"><?= $buku ?></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title">
                                        <i class="bx bx-book font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url() ?>peminjaman">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Peminjaman</p>
                                <h4 class="mb-0"><?= $peminjaman ?></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title">
                                        <i class="bx bx-note font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url() ?>pengembalian">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Pengembalian</p>
                                <h4 class="mb-0"><?= $pengembalian ?></h4>
                            </div>
                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title">
                                        <i class="bx bx-chart font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            </a>
        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
<!-- end row -->

</div>
<!-- container-fluid -->
<?php
					}
?>
<!-- start page title -->

<!-- end page title -->