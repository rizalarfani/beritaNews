<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
            <small> <?php echo $sub_judul; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dahsboard</a></li>
            <li><a href="#"> <?php echo $judul; ?></a></li>
            <li class="active"> <?php echo $sub_judul; ?></li>
        </ol>
    </section>
    <section class="content" style="padding: 15px;">
        <?php $this->load->view($page); ?>
    </section>
</div>