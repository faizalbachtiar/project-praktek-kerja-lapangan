<section class="section_gap">
    <div class="container">
        <div class="card shadow mb-20 mt-20 col-md-8 offset-md-2 p-4 bg-white rounded">
            <h3 class="card-title title_color">Lupa Password</h3>
            <p class="card-subtitle mb-30 text-muted">Silahkan masukkan data di bawah ini dengan benar</p>
            <?php if ($this->session->flashdata('pengguna_pass_success')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('pengguna_pass_success') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('pengguna_pass_failed')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('pengguna_pass_failed') . '</p>'; ?>
            <?php endif; ?>
            <?php echo form_open('users/resetpassword'); ?>
            <div class="f_form" id="f_form" novalidate="novalidate">
                <div class="form-group">
                    <label for="noktp">No KTP</label>
                    <input type="text" class="form-control" id="noktp" name="noktp" onfocus="this.placeholder = ''" required="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" onfocus="this.placeholder = ''" required="">
                </div>
                <button type="submit" value="submit" class="btn primary-btn btn-block">
                    Submit
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>