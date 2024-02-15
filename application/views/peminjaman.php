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
					if ($this->session->userdata('level')=='Peminjam') {
						
				?>

<?php
					}else{
				?>
<div class="row">
    <div class="col-md-12">
        <button type="button" data-bs-target=".Tambah" data-bs-toggle="modal"
            class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Peminjaman
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
                    <form method="POST" action=" <?= base_url()?>peminjaman/simpan">
                        <div class="mb-3">
                            <label for="floatingidaInput">Id Peminjaman</label>
                            <input type="text" name="id_pm" class="form-control" id="floatingidaInput" readonly
                                value="<?= $id_pm ?>" placeholder="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="id" class="form-select" id="peminjam"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Peminjam</option>
                                        <?php
											foreach ($peminjam as $row) {?>
                                        <option value="<?= $row->id?>"><?= $row->nama ?></option>
                                        <?php
											}
										?>
                                    </select>
                                    <label for="peminjam">Peminjam</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="id_buku" class="form-select" id="id_buku"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Buku</option>
                                        <?php
											foreach ($buku as $row) {?>
                                        <option value="<?= $row->id_buku ?>"><?= $row->judul_buku ?></option>
                                        <?php
											}
										?>
                                    </select>
                                    <label for="id_buku">Buku</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3" id="datepicker1">
                                    <input id="tgl_pinjam" name="tgl_pinjam" type="text" class="form-control"
                                        placeholder="dd M, yyyy" value="<?= date('d-m-Y') ?>" readonly>
                                    <label for="tgl_pinjam"><i class="mdi mdi-calendar">Tanggal Pinjam</i></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3" id="datepicker2">
                                    <input id="tgl_kembali" name="tgl_kembali" type="text" class="form-control"
                                        value="<?php $seminggu = mktime(0,0,0,date("n"),date("j")+ 7, date("Y")); echo date('d-m-Y', $seminggu) ?>"
                                        readonly>
                                    <label for="tgl_kembali"><i class="mdi mdi-calendar">Tanggal Kembali</i></label>
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

                <table id="datatable" class="table table-striped dt-responsive w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
								$no = 1;
									foreach ($data->result() as $row) {
										$tgl_kembali = new DateTime($row->tgl_kembali);
										$tgl_sekarang = new DateTime();
										$selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
										$denda = $selisih * 1000;
						?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->judul_buku ?></td>
                            <td><?= mediumdate_indo($row->tgl_pinjam )?></td>
                            <td><?= mediumdate_indo($row->tgl_kembali )?></td>
                            <td><?php if ($tgl_kembali >= $tgl_sekarang OR $selisih == 0) {
								echo "<span class='badge bg-warning'>Belum Dikembalikan</span>";
							}else {
								echo"Telat ".$selisih. " Hari<br> <span class='badge bg-danger'> Denda Rp.".$denda." </span>";
							} ?></td>
                            <td>
                                <a href="<?= base_url() ?>peminjaman/kembalikan/<?= $row->id_pm ?>"
                                    class="btn btn-success waves-effect waves-light w-sm"
                                    onclick="return confirm('Apakah Yakin Ingin Mengembalikan?')">
                                    <i class="mdi mdi-pencil d-block font-size-2"></i>Kembalikan</a>
                            </td>
                        </tr>
                        <?php
						$no++;
								}
							?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
$('#id_buku').change(function() {
    var id = $(this).val();
    $.ajax({
        method: 'post',
        url: '<?=base_url()?>peminjaman/jumlah_buku',
        data: {
            id: id
        },
        dataType: "json",
        success: function(hasil) {
            console.log('AJAX Success:', hasil);
            var jumlah = JSON.stringify(hasil.jumlah);
            var jumlah1 = jumlah.split('"').join('');
            console.log('Jumlah:', jumlah1);
            if (jumlah1 <= 0) {
                alert('Maaf, Stok Buku Ini Sedang Kosong');
                location.reload();
            }
        }
    });
});
</script>
