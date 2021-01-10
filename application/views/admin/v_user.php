<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Data user</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama lengkap</th>
                                <th>Email</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($list_user as $data) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->nama_lengkap ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><img src="<?php base_url('uploads/profil/' . $data->foto) ?>" alt="Foto Profil" class="img-fluid"></td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="<?php echo $data->id ?>" title="Hapus data" class="btn btn-danger btn-l btn_hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#user').addClass('active');
        $('#table').DataTable();
    });
</script>