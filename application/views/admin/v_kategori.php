<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Data kategori</h3>
                    <div class="box-tools pull-right">
                        <a href="javascript:void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah">Tambah Kategori</a>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($kategori)) : ?>
                                <tr>
                                    <td colspan="">Maaf data kosong</td>
                                    <td colspan="">Maaf data kosong</td>
                                    <td colspan="">Maaf data kosong</td>
                                    <td colspan="">Maaf data kosong</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1;
                                foreach ($kategori as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->nama_kategori ?></td>
                                        <td><?php echo $data->date_created ?></td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="<?php echo $data->id ?>" title="Hapus data" class="btn btn-danger btn-l btn_hapus"><i class="fa fa-trash"></i></a>
                                            <a data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id ?>" data-nama="<?php echo $data->nama_kategori ?>" href="javascript:void(0)" class="btn btn-info btn_edit"><i class="fa fa-edit"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah kategori baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('kategori/create_kategori') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="Nama lengkap"><i class="fa fa-star text-red"></i> Nama kategori</label>
                    <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori">
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
            <?php echo form_open('kategori/edit_kategori') ?>
            <div class="modal-body">
                <div class="modal-body">
                    <input type="hidden" name="id_kat" id="id_kat">
                    <div class="form-group">
                        <label class="control-label" for="Nama lengkap"><i class="fa fa-star text-red"></i> Nama kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" id="nama" name="nama_kategori">
                    </div>
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
        $('#data_master').addClass('active');
        $('#kategori').addClass('active');
        $('#table').DataTable();

        $('#edit').on('show.bs.modal', function(event) {
            let div = $(event.relatedTarget);
            let modal = $(this);
            modal.find('#id_kat').attr('value', div.data('id'));
            modal.find('#nama').attr('value', div.data('nama'));
        });

        $('.btn_hapus').click(function() {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk Hapus data kategori!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('kategori/delete/') ?>' + id;
                }
            })
        });

    });
</script>