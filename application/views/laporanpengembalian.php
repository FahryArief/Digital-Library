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
<div class="row">
    <div class="box-header">
        <form method="post" action="<?= base_url()?>laporanpengembalian">
            <div class="row">
                <h4 class="text-primary"><b>Filter Laporan Pengembalian</b></h4>
                <!-- Input date -->
                <div class="col-md-2">
                    <input name="tgl_awal" id="tgl_awal" type="date" class="form-control">
                </div>

                <div class="col-md-2">
                    <!-- Input date -->
                    <input name="tgl_akhir" id="tgl_akhir" type="date" class="form-control">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block btn-filter"><i class="fa fa-filter"></i>
                        Filter</button>
                </div>

                <div class="col-md-2">
                    <a href="<?= base_url()?>laporanpengembalian" class="btn btn-warning btn-block btn-refresh"><i
                            class="bx bx-rotate-right"></i> Refresh</a>
                </div>

                <div class="col-md-2">
                    <a href="<?= base_url()?>laporanpengembalian/pdf_laporan_pengembalian"
                        class="btn btn-danger btn-block btn-pdf" target="_blank"> <i class="fa fa-file-pdf-o"></i> View
                        PDF</a>
                </div>
            </div>

        </form>
    </div>
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
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Tanggal Di Kembalikan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$no = 1;
                    foreach ($data as $row) {?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->judul_buku;?></td>
                            <td><?= mediumdate_indo($row->tgl_pinjam);?></td>
                            <td><?= mediumdate_indo($row->tgl_kembali);?></td>
                            <td><?= mediumdate_indo($row->tgl_dikembalikan);?></td>
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
    <script>
    function submitForm() {
        // Ambil nilai input date
        var tgl_awal = document.getElementById('tgl_awal').value;
        var tgl_akhir = document.getElementById('tgl_akhir').value;

        // Konversi format tanggal ke dd-mm-YYYY
        var tgl_awal_formatted = formatDate(tgl_awal);
        var tgl_akhir_formatted = formatDate(tgl_akhir);

        // Set nilai ke input hidden (untuk dikirimkan)
        document.getElementById('tgl_awal_hidden').value = tgl_awal_formatted;
        document.getElementById('tgl_akhir_hidden').value = tgl_akhir_formatted;

        // Submit form
        document.getElementById('filterForm').submit();
    }

    function formatDate(dateString) {
        // Konversi format tanggal dari YYYY-MM-DD ke dd-mm-YYYY
        var dateObj = new Date(dateString);
        var day = String(dateObj.getDate()).padStart(2, '0');
        var month = String(dateObj.getMonth() + 1).padStart(2, '0');
        var year = dateObj.getFullYear();

        return day + '-' + month + '-' + year;
    }
    </script>
    <!-- end col -->
</div>