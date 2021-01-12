<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/profil/' . $profil->foto) ?>" alt="<?php echo $profil->nama_lengkap ?> profile picture">
                    <h3 class="profile-username text-center"><?php echo $profil->nama_lengkap ?></h3>
                    <p class="text-muted text-center"><?php echo $profil->email ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#ganti" data-toggle="tab" aria-expanded="true">Ganti Profil</a></li>
                    <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">Ubah password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="ganti">
                        <?php echo form_open('ubah_profil', ['class' => 'form-horizontal']) ?>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nama lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Nama lengkap" name="nama" value="<?php echo $profil->nama_lengkap ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $profil->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="tab-pane" id="password">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password_b" name="password_b" placeholder="Password baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Ulangi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="ulangi_pass" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>