<section class="section_gap">
    <div class="container">
        <div class="card col-md-12 mb-30 shadow p-3 bg-white rounded">
            <div class="card-body">
                <?php echo form_open('users/updateProfile'); ?>
                    <h2 class="card-title title_color mb-30">Data Diri Anda</h2>
                    <!-- Flash user logged out message -->
                    <?php if($this->session->flashdata('update_failed')): ?>
                            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('update_failed').'</p>'; ?>
                        <?php endif; ?>
                        
                    <div class="f_form">
                        <?php foreach($pemohon as $data) : ?>
                            <div class="form-group">
                                <label for="noktp">No KTP</label>
                                <input type="text" class="form-control" id="noktp" name="noktp" value= "<?php echo $data->nik_pengguna?>"  readonly >
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"  value ="<?php echo $data->nama?>"required="">
                            </div>
                            <div class="form-group">
                                <label for="username_pengguna">Username</label>
                                <input type="text" class="form-control" id="username_pengguna" name="username_pengguna" value="<?php echo $data->username ?>"required="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email?>" required="">
                            </div>  
                            <div class="form-group">
                                <label for="email">Password Baru</label>
                                <input type="password" class="form-control" id="password_baru" name="password_baru" value="" >
                            </div>  
                            <div class="form-group">
                                <label for="email">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" value="">
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" value="submit" class="btn primary-btn btn-block">
                            Perbarui Data Diri
                        </button> 
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>