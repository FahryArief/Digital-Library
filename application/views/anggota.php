<?php
if (!empty($this->session->flashdata('info'))) {
?>
<div aria-live="polite" aria-atomic="true">
    <div class="toast fade show align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <?= $this->session->flashdata('info'); ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
// Add the following JavaScript code to auto-close the toast after 3000 milliseconds (3 seconds)
$(document).ready(function() {
    setTimeout(function() {
        $('.toast').toast('hide');
    }, 2000);
});
</script>
<?php
}
?>

<br>

<?php
					if ($this->session->userdata('level')=='Administrator') {
						
				?>
<div class="row">
    <div class="col-md-12">
        <button type="button" data-bs-target=".Tambah" data-bs-toggle="modal"
            class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Anggota
        </button>
    </div>
</div>
<?php
					}else{
				?>

<?php
					}
?>

<div>
    <!-- center modal -->
    <div class="modal fade Tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Center modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action=" <?= base_url()?>anggota/simpan">

                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingnameInput"
                                placeholder="Enter Name">
                            <label for="floatingnameInput">Nama Anggota</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Masukkan Username">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Masukkan Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="no_hp" class="form-control" id="no_hp"
                                        placeholder="Masukkan Nomor HandPhone">
                                    <label for="no_hp">Nomor Handphone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="jenkel" class="form-select" id="floatingSelectGrid"
                                        aria-label="Floating label select example">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="floatingSelectGrid">Jenis Kelamin</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Masukkan Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <textarea name="alamat" id="alamat" class="form-control" cols="5" rows="5"
                                        placeholder="Masukkan Alamat"></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="level" class="form-select" id="level"
                                aria-label="Floating label select example">
                                <option selected disabled> -Pilih Level-</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Peminjam">Peminjam</option>
                            </select>
                            <label for="level">Level</label>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>

<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>No.Telepon</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Level</th>
                            <?php
					if ($this->session->userdata('level')=='Administrator') {
						
				?>
                            <th>Aksi</th>
                            <?php
					}else{
					}
?>

                        </tr>
                    </thead>

                    <tbody>
                        <?php

$no = 1;
	foreach ($data as $row) {
		
?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->username ?></td>
                            <td><?= $row->jenkel ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td><?= $row->alamat ?></td>
                            <td><?= $row->email ?></td>
                            <td><?php if($row->level == 'Administrator') {
    echo "<span class='badge bg-danger'>".$row->level."</span>"; 
} elseif ($row->level == 'Petugas') {
    echo"<span class='badge bg-warning'>".$row->level."</span>"; 
} else {
    echo "<span class='badge bg-success'>".$row->level."</span>"; 
};
?></td>
                            <?php
					if ($this->session->userdata('level')=='Administrator') {
						
				?>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target=".Edit<?= $row->id ?>"
                                    class="btn btn-success waves-effect waves-light w-sm"> <i
                                        class="mdi mdi-pencil d-block"></i> Edit</a>
                                <a href="anggota/hapus/<?= $row->id ?>"
                                    class="btn btn-danger waves-effect waves-light w-sm"
                                    onclick="return confirm('Yakin Ingin Menghapus?')"> <i
                                        class="mdi mdi-trash-can d-block"></i> Delete</a>

                            </td>
                            <?php
					}else{					}
?>

                        </tr>
                        <div>
                            <!-- center modal -->
                            <div class="modal fade Edit<?= $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action=" <?= base_url()?>anggota/update">
                                                <div class="mb-3">

                                                    <input type="hidden" name="id" class="form-control"
                                                        id="floatingidaInput" readonly value="<?= $row->id ?>"
                                                        placeholder="">
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="name" class="form-control"
                                                        id="floatingnameInput" placeholder="Enter Name"
                                                        value="<?= $row->nama ?>">
                                                    <label for=" floatingnameInput">Nama Anggota</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="username" class="form-control"
                                                                id="username" value="<?= $row->username ?>"
                                                                placeholder="Masukkan Username">
                                                            <label for="username">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="password" name="password" class="form-control"
                                                                id="password" value="<?= $row->password ?>"
                                                                placeholder="Masukkan Password">
                                                            <label for="password">Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" name="no_hp" class="form-control"
                                                                id="no_hp" value="<?= $row->no_hp ?>"
                                                                placeholder="Masukkan Nomor HandPhone">
                                                            <label for="no_hp">Nomor Handphone</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <select name="jenkel" class="form-select"
                                                                id="floatingSelectGrid"
                                                                aria-label="Floating label select example">
                                                                <?php
																	if ($row->nama == "Laki Laki") {
																?>
                                                                <option value="Laki Laki" selected>Laki Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                <?php
																	}else{
																?>
                                                                <option value="Laki Laki">Laki Laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                                <?php
																	}
																?>
                                                            </select>
                                                            <label for="floatingSelectGrid">Jenis Kelamin</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" name="email" class="form-control"
                                                                id="email" value="<?= $row->email ?>"
                                                                placeholder="Masukkan Email">
                                                            <label for="email">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <textarea name="alamat" id="alamat" class="form-control"
                                                                cols="5" rows="5"
                                                                placeholder="Masukkan Alamat"><?= $row->alamat ?></textarea>
                                                            <label for="alamat">Alamat</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <select name="level" class="form-select" id="level"
                                                        aria-label="Floating label select example">
                                                        <?php
																	if ($row->level == "Administrator") {
																?>
                                                        <option value="Administrator" selected>Administrator</option>
                                                        <option value="Petugas">Petugas</option>
                                                        <option value="Peminjam">Peminjam</option>
                                                        <?php
																	}else if($row->level == "Administrator"){
																?>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Petugas" selected>Petugas</option>
                                                        <option value="Peminjam">Peminjam</option>
                                                        <?php
																	}else{
																?>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Petugas">Petugas</option>
                                                        <option value="Peminjam" selected>Peminjam</option>
                                                        <?php
																	}
																?>
                                                    </select>
                                                    <label for="level">Level</label>
                                                </div>
                                                <div class="d-flex justify-content-between p-2">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <?php
						
	}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- end row -->