<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-solid">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                    <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm btn-flat">
                        <i class="fas fa-plus"> Add</i></a>
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
                            <th width="30px ">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Foto</th>
                            <th>Departement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_user']; ?></td>
                            <td><?= $value['email']; ?></td>
                            <td><?= $value['password']; ?></td>
                            <td><?php if ($value['level'] == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    } ?> </td>
                            <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="80px"></td>
                            <td><?= $value['nama_dep']; ?></td>
                            <td style="display: inline;">
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <a href="" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus')">Hapus
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