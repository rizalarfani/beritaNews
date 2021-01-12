<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote.css">
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Tambah berita</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php echo form_open_multipart('berita/add_berita_post') ?>
                    <div class="form-group">
                        <label class="control-label" for="Judul Berita"><i class="fa fa-star text-red"></i> Judul Berita</label>
                        <input type="text" class="form-control" placeholder="Judul Berita" name="judul_berita">
                    </div>
                    <div class="form-group">
                        <label for="Isi Berita"><i class="fa fa-star text-red"></i> Isi Berita</label></label>
                        <textarea class="textarea form-contro" id="isi_berita" name="isi_berita" placeholder="Place some text here" style="width: 100%; height: 450px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="Judul Berita"><i class="fa fa-star text-red"></i> Thumbnail</label>
                                <input type="file" class="form-control" placeholder="thumbnail" name="thumbnail">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="Pilih Kategori"><i class="fa fa-star text-red"></i> Pilih Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <?php foreach ($list_kategori as $data) : ?>
                                        <option value="<?php echo $data->id ?>"><?php echo $data->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin: auto;">
                        <button class="btn btn-info btn-sm">Simpan Data</button>
                    </div>
                    <?php form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#data_master').addClass('active');
        $('#berita').addClass('active');
        $('#isi_berita').summernote({});
    });
</script>