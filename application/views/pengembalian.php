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
                                    <select name="id_anggota" class="form-select" id="peminjam"
                                        aria-label="Floating label select example">
                                        <option disabled selected>Pilih Peminjam</option>
                                        <?php
											foreach ($peminjam as $row) {?>
                                        <option value="<?= $row->id_anggota ?>"><?= $row->nama ?></option>
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
                <table id="datatable" class="table table-striped dt-responsive  w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$no = 1;
	foreach ($data->result() as $row) {
?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->judul_buku ?></td>
                            <td><?= $row->tgl_pinjam ?></td>
                            <td><?= $row->tgl_kembali ?></td>
                            <td><?= $row->tgl_dikembalikan ?></td>
                            <td><?= 'Rp.' . $row->denda ?></td>


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
    <!-- end col
 -->
</div>