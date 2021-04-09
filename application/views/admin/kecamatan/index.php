<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h2 class="mb-30 card-title">Penambahan Kecamatan</h2>
            <!-- Flash user log in failed message -->
            <?php if ($this->session->flashdata('add_failed')) : ?>
                <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('add_failed') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('add_success')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('add_success') . '</p>'; ?>
            <?php endif; ?>
            <hr>
            <?php echo form_open('Superadmin/tambah_kecamatan'); ?>
            <div class="form-group">
                <label for="id_kecamatan">Id Kecamatan</label>
                <div class="mt-10">
                    <input type="text" name="id_kecamatan" id="id_kecamatan" required class="single-input form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_kecamatan">Nama Kecamatan</label>
                <div class="mt-10">
                    <input type="text" name="nama_kecamatan" id="nama_kecamatan" required class="single-input form-control">
                </div>
            </div>
            <button class="btn btn-primary p-3" type="submit">Simpan</button>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>