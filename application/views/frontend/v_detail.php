<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="post-detail">
                        <h3><?php echo $berita->judul_berita ?></h3>
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y', strtotime($berita->date_created)) ?></li>
                                <li><i class="fa fa-user"></i> Posting by <?php echo $berita->penulis ?></li>
                                <li class="pull-right">Category : <?php echo $berita->nama_kategori ?></li>
                            </ul>
                        </div>
                        <hr>
                        <p>
                            <img src="<?php echo base_url('upload/berita/' . $berita->thumbnail) ?>" width="300px" alt="<?php echo $berita->judul_berita ?>" style="float:left;padding:5px 10px 5px 10px;">
                            <?php echo $berita->isi_berita ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
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
</div>