<section class="section_gap">
    <div class="container">
        <div class="card col-md-6 offset-md-3 mb-30 shadow p-3 bg-white rounded">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('users/register'); ?>
                    <h2 class="card-title mb-30 title_color text-center">Registrasi</h2>
                    <div class="form-group">
                        <label for="noktp">No KTP</label>
                        <input type="text" class="form-control" id="noktp" name="noktp" onfocus="this.placeholder = ''" required=""onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" onfocus="this.placeholder = ''" required="">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" onfocus="this.placeholder = ''" required="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" onfocus="this.placeholder = ''" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" onfocus="this.placeholder = ''" required="">
                    </div>
                    <div class="form-group">
                        <label for="re_password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="re_password" name="re_password" onfocus="this.placeholder = ''" required="">
                    </div>
                    <p class="text-center">
                        Sudah memiliki akun? 
                        <a href="<?php echo base_url(); ?>users/login" class="loginhere-link">Login sekarang</a>
                    </p>
                    <br>
                    <button type="submit" value="submit" class="btn primary-btn btn-block">
                        Daftar
                    </button>
                    <br>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>