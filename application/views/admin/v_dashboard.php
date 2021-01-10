<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <?php if (empty($count_user)) : ?>
                        <h3>0</h3>
                    <?php else : ?>
                        <h3><?php echo $count_user ?></h3>
                    <?php endif; ?>
                    <p>Data User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url('user') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#dahsboard').addClass('active');
    })
</script>