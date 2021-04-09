<div class="op_login_area">
    <!-- <div class="login_form"> -->
    <h1 class="text-center mb-30">Dinas Kesehatan Kota Malang</h1>
    <div class="card shadow md-5 p-3 rounded bg-white col-md-6 offset-md-3 p-4">
        <div class="card-body">
            <?php echo validation_errors(); ?>
            <?php echo form_open('admin/forgotpass'); ?>
            <div class="alert">
                <?php if ($this->session->flashdata('changepass_success')) : ?>
                    <?php echo '<p class="alert alert-success">' . $this->session->flashdata('changepass_success') . '</p>'; ?>
                <?php endif; ?>
                <?php if ($this->session->flashdata('email_not_send')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('email_not_send') . '</p>'; ?>
                <?php endif; ?>
                <?php if ($this->session->flashdata('account_not_found')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('account_not_found') . '</p>'; ?>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required />
            </div>
            <input class="btn primary-btn btn-block" type="submit" value="LOGIN" />
            <?php echo form_close(); ?>
        </div>
    </div>
    <!-- </div> -->
</div>