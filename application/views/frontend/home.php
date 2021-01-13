<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php foreach ($list_berita as $data) : ?>
                    <div class="col-sm-12">
                        <h3><?php echo $data->judul_berita ?></h3>
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y', strtotime($data->date_created)) ?> </li>
                                <li><i class="fa fa-user"></i> Posting by <b><?php echo $data->penulis ?></b></li>
                                <li class="pull-right">Kategory : <?php echo $data->nama_kategori ?></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object " src="<?php echo base_url('upload/berita/' . $data->thumbnail) ?>" width="300px" height="250px">
                            </a>
                            <div class="media-body">
                                <?php echo $data->isi_berita ?>
                            </div>
                            <p style="text-align:right;">
                                <a href="<?php echo base_url($data->slug) ?>">
                                    <button class="btn btn-primary">Lihat Detail</button>
                                </a>
                            </p>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">Berita Terbaru</h4>
            </div>
            <div class="panel-body">
                <?php foreach ($berita_terbaru as $data) : ?>
                    <div class="recent">
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y', strtotime($data->date_created)) ?></a></li>
                            </ul>
                        </div>
                        <h4>
                            <a href="<?php echo base_url($data->slug) ?>"><?php echo $data->judul_berita ?></a>
                        </h4>
                    </div>
                    <hr style="margin: auto;">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>