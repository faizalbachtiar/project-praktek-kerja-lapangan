<section class="section_gap">
    <div class="container">
        <div class="card col-md-12 mb-30 shadow p-3 bg-white rounded">
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('dam/create'); ?>
                <h2 class="title_color mb-30">Sertifikasi Laik Hygiene Sanitasi Depot Air Minum (DAM)</h2>
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_dam')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_dam') . '</p>'; ?>
                <?php endif; ?>
                <div class="accordion" id="sertifikasi_dam">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_dam">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <div class="mt-10">
                                        <input type="text" name="umur" id="umur" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noktp">Nomor KTP</label>
                                    <div class="mt-10">
                                        <input type="text" name="noktp" id="noktp" required onkeypress="return hanyaAngka(event)" class="single-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Rumah</label>
                                    <div class="mt-10">
                                        <input type="text" name="alamat" id="alamat" required class="single-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="heading_dam">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fielddam" aria-expanded="false" aria-controls="fielddam">
                                        Data Depot Air Minum (DAM)
                                    </button>
                                </h2>
                            </div>
                            <div id="fielddam" class="collapse" aria-labelledby="heading_hotel" data-parent="#sertifikasi_dam">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaDAM">Nama DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="namaDAM" id="namaDAM" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatDAM">Alamat DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="alamatDAM" id="alamatDAM" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <div class="mt-10">
                                        <select name="kecamatan" id="kecamatan" required>
                                                <option value="kosong">Select Kecamatan</option>
                                                <?php foreach ($kecamatan as $data) : ?>
                                                <option value='<?php echo $data['id_kecamatan']; ?>'>
                                                 <?php echo $data['nama_kecamatan']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelpDAM">Nomor Telepon DAM</label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpDAM" id="notelpDAM" required onkeypress="return hanyaAngka(event)" class="single-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading_berkas">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldberkas" aria-expanded="false" aria-controls="fieldberkas">
                                        Berkas Kelengkapan
                                    </button>
                                </h2>
                            </div>
                            <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_dam">
                                <div class="card-body">
                                    <p class="alert-danger p-3 rounded">
                                        Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                        dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                                    </p>
                                    <div class="form-group">
                                        <label for="f_ktp">Foto KTP</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_ktp" id="f_ktp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_foto">Foto Terbaru</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_foto" id="f_foto" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_domisili">Surat Keterangan Domisili Usaha</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_domisili" id="f_domisili" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_denah">Denah Lokasi dan Bangunan DAM</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_denah" id="f_denah" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_sertifikat">Fotocopy Sertifikat Pelatihan/Kursus Higiene Sanitasi DAM</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_sertifikat" id="f_sertifikat" class="single-input">
                                        </div>
                                        <small class="text-info">*Jika ada</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-block primary-btn">Ajukan Permohonan</button>
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