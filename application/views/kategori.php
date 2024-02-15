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
<div class="row">
    <div class="col-md-12">
        <button type="button" data-bs-target=".Tambah" data-bs-toggle="modal"
            class="btn btn-primary waves-effect waves-light">
            <i class="bx bx-plus font-size-16 align-middle me-2"></i> Tambah Kategori
        </button>
    </div>
</div>

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
                    <form method="POST" action=" <?= base_url()?>kategori/simpan">

                        <div class="form-floating mb-3">
                            <input type="text" name="nama_kategori" class="form-control" id="floatingnameInput"
                                placeholder="Enter Name">
                            <label for="floatingnameInput">Nama Kategori</label>
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
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$no=1;
							foreach ($data as $row) {
								?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row->nama_kategori ?></td>

                            <td>

                                <a data-bs-toggle="modal" data-bs-target=".Edit<?= $row->id_kategori ?>"
                                    class="btn btn-success waves-effect waves-light w-sm"> <i
                                        class="mdi mdi-pencil d-block font-size-2"></i> Edit</a>
                                <a href="kategori/hapus/<?= $row->id_kategori ?>"
                                    class="btn btn-danger waves-effect waves-light w-sm"
                                    onclick="return confirm('Yakin Ingin Menghapus?')"> <i
                                        class="mdi mdi-trash-can d-block font-size-2"></i> Delete</a>

                                </button>
                            </td>
                        </tr>
                        <div>
                            <!-- center modal -->
                            <div class="modal fade Edit<?= $row->id_kategori ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action=" <?= base_url()?>kategori/update">
                                                <div class="mb-3">
                                                    <input type="text" name="id_kategori" class="form-control"
                                                        id="floatingidaInput" hidden value="<?= $row->id_kategori ?>"
                                                        placeholder="">
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" value="<?= $row->nama_kategori?>"
                                                        name="nama_kategori" class="form-control" id="floatingnameInput"
                                                        placeholder="Enter Name">
                                                    <label for="floatingnameInput">Nama Pengarang</label>
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
            </div>
        </div>
    </div>
    <!-- end col
 -->
</div> <!-- end row -->
