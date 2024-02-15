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
    }, 3000);
});
</script>
<?php
}
?>

<br>
<?php
					if ($this->session->userdata('level')=='Peminjam') {
						
				?>

<?php
					}else{
				?>
<div class="row">
    <div class="col-md-12">
        <button type="button" data-bs-target=".Tambah" data-bs-toggle="modal"
            class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Buku
        </button>
    </div>
</div>
<?php
					}
?>
<div>
    <!-- center modal -->
    <div class="modal fade Tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action=" <?= base_url()?>buku/simpan">
                        <div class="mb-3">
                            <label for="floatingidaInput">Id Buku</label>
                            <input type="text" name="id_buku" class="form-control" id="floatingidaInput" readonly
                                value="<?= $id_buku ?>" placeholder="">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="judul_buku" class="form-control" id="floatingnameInput"
                                placeholder="Enter Name">
                            <label for="floatingnameInput">Judul Buku</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="id_pengarang" class="form-select" id="pengarang"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Pengarang</option>
                                        <?php
											foreach ($pengarang as $row) {?>
                                        <option value="<?= $row->id_pengarang ?>"><?= $row->nama_pengarang ?></option>
                                        <?php
											}
										?>
                                    </select>
                                    <label for="pengarang">Pengarang</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="id_penerbit" class="form-select" id="penerbit"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Penerbit</option>
                                        <?php
											foreach ($penerbit as $row) {?>
                                        <option value="<?= $row->id_penerbit ?>"><?= $row->nama_penerbit ?></option>
                                        <?php
											}
										?>
                                    </select>
                                    <label for="penerbit">Penerbit</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <select name="id_kategori" class="form-select" id="kategori"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Kategori</option>
                                        <?php
											foreach ($kategori as $row) {?>
                                        <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                        <?php
											}
										?>
                                    </select>
                                    <label for="kategori">Kategori</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3" id="datepicker6">
                                    <input id="tahun" name="tahun_terbit" type="text" class="form-control"
                                        placeholder="dd M, yyyy" data-date-format="yyyy"
                                        data-date-container='#datepicker6' data-provide="datepicker"
                                        data-date-autoclose="true" data-date-min-view-mode="2">
                                    <label for="tahun"><i class="mdi mdi-calendar">Tahun Terbit</i></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="jumlah" class="form-control" id="jumlah"
                                        placeholder="Masukkan Jumlah">
                                    <label for="jumlah">Jumlah Buku</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" mb-3">
                                    <label for="ebook" class="form-label">Upload File E-Book</label>
                                    <input class="form-control" type="file" id="ebook" name="ebook">
                                </div>
                            </div>
                        </div>
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
                <?php
	if ($this->session->userdata('level')=='Peminjam') {?>
                <table id="datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$no = 1;
	foreach ($data->result() as $row) {
?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->nama_pengarang ?></td>
                            <td><?= $row->nama_penerbit ?></td>
                            <td><?= $row->nama_kategori ?></td>
                            <td><?= $row->tahun_terbit ?></td>
                            <td>
                                <a class="btn btn-success waves-effect waves-light w-sm btn-pilih"
                                    data-id="<?= $row->id_buku ?>" data-jumlah="<?= $row->jumlah ?>"
                                    data-bs-toggle="modal" data-bs-target="#PilihModal<?= $row->id_buku ?>">
                                    <i class="mdi mdi-pencil d-block font-size-2"></i>Pilih
                                </a>
                                <form class="mt-2" action="<?= base_url(); ?>buku/baca/<?= $row->ebook ?>"
                                    method="post">
                                    <button class="btn btn-info waves-effect waves-light w-sm" name="view">Baca</button>
                                </form>
                            </td>

                        </tr>
                        <div>
                            <!-- center modal -->
                            <div class="modal fade" id="PilihModal<?= $row->id_buku ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action=" <?= base_url()?>peminjaman/simpan">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_pm" class="form-control"
                                                        id="floatingidaInput" readonly value="<?= $id_pm ?>"
                                                        placeholder="">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="hidden" name="id" class="form-control"
                                                                id="floatingidaInput" readonly
                                                                value="<?= $this->session->userdata('id') ?>"
                                                                placeholder="">
                                                            <input type="text" class="form-control"
                                                                id="floatingidaInput" readonly
                                                                value="<?= $this->session->userdata('nama') ?>"
                                                                placeholder="">
                                                            <label for="peminjam">Peminjam</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="hidden" name="id_buku" class="form-control"
                                                                id="id_buku" readonly value="<?= $row->id_buku ?>"
                                                                placeholder="">
                                                            <input type="text" class="form-control" id="id_buku"
                                                                readonly value="<?= $row->judul_buku ?>" placeholder="">
                                                            <label for="id_buku">Buku</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3" id="datepicker1">
                                                            <input id="tgl_pinjam" name="tgl_pinjam" type="text"
                                                                class="form-control" placeholder="dd M, yyyy"
                                                                value="<?= date('d-m-Y') ?>" readonly>
                                                            <label for="tgl_pinjam"><i class="mdi mdi-calendar">Tanggal
                                                                    Pinjam</i></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3" id="datepicker2">
                                                            <input id="tgl_kembali" name="tgl_kembali" type="text"
                                                                class="form-control"
                                                                value="<?php $seminggu = mktime(0,0,0,date("n"),date("j")+ 7, date("Y")); echo date('d-m-Y', $seminggu) ?>"
                                                                readonly>
                                                            <label for="tgl_kembali"><i class="mdi mdi-calendar">Tanggal
                                                                    Kembali</i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between p-2">
                                                    <button onclick="return confirm('Yakin Ingin Pinjam Buku ini?')"
                                                        type="submit" class="btn btn-primary">Pinjam</button>
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
						$no++;
	}
?>
                    </tbody>
                </table>
                <?php } else{
					?>
                <table id="datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$no = 1;
	foreach ($data->result() as $row) {
?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->nama_pengarang ?></td>
                            <td><?= $row->nama_penerbit ?></td>
                            <td><?= $row->nama_kategori ?></td>
                            <td><?= $row->tahun_terbit ?></td>
                            <td><?= $row->jumlah ?></td>
                            <td>

                                <a data-bs-toggle="modal" data-bs-target=".Edit<?= $row->id_buku ?>"
                                    class="btn btn-success waves-effect waves-light w-sm"> <i
                                        class="mdi mdi-pencil d-block font-size-2"></i> Edit</a>
                                <a href="buku/hapus/<?= $row->id_buku ?>"
                                    class="btn btn-danger waves-effect waves-light w-sm"
                                    onclick="return confirm('Yakin Ingin Menghapus?')"> <i
                                        class="mdi mdi-trash-can d-block font-size-2"></i> Delete</a>

                                </button>
                            </td>
                        </tr>
                        <div>
                            <!-- center modal -->
                            <div class="modal fade Edit<?= $row->id_buku ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" method="POST"
                                                action=" <?= base_url()?>buku/update">
                                                <div class="mb-3">
                                                    <label for="floatingidaInput">Id Buku</label>
                                                    <input type="text" name="id_buku" class="form-control"
                                                        id="floatingidaInput" readonly value="<?= $row->id_buku ?>"
                                                        placeholder="">
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="judul_buku" value="<?= $row->judul_buku ?>"
                                                        class="form-control" id="floatingnameInput"
                                                        placeholder="Enter Name">
                                                    <label for="floatingnameInput">Judul Buku</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <select name="id_pengarang" class="form-select"
                                                                id="pengarang"
                                                                aria-label="Floating label select example">
                                                                <?php
											foreach ($pengarang as $rows) {
												if ($rows->id_pengarang == $row->id_pengarang) {
												?>
                                                                <option selected value="<?= $row->id_pengarang ?>">
                                                                    <?= $row->nama_pengarang ?></option>
                                                                <?php
												}else{
												?>
                                                                <option value="<?= $rows->id_pengarang ?>">
                                                                    <?= $rows->nama_pengarang ?></option>
                                                                <?php
												}
											}
										?>
                                                            </select>
                                                            <label for="pengarang">Pengarang</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <select name="id_penerbit" class="form-select" id="penerbit"
                                                                aria-label="Floating label select example">
                                                                <?php
											foreach ($penerbit as $rows) {
												if ($rows->id_penerbit == $row->id_penerbit) {
												?>
                                                                <option selected value="<?= $row->id_penerbit ?>">
                                                                    <?= $row->nama_penerbit ?></option>
                                                                <?php
												}else{
												?>
                                                                <option value="<?= $rows->id_penerbit ?>">
                                                                    <?= $rows->nama_penerbit ?></option>
                                                                <?php
												}
											}
										?>
                                                            </select>
                                                            <label for="penerbit">Penerbit</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3">
                                                            <select name="id_kategori" class="form-select" id="kategori"
                                                                aria-label="Floating label select example">
                                                                <?php
											foreach ($kategori as $rows) {
												if ($rows->id_kategori == $row->id_kategori) {
												?>
                                                                <option selected value="<?= $row->id_kategori ?>">
                                                                    <?= $row->nama_kategori ?></option>
                                                                <?php
												}else{
												?>
                                                                <option value="<?= $rows->id_kategori ?>">
                                                                    <?= $rows->nama_kategori ?></option>
                                                                <?php
												}
											}
										?>
                                                            </select>
                                                            <label for="kategori">kategori</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3" id="datepicker6">
                                                            <input id="tahun" value="<?= $row->tahun_terbit?>"
                                                                name="tahun_terbit" type="text" class="form-control"
                                                                data-provide="datepicker"
                                                                data-date-container='#datepicker6'
                                                                data-date-format="yyyy" data-date-min-view-mode="2">
                                                            <label for="tahun">Tahun Terbit</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input value="<?= $row->jumlah?>" id="jumlah" name="jumlah"
                                                                type="number" class="form-control">
                                                            <label for="jumlah">Jumlah Buku</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="ebook" class="form-label">Upload File
                                                                E-Book</label>
                                                            <input class="form-control" type="file" id="ebook"
                                                                name="ebook">
                                                            <small class="text-muted">Biarkan kosong jika tidak ingin
                                                                mengubah file e-book.</small>
                                                        </div>
                                                    </div>
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
						$no++;
	}
?>
                    </tbody>
                </table>
                <?php
				}
				?>
            </div>
        </div>
    </div>
    <!-- end col-->
</div> <!-- end row -->


<script>
// Event listener untuk tombol "Pilih"
$('.btn-pilih').click(function() {
    var id_buku = $(this).data('id');
    var jumlah_buku = $(this).data('jumlah');

    // Periksa apakah jumlah buku = 0
    if (jumlah_buku <= 0) {
        // Tampilkan pesan dan tutup modal
        alert('Maaf, Stok Buku Ini Sedang Kosong');
        l
        ocation.reload();
    }
});
</script>