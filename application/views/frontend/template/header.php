<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Berita News | <?php echo $title ?></title>
    <!-- Bagian css -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap-3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css') ?>">
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('home') ?>"><b style="font-weight: 700; color: #fffff;">Berita</b> News</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="clr1 active"><a href="<?php echo base_url('home') ?>">Home</a></li>
                    <li class="clr2 dropdown"><a href="">Kategori</a>
                        <ul class="isi-dropdown">
                            <?php foreach ($list_kategori as $data) : ?>
                                <li><a href="<?php echo base_url('kategori/' . $data->slug) ?>"><?php echo $data->nama_kategori ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </br></br></br></br>