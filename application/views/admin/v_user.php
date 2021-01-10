<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Data user</h3>
                    <div class="box-tools pull-right">
                        <a href="javascript:void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">Tambah user</a>
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
                            <?php if (empty($list_user)) : ?>
                                <tr>
                                    <td>Maaf data kosong</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1;
                                foreach ($list_user as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->nama_lengkap ?></td>
                                        <td><?php echo $data->email ?></td>
                                        <td><img src="<?php echo base_url('upload/profil/' . $data->foto) ?>" alt="Foto Profil" class="img-circle" height="50px" width="50px"></td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="<?php echo $data->id ?>" title="Hapus data" class="btn btn-danger btn-l btn_hapus"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id ?>" data-nama="<?php echo $data->nama_lengkap ?>" data-email="<?php echo $data->email ?>" href="javascript:void(0)" class="btn btn-info btn_edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah user baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('user/create_user') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="Nama lengkap"><i class="fa fa-star text-red"></i> Nama lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Email"><i class="fa fa-star text-red"></i> Email</label>
                    <input type="email" class="form-control" placeholder="email" name="email">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Password"><i class="fa fa-star text-red"></i> Password</label>
                    <input type="password" class="form-control" placeholder="password" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('user/edit_user') ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_user" id="id_user">
                    <label class="control-label" for="Nama lengkap"><i class="fa fa-star text-red"></i> Nama lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama lengkap" name="nama_lengkap" id="nama">
                </div>
                <div class="form-group">
                    <label class="control-label" for="Email"><i class="fa fa-star text-red"></i> Email</label>
                    <input type="email" class="form-control" placeholder="email" name="email" id="email">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#user').addClass('active');
        $('#table').DataTable();

        $('#edit').on('show.bs.modal', function(event) {
            let div = $(event.relatedTarget);
            let modal = $(this);
            modal.find('#id_user').attr('value', div.data('id'));
            modal.find('#nama').attr('value', div.data('nama'));
            modal.find('#email').attr('value', div.data('email'));
        });

        $('.btn_hapus').click(function() {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk Hapus data user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('user/delete/') ?>' + id;
                }
            })
        });

    });
</script>