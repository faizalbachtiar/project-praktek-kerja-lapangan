<section class="section_gap">
    <div class="container">
        <div class="card col-md-12 mb-20 mt-20 shadow p-3 bg-white rounded">
            <div class="card-body p-3">
                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('tpm/create'); ?>
                <h3 class=" card-title title_color mb-30">Permohonan Sertifikasi Laik Higiene Tempat Penyedia Makan (TPM)</h3>
                <!-- Flash pengajuan failed message -->
                <?php if ($this->session->flashdata('req_failed_tpm')) : ?>
                    <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('req_failed_tpm') . '</p>'; ?>
                <?php endif; ?>
                <div class="accordion" id="sertifikasi_tpm">
                    <div class="card">
                        <div class="card-header" id="heading_pemohon">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#fieldpemohon" aria-expanded="true" aria-controls="fieldpemohon">
                                    Data Pemohon
                                </button>
                            </h2>
                        </div>

                        <div class="collapse show" id="fieldpemohon" aria-labelledby="heading_pemohon" data-parent="#sertifikasi_tpm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="mt-10">
                                        <input type="text" name="nama" id="nama" required class="single-input">
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
                            <div class="card-header" id="heading_tpm">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fieldtpm" aria-expanded="false" aria-controls="fieldtpm">
                                        Data Tempat Penyedia Makan (TPM)
                                    </button>
                                </h2>
                            </div>
                            <div id="fieldtpm" class="collapse" aria-labelledby="heading_tpm" data-parent="#sertifikasi_tpm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaTPM">Nama TPM</label>
                                        <div class="mt-10">
                                            <input type="text" name="namaTPM" id="namaTPM" required class="single-input">
                                        </div>
                                    </div>
                                    <h5>Alamat</h5>
                                    <div class="form-group">
                                        <label for="jalanTPM">Jalan</label>
                                        <div class="mt-10">
                                            <input type="text" name="jalanTPM" id="jalanTPM" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Kecamatan</label>
                                            <div class="mt-10">
                                            <select name="kecamatanTPM" id="kecamatanTPM" required>
                                                <option value="kosong">Select Kecamatan</option>
                                                <?php foreach ($kecamatan as $data) : ?>
                                                <option value='<?php echo $data['id_kecamatan']; ?>'>
                                                 <?php echo $data['nama_kecamatan']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                        </select>
                                         </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="kelurahanTPM">Kelurahan</label>
                                            <div class="mt-10">
                                                <input type="text" name="kelurahanTPM" id="kelurahanTPM" required class="single-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="notelpTPM">Nomor Telepon TPM</label>
                                        <div class="mt-10">
                                            <input type="text" name="notelpTPM" id="notelpTPM" required onkeypress="return hanyaAngka(event)" class="single-input">
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
                            <div id="fieldberkas" class="collapse" aria-labelledby="heading_berkas" data-parent="#sertifikasi_tpm">
                                <div class="card-body">
                                    <p class="alert-danger p-3 rounded">
                                        Berkas maksimal berukuran <strong>2 Mb</strong>,<br>
                                        dengan format <strong>.jpg, .png, .jpeg untuk gambar</strong> atau <strong>.pdf</strong>
                                    </p>
                                    <p class="text-danger">Pastikan berkas atau foto yang dikirimkan dapat terbaca dengan jelas!</p>
                                    <div class="form-group">
                                        <label for="f_ktp">Foto KTP Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_ktp" id="f_ktp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_npwp">NPWP Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_npwp" id="f_npwp" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_domisili">Surat Keterangan Domisili Usaha</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_domisili" id="f_domisili" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_denah">Denah Lokasi dan Bangunan</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_denah" id="f_denah" required class="single-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_kuasa">Surat Kuasa</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_kuasa" id="f_kuasa">
                                        </div>
                                        <span><small class="text-info">*Jika dikelola orang lain</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_sertif">Sertifikat/Piagam kursus untuk Pengusaha Penjamah</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_sertif" id="f_sertif">
                                        </div>
                                        <span><small class="text-info">*Optional</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_rekomendasi">Rekomendasi dari Asosiasi RM Resto Cafe Depot</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_rekomendasi" id="f_rekomendasi">
                                        </div>
                                        <span><small class="text-info">*Optional</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_foto">Foto Terbaru Pemohon</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_foto" id="f_foto" required class="single-input">
                                        </div>
                                        <span><small class="text-info">*Ukuran 4x6</small></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="f_pernyataan_TPM">Surat Pernyataan Kesanggupan Dikunjungi Lapangan (TPM)</label>
                                        <div class="mt-10">
                                            <input type="file" name="f_pernyataan_TPM" id="f_pernyataan_TPM" required class="single-input">
                                        </div>
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