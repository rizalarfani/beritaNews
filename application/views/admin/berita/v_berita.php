<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Data Berita</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('berita/add_berita') ?>" class="btn btn-info btn-sm">Tambah berita</a>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Penulis Berita</th>
                                <th>Kategori Berita</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($list_berita)) : ?>
                                <tr>
                                    <td>Maaf data kosong</td>
                                </tr>
                            <?php else : ?>
                                <?php $no = 1;
                                foreach ($list_berita as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data->judul_berita ?></td>
                                        <td><?php echo $data->penulis ?></td>
                                        <td><?php echo $data->nama_kategori ?></td>
                                        <td><img src="<?php echo base_url('upload/berita/' . $data->thumbnail) ?>" alt="Foto Thumbnail" class="img-circle" height="50px" width="50px"></td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="<?php echo $data->id ?>" title="Hapus data" class="btn btn-danger btn-l btn_hapus"><i class="fa fa-trash"></i></a>
                                            <a href="<?php echo base_url('berita/edit_berita/' . $data->id) ?>" class="btn btn-info btn_edit"><i class="fa fa-edit"></i></a>
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
<script>
    $(document).ready(function() {
        $('#data_master').addClass('active');
        $('#berita').addClass('active');
        $('#table').DataTable();
        $('.btn_hapus').click(function() {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk Hapus data berita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('berita/delete/') ?>' + id;
                }
            })
        });
    });
</script>