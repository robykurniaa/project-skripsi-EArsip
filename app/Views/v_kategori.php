<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-solid">
            <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal"
                        data-target="#Add">
                        <i class="fas fa-plus"> Add</i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo (session()->getFlashdata('pesan'));
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="80px ">No</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_kategori']; ?></td>
                            <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit <?php $value['id_kategori'] ?>
                                    ">Edit</button>
                                <a href="<?= base_url('kategori/delete_data/' . $value['id_kategori']) ?>"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus')">Hapus
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- modal add Kategori -->
<div class="modal fade" id="Add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                echo form_open('kategori/add')
                ?>

                <div class="form-group">
                    <label>Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="kategori" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal update Kategori -->
<?php foreach ($kategori as $key => $value) { ?>
<div class="modal fade" id="edit<?php $value['id_kategori']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                    echo form_open('kategori/edit/' . $value['id_kategori'])
                    ?>

                <div class="form-group">
                    <label>Kategori</label>
                    <input name="nama_kategori" value="<?= $value['nama_kategori']; ?>" class="form-control"
                        placeholder="kategori" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->