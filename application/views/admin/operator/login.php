<div class="op_login_area">
    <!-- <div class="login_form"> -->
    <h1 class="text-center mb-30">Dinas Kesehatan Kota Malang</h1>
    <div class="card shadow md-5 p-3 rounded bg-white col-md-6 offset-md-3 p-4">
        <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('admin/login'); ?>
            <div class="alert">
                <?php if ($this->session->flashdata('login_failed')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
                <?php endif; ?>
                <?php if ($this->session->flashdata('user_loggedout')) : ?>
                    <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Email" required />
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
            </div>
            <p class="mb-30">Lupa password anda?
                <span>
                    <!-- <a href="<?php echo base_url(); ?>jadwal">Lihat selengkapnya</a> -->
                    <a href="<?php echo base_url(); ?>lupapassword">Klik di sini</a>
                </span>
            </p>
            <input class="btn primary-btn btn-block" type="submit" value="LOGIN" />
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- </div> -->
</div>