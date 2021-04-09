<div id="main">
    <div class="card col-md-12 shadow md-5 p-3 bg-white rounded">
        <div class="card-body">
            <h2 class="mb-30">Penambahan Puskesmas Dinas Kesehatan Kota Malang</h2>
            <!-- Flash user log in failed message -->
            <?php if ($this->session->flashdata('add_failed')) : ?>
                <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('add_failed') . '</p>'; ?>
            <?php endif; ?>
            <?php if ($this->session->flashdata('add_success')) : ?>
                <?php echo '<p class="alert alert-success">' . $this->session->flashdata('add_success') . '</p>'; ?>
            <?php endif; ?>
            <hr>
            <?php echo form_open('Superadmin/tambah_puskesmas'); ?>
            <div class="form-group">
                <label for="id_puskesmas">Id Puskesmas </label>
                <div class="mt-10">
                    <input type="text" name="id_puskesmas" id="id_puskesmas" required class="single-input form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="id_kecamatan">Id_Kecamatan</label>
                <div class="mt-10">
                    <select name="id_kecamatan" id="id_kecamatan" required>
                        <option value="">Select Id Kecamatan</option>
                        <?php foreach ($kecamatan as $data) : ?>
                            <option value='<?php echo $data['id_kecamatan']; ?>'>
                                <?php echo $data['id_kecamatan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br />
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama Puskesmas </label>
                <div class="mt-10">
                    <input type="text" name="nama" id="nama" required class="single-input form-control">
                </div>
            </div>
            <button class="btn btn-primary p-3" type="submit">Simpan</button>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>