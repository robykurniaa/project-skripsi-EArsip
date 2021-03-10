<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-solid">
            <div class="card-header">
                <h3 class="card-title">Data Departemen</h3>

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
                            <th>Departemen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dep as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_dep']; ?></td>
                            <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit <?php $value['id_dep'] ?>
                                    ">Edit</button>
                                <a href="<?= base_url('dep/delete_data/' . $value['id_dep']) ?>"
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

<!-- modal add dep -->
<div class="modal fade" id="Add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Departement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                echo form_open('dep/add')
                ?>

                <div class="form-group">
                    <label>Nama Departement</label>
                    <input name="nama_dep" class="form-control" placeholder="Departement" required>
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

<!-- modal update dep -->
<?php foreach ($dep as $key => $value) { ?>
<div class="modal fade" id="edit<?php $value['id_dep']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Departement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php
                    echo form_open('dep/edit/' . $value['id_dep'])
                    ?>

                <div class="form-group">
                    <label>dep</label>
                    <input name="nama_dep" value="<?= $value['nama_dep']; ?>" class="form-control" placeholder="dep"
                        required>
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